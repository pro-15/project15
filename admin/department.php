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
if (isset($_POST["btn_update"])) {
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
        if ($dao->update($data, 'department', $condition)) {
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
                <h5 class="card-title mb-0">Edit Department</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Department Name</label>
                        <?= $form->textBox('name', array('class' => 'form-control')); ?>
                        <?= $validator->error('name'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <?= $form->fileField('image', array('class' => 'form-control')); ?>
                    </div>
                    <button type="submit" name="btn_update" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>