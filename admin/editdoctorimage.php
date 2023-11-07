<?php
require('../config/autoload.php');
include("header.php");
$dao = new DataAccess();
$info = $dao->getData('*', 'doctor', 'id=' . $_GET['id']);
$file = new FileUpload();
$elements = array(
	"name" => $info[0]['name'],
	"gender" => $info[0]['gender'],
	"department" => $info[0]['department'],
	"qualification" => $info[0]['qualification'],
	"address" => $info[0]['address'],
	"image" => "",
	"dob" => $info[0]['dob'],
	"phone" => $info[0]['phone'],
	"description" => $info[0]['description'],
	"fee" => $info[0]['fee']
);

$form = new FormAssist($elements, $_POST);
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
		"maxlength" => 1,
		"alphaonly" => true
	),
	"department" => array(
		"required" => true,
		"minlength" => 1,
		"maxlength" => 50,
		"integeronly" => true
	),
	"qualification" => array(
		"required" => true,
		"minlength" => 1,
		"maxlength" => 50,
		"alphaspaceonly" => true
	),
	"address" => array(
		"required" => true,
		"minlength" => 1,
		"maxlength" => 50,
		"alphaspaceonly" => true
	),
	"image" => array(),
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


$validator = new FormValidator($rules, $labels);

if (isset($_POST["btn_update"])) {
	if ($validator->validate($_POST)) {
		if (isset($_FILES['image']['name'])) {
			if ($fileName = $file->doUploadRandom(
				$_FILES['image'],
				array('.jpg', '.png', '.jpeg'),
				100000,
				5,
				'../doctorimage'
			)) {
				$flag = true;
			}
		}
		$data = array(
			'name' => $_POST['name'],
			'department' => $_POST['department'],
			'qualification' => $_POST['qualification'],
			'address' => $_POST['address'],
			'phone' => $_POST['phone'],
			'dob' => $_POST['dob'],
			'description' => $_POST['description'],
			'fee' => $_POST['fee'],
		);
		$condition = 'id=' . $_GET['id'];
		if (isset($flag))
			$data['image'] = $fileName;
		if (isset($_POST['gender']) && $_POST['gender'] != 'selected')
			$data['gender'] = $_POST['gender'];
			
		if ($dao->update($data, 'doctor', $condition)) {
			$msg = "Successfullly Updated";
		} else {
			$msg = "Failed";
		}
		echo "<span style='color:green;'>$msg</span>";
	}
}
?>
<h1 class="mb-3"><strong>Patients</strong></h1>
<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">Add Patient</h5>
			</div>
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Name</label>
						<?= $form->textBox('name', array('class' => 'form-control')); ?>
						<?= $validator->error('name'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Gender</label>
						<select class="form-select" name="gender">
							<option>select</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">DoB</label>
						<input type="date" name="dob" value="<?= $elements['dob'] ?>" class="form-control">
						<?= $validator->error('dob'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Phone</label>
						<?= $form->textBox('phone', array('class' => 'form-control')); ?>
						<?= $validator->error('phone'); ?>
					</div>
					<div class="form-label">
						<label class="form-label">Description</label>
						<?= $form->textArea('description', array('class' => 'form-control')); ?>
						<?= $validator->error('description'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Fee</label>
						<?= $form->textBox('fee', array('class' => 'form-control')); ?>
						<?= $validator->error('fee'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Department</label>
						<?php
						$options = $dao->createOptions('name', 'id', "department");
						echo $form->dropDownList('department', array('class' => 'form-select'), $options); ?>
						<?= $validator->error('department'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Qualification</label>
						<?= $form->textBox('qualification', array('class' => 'form-control')); ?>
						<?= $validator->error('qualification'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Address</label>
						<?= $form->textBox('address', array('class' => 'form-control')); ?>
						<?= $validator->error('address'); ?>
					</div>
					<div class="mb-3">
						<label class="form-label">Image</label>
						<?= $form->fileField('image', array('class' => 'form-control')); ?>
					</div>
					<button type="submit" name="btn_update" class="btn btn-warning">UPDATE</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>