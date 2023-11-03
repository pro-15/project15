<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>One Care</title>
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
	<link href="assets/css/doctorres.css" rel="stylesheet">
	<link href="assets/css/doctorcard.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: OneCare
	* Updated: Jul 27 2023 with Bootstrap v5.3.1
	* Template URL: https://bootstrapmade.com/OneCare-free-medical-bootstrap-theme/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>

<body>

	<!-- ======= Top Bar ======= -->
	<!-- <div id="topbar" class="d-flex align-items-center fixed-top">
		<div class="container d-flex justify-content-between">
			<div class="contact-info d-flex align-items-center">
				<i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
				<i class="bi bi-phone"></i> +1 5589 55488 55
			</div>
			<div class="d-none d-lg-flex social-links align-items-center">
				<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
				<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
				<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
				<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
			</div>
		</div>
	</div> -->

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center">

			<h1 class="logo me-auto"><a href="index.html">OneCare</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto" href="../index.html#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="../index.html#about">About</a></li>
					<li><a class="nav-link scrollto" href="departments.php#departments">Departments</a></li>
					<li><a class="nav-link scrollto" href="../index.html#doctors">Doctors</a></li>
					<li><a class="nav-link scrollto" href="../index.html#contact">Contact</a></li>
					<?php
					if (isset($_SESSION['user_id'])) {
						$fields3 = array('name');
						$rec = $dao->getDataJoin($fields3, 'user', 'id=' . $_SESSION['user_id']);
						$name = $rec[0]['name'];
						echo "
						<li class=\"dropdown\"><a href=><span>$name
						</span> <i class=\"bi bi-person-circle\"></i></a>
						<ul>
						
						
						<li>
							<a href='#'>
								<span>Profile</span>
								<i class='bi bi-person-vcard'></i>
							</a>
						</li>
						<li>
							<a href='#'>
								<span>Wallet</span>
								<i class='bi bi-wallet2'></i>
							</a>
						</li>
						<li>
							<a href='./mybooking.php'>
								<span>My bookings</span>
								<i class='bi bi-journal-bookmark'></i>
							</a>
						</li>
						<li>
							<a href=\"logout.php\">
								<span>Sign out</span>
								<i class='bi bi-power'></i>
							</a>
						</li>
						</ul>
						</li>
						</ul>";
					} else {
						echo '<li id="logn">
					   	<a href="/project15/pat/login.php">
							   Sign-In
						   </a>
					   </li>';
					}
					?>
					<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
			<!-- 
			<a href="./mybooking.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">My</span> Bookings</a>
			 -->
		</div>
	</header>