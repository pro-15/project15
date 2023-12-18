<?php
require('../config/autoload.php');
$elements = array(
	"name" => "",
	"gender" => "",
	"age" => "",
	"email" => "",
	"phone" => "",
	"password" => "",
	"cpassword" => ""
);
$labels = array(
	'name' => "Name",
	"gender" => "Gender",
	"age" => "Age",
	"email" => "Email",
	"phone" => "Phone number",
	"password" => "Password",
	"cpassword" => "Confirm Password"
);
$rules = array(
	"name" => array(
		"required" => true,
		"minlength" => 3,
		"maxlength" => 30,
		"alphaspaceonly" => true
	),
	"gender" => array(
		"required" => true,
		"minlength" => 1,
		"maxlength" => 6,
		"alphaonly" => true
	),
	"age" => array(
		"required" => true,
		"minlength" => 1,
		"maxlength" => 2,
		"integeronly" => true
	),
	"email" => array(
		"required" => true,
		"email" => true,
		"unique" => array("field" => "email", "table" => "user")
	),
	"phone" => array(
		"required" => true,
		"integeronly" => true,
		"minlength" => 10,
		"maxlength" => 10
	),
	"password" => array("required" => true),
	"cpassword" => array(
		"required" => true,
		"compare" => array("comparewith" => "password", "operator" => "=")
	),
);

$dao = new DataAccess();
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules, $labels);

if (isset($_POST['register'])) {
	if ($validator->validate($_POST)) {
		$data = array(
			'name' => $_POST['name'],
			'gender' => $_POST['gender'],
			'age' => $_POST['age'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'password' => $_POST['password']
		);
		if ($dao->insert($data, 'user')) $msg = "Registered Successfully";
		else $msg = "insertion failed";
		echo "<p style='color:green;'>$msg</p>";
	}
}

if (isset($_POST['home'])) {
	echo "<script> alert('New zxx created successfully');</script> ";
	echo "<script> location.replace('displaycategory.php'); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Register Page - OneCare</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
	<!-- =======================================================
  * Template Name: OneCare
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/OneCare-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
	<style type="text/css">
		.valErr {
			color: red !important;
		}
	</style>
	<script>
		function checkk() {
			let x = document.getElementById('tnc');
			if (x.checked) return true;
			else {
				var t = document.getElementById('tc');
				t.classList.add('valErr');
				return false
			}
		}
	</script>
</head>

<body class="bg-success">
	<section id='register' class='register justify-content-between align-items-center'>
		<div class="container pt-4 pb-5 px-5 col-lg-4 mx-auto bg-light rounded">
			<div class="section-title pb-3">
				<a href="../index.php">
					<img src="assets/img/logo_rmbg.png" width="150px" height="auto">
				</a>
				<h4>New here?</h4>
				<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
				<form method="POST" class="pt-3" onsubmit="return checkk()">
					<?php $msg = null; ?>
					<span class='font-weight-light'><?php echo $msg ? $msg : $msg; ?></span>
					<div class="form-group">
						<input type="text" class="form-control form-control-lg" placeholder="Name" name="name" required>
						<span class="valErr"><?= $validator->error('name'); ?></span>
					</div>
					<div class="form-group">
						<select name="gender" class="mt-3 form-control form-control-lg" placeholder='Gender' required>
							<option value='' selected disabled>Gender</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
						</select>
						<!-- <span class="valErr"><?= $validator->error('gender'); ?></span> -->
					</div>
					<div class="form-group">
						<input type="number" class="mt-3 form-control form-control-lg" name="age" placeholder="Age" required>
						<span class="valErr"><?= $validator->error('age'); ?></span>
					</div>
					<div class="form-group">
						<input type="email" class="mt-3 form-control form-control-lg" name='email' placeholder="Email" required>
						<span class="valErr"><?= $validator->error('email'); ?></span>
					</div>
					<div class="form-group">
						<input type="tel" class="mt-3 form-control form-control-lg" name='phone' placeholder="Phone" required>
						<span class="valErr"><?= $validator->error('phone'); ?></span>
					</div>
					<div class="form-group">
						<input type="password" class="mt-3 form-control form-control-lg" name="password" placeholder="Password" required>
						<span class="valErr"><?= $validator->error('password'); ?></span>
					</div>
					<div class="form-group">
						<input type="password" class="mt-3 form-control form-control-lg" name="cpassword" placeholder="Confirm Password" required>
						<span class="valErr"><?= $validator->error('cpassword'); ?></span>
					</div>
					<div class="mt-3 mb-4">
						<div class="form-check">
							<label id='tc' class="form-check-label text-muted">
								<input type="checkbox" class="form-check-input" id='tnc' checked required>
								I agree to all Terms & Conditions
							</label>
						</div>
					</div>
					<div class="mt-3">
						<input type='submit' class="col-lg-12 btn btn-primary" name='register' value="Sign Up" />
					</div>
					<div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
					</div>
				</form>
			</div>
		</div>
	</section>
	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
</body>

</html>