<?php
require('../config/autoload.php');
include("header.php");
$elements = array(
    "name" => "",
    "gender" => "",
    "department" => "",
    "qualification" => "",
    "address" => "",
    "image" => "",
    "phone" => "",
    "dob" => "",
    "description" => "",
    "fee" => ""
);
$labels = array(
    'name' => "Doctor Name",
    "gender" => "Doctor Gender",
    "department" => "Doctor Department",
    "qualification" => "Doctor Qualification",
    "address" => "Doctor Address",
    'image' => "Doctor Image",
    'dob' => 'DoB',
    'description' => "DESC",
    'fee' => "Fee"
);
$rules = array(
    "name" => array(
        "required" => true,
        "minlength" => 2,
        "maxlength" => 30,
        "alphaspaceonly" => true
    ),
    "gender" => array(
        "required" => true,
        "minlength" => 1,
        "maxlength" => 2,
        "alphaonly" => true
    ),
    "department" => array(
        "required" => true,
        "minlength" => 1,
        "maxlength" => 30,
        "integeronly" => true
    ),
    "qualification" => array(
        "required" => true,
        "minlength" => 2,
        "maxlength" => 50,
        "alphaspaceonly" => true
    ),
    "address" => array(
        "required" => true,
        "minlength" => 2,
        "maxlength" => 30,
        "alphaspaceonly" => true
    ),
    "image" => array("filerequired" => true),
    "phone" => array(
        "required" => true,
        "minlength" => 10,
        "maxlength" => 10,
        "integeronly" => true
    ),
    "dob" => array(
        "required" => true,
        "minlength" => 1,
        "maxlength" => 15
    ),
    "description" => array(
        "required" => true,
        "minlength" => 2,
        "maxlength" => 500
    ),
    "fee" => array(
        "required" => true,
        "minlength" => 1,
        "maxlength" => 5,
        "integeronly" => true
    ),
);

$file = new FileUpload();
$dao = new DataAccess();
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules, $labels);

if (isset($_POST["insert"])) {
    if ($validator->validate($_POST)) {
        if ($fileName = $file->doUploadRandom(
            $_FILES['image'],
            array('.jpg', '.png', '.jpeg'),
            100000,
            1,
            '../doctorimage'
        )) {
            $data = array(
                'name' => $_POST['name'],
                "gender" => $_POST['gender'],
                "department" => $_POST['department'],
                "qualification" => $_POST['qualification'],
                "address" => $_POST['address'],
                "phone" => $_POST['phone'],
                "dob" => $_POST['dob'],
                'description' => $_POST['description'],
                'fee' => $_POST['fee'],
                'image' => $fileName,
            );
            if ($dao->insert($data, "doctor")) {
                echo "<p style=color:green;>New doctor created successfully</p>";
            } else echo "<p style=color:red;>ALREADY EXIST</p>";
        }
    } else echo $file->errors();
}

$element2 = array(
    "username" => "",
    "password" => "",
    "id" => ""
);
$label2 = array(
    "username" => "Username",
    "password" => "Password",
    "id" => "ID"
);
$rule2 = array(
    "username" => array(
        "required" => true,
        "unique" => array("field" => "username", "table" => "doctor")
    ),
    "password" => array("required" => true),
    "id" => array("required" => true)
);

$dao = new DataAccess();
$form2 = new FormAssist($element2, $_POST);
$validator2 = new FormValidator($rule2, $label2);

if (isset($_POST['issue'])) {
    if ($validator2->validate($_POST)) {
        $data = array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        );
        if ($dao->update($data, 'doctor', 'id=' . $_POST['id'])) {
            echo "<script> alert('Id pass added successfully');</script> ";
        }
    }
}
?>
<h1 class="mb-3"><strong>Doctor</strong></h1>
<div class="row">

    <div class="col-lg-8">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Add Doctor</h5>
            </div>
            <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="form-label">Name</label>
                            <?= $form->textBox('name', array('class' => 'form-control', 'placeholder' => 'Name')); ?>
                            <?= $validator->error('name'); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option>select</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="form-label">Phone</label>
                            <?= $form->textBox('phone', array('class' => 'form-control', 'placeholder' => 'Phone')); ?>
                            <?= $validator->error('phone'); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" value="<?= $elements['dob'] ?>" class="form-control" placeholder="Date of Birth">
                            <?= $validator->error('dob'); ?>
                        </div>

                    </div>
                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="form-label">Address</label>
                            <?= $form->textBox('address', array('class' => 'form-control', 'placeholder' => 'Address')); ?>
                            <?= $validator->error('address'); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Description</label>
                            <?= $form->textArea('description', array('class' => 'form-control', 'placeholder' => 'Description', 'maxlength' => 500)); ?>
                            <?= $validator->error('description'); ?>
                        </div>

                    </div>
                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="form-label">Qualification</label>
                            <?= $form->textBox('qualification', array('class' => 'form-control', 'placeholder' => 'Qualification')); ?>
                            <?= $validator->error('qualification'); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Fee</label>
                            <?= $form->textBox('fee', array('class' => 'form-control', 'placeholder' => 'Fee')); ?>
                            <?= $validator->error('fee'); ?>
                        </div>

                    </div>
                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="form-label">Department</label>
                            <?php
                            $options = $dao->createOptions('name', 'id', "department");
                            echo $form->dropDownList('department', array('class' => 'form-select'), $options); ?>
                            <?= $validator->error('department'); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Image</label>
                            <?= $form->fileField('image', array('class' => 'form-control')); ?>
                        </div>

                    </div>
                    <button type="submit" name="insert" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Issue Username & Password</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Doctor</label>
                        <?php
                        $options = $dao->createOptions('name', 'id', "doctor");
                        echo $form2->dropDownList('id', array('class' => 'form-select'), $options); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name='password' class="form-control" placeholder="Password" aria-label="Username">
                    </div>
                    <button type="submit" name='issue' value='sub' class="btn btn-primary"> Issue </button><br>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Doctors List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm" style="overflow: auto;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Doctor Name</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Qualification</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th class="d-none d-xl-table-cell">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $actions = array(
                            'edit' => array(
                                'label' => '<i class="align-middle" data-feather="edit"></i>',
                                'link' => 'editdoctorimage.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array(
                                    'class' => 'btn btn-warning'
                                )
                            ),
                            'delete' => array(
                                'label' => '<i class="align-middle" data-feather="trash-2"></i>',
                                'link' => 'deletedoctor.php',
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
                                    'path' => "../doctorimage/",
                                    "attributes" => array("class" => "rounded-circle", "height" => '100')
                                )
                            ),
                        );
                        $join = array();
                        $fields = array('id', 'name', 'gender', 'department', 'qualification', 'address', 'image', 'phone', 'dob');
                        $users = $dao->selectAsTable($fields, 'doctor', 1, $join, $actions, $config);
                        echo $users;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>