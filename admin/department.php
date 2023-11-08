<?php
require('../config/autoload.php');
include("header.php");
$elements = array(
    "name" => "",
    "image" => ""
);
$labels = array(
    'name' => "Department Name",
    "image" => "Department Image"
);
$rules = array(
    "name" => array(
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "alphaspaceonly" => true
    ),
    "image" => array("filerequired" => true)
);
$dao = new DataAccess();
$file = new FileUpload();
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules, $labels);
if (isset($_POST["insert"])) {
    if ($validator->validate($_POST)) {
        if (isset($_FILES['image']['name'])) {
            if ($fileName = $file->doUploadRandom(
                $_FILES['image'],
                array('.jpg', '.png', '.jpeg'),
                100000,
                5,
                '../images'
            )) {
                $flag = true;
            }
        }
        $data = array(
            'name' => $_POST['name'],
            'image' => $fileName
        );
        $condition = 'id=' . $_GET['id'];
        if (isset($flag)) $data['image'] = $fileName;
        if ($dao->insert($data, 'department', $condition)) {
            $msg = "Successfullly Updated";
        } else $msg = "Failed";
        echo "<span style='color:green;'><?php echo '$msg'; ?></span>";
    }
}
?>
<h1 class="mb-3"><strong>Departments</strong></h1>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Add Department</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Department Name</label>
                        <?= $form->textBox('name', array('class' => 'form-control', 'placeholder' => 'Department Name')); ?>
                        <?= $validator->error('name'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <?= $form->fileField('image', array('class' => 'form-control')); ?>
                    </div>
                    <button type="submit" name="insert" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Departments List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover mt-0 mb-3 ms-3 me-5">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="*">Department Name</th>
                            <th>Image</th>
                            <th width="200px">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $actions = array(
                            'edit' => array(
                                'label' => '<i class="align-middle" data-feather="edit"></i>',
                                'link' => 'editdepartmentimage.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array(
                                    'class' => 'btn btn-warning'
                                )
                            ),
                            'delete' => array(
                                'label' => '<i class="align-middle" data-feather="trash-2"></i>',
                                'link' => 'deletedept.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array(
                                    'class' => 'btn btn-danger'
                                )
                            )
                        );
                        $config = array(
                            'srno' => true,
                            'hiddenfields' => array('id'),
                            'images' => array(
                                array(
                                    'field' => "image",
                                    'path' => "../images/",
                                    "attributes" => array("height" => '100')
                                )
                            )
                        );
                        $join = array();
                        $fields = array('id', 'name', 'image');
                        $users = $dao->selectAsTable($fields, 'department', 1, $join, $actions, $config);
                        echo $users;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>