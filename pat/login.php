<?php
require('../config/autoload.php');
$elements = array(
	"email" => "",
	"password" => ""
);
$rules = array(
	'email' => array('required' => true),
	'password' => array('required' => true),
);
$dao = new DataAccess();
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules);
if (isset($_POST['login'])) {
	if ($validator->validate($_POST)) {
		$data = array('email' => $_POST['email'], 'password' => $_POST['password']);
		if ($info = $dao->login($data, 'user')) {
			$_SESSION['user_id'] = $info['id'];
			$_SESSION['uname'] = $info['name'];
			$_SESSION['settime'] = time();
			$_SESSION['keep'] = (isset($_POST['keep']) && $_POST['keep'] === 'on') ? true : false;
			header('Location: /project15/index.php');
		} else echo "<script> alert('Invalid username or password');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Login Page - OneCare</title>
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
</head>

<body class="bg-info">
	<section id='login' class='login justify-content-between align-items-center'>
		<div class="container pt-4 pb-5 px-5 col-lg-4 mx-auto bg-light rounded">
			<div class="section-title pb-3">
				<a href="/project15/index.php">
					<img src="assets/img/logo_rmbg.png" width="150px" height="auto">
				</a>
				<h4>Hello! let's get started</h4>
				<h6 class="font-weight-light">Sign in to continue.</h6>
			</div>
			<div class="row gy-3">
				<form method="POST" class="pt-3">
					<div class="form-group">
						<input type="email" name='email' class="form-control form-control-lg" placeholder="Email">
					</div>
					<div class="form-group mt-3">
						<input type="password" name='password' class="form-control form-control-lg" placeholder="Password">
					</div>
					<div class="mt-3 text-center">
						<button type="submit" name='login' class="col-lg-12 btn btn-primary">
							SIGN IN
						</button>
					</div>
					<div class="mt-4 mb-2 d-flex justify-content-between align-items-center">
						<div class="form-check">
							<label class="form-check-label text-muted">
								<input type="checkbox" name='keep' class="form-check-input"> Keep me signed in </label>
						</div>
						<a href="#" class="auth-link text-black">Forgot password?</a>
					</div>
					<div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
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