<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>One Care</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="pat/assets/img/favicon.png" rel="icon">
	<link href="pat/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="pat/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="pat/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="pat/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="pat/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="pat/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="pat/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="pat/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="pat/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="pat/assets/css/style.css" rel="stylesheet">
	<link href="pat/assets/css/doctorres.css" rel="stylesheet">
	<link href="pat/assets/css/doctorcard.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: OneCare
	* Updated: Jul 27 2023 with Bootstrap v5.3.1
	* Template URL: https://bootstrapmade.com/OneCare-free-medical-bootstrap-theme/
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
	<style>
	h1, h2, h3, h4, h5, h6 {
		font-family: "Raleway", sans-serif;
  	}
	</style>

	<script>
		function fetchUserInfo() {
			// Make an AJAX request to get_user_info.php
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'getinfo.php', true);

			xhr.onload = function () {
				if (xhr.status === 200) {
					const response = JSON.parse(xhr.responseText);
					if (response.username != false) {
						const info = document.getElementById('user-info');
						info.innerHTML = `${response.username}`;
						const menu = document.getElementById('fill');
						menu.style.display = '';
						const logn = document.getElementById('logn');
						logn.style.display = 'none';
					}
					var count = document.getElementById('doc');
					count.setAttribute("data-purecounter-end", response.doc);
					count = document.getElementById('dep');
					count.setAttribute("data-purecounter-end", response.dep);
					count = document.getElementById('pat');
					count.setAttribute("data-purecounter-end", response.pat);
					count = document.getElementById('vis');
					count.setAttribute("data-purecounter-end", response.vis);
				} else {
					console.error('Error fetching user info:', xhr.statusText);
				}
			};

			xhr.onerror = function () {
				console.error('Network error');
			};

			xhr.send();
		}

		// Call the function to fetch user information.
		fetchUserInfo();
	</script>

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
			<!-- <a href="index.html" class="logo me-auto"><img src="pat/assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link active" href="#hero">Home</a></li>
					<li><a class="nav-link" href="#about">About</a></li>
					<li><a class="nav-link" href="pat/departments.php">Departments</a></li>
					<li><a class="nav-link" href="#doctors">Doctors</a></li>
					<li><a class="nav-link" href="#contact">Contact</a></li>
					<li id="fill" class="dropdown" style="display: none;">
						<a href="#">
							<Span id="user-info"></Span>
							<i class="bi bi-person-circle"></i>
						</a>
						<ul>
							<li>
								<a href="#">
									<span>Profile</span>
									<i class='bi bi-person-vcard'></i>
								</a>
							</li>
							<li>
								<a href="#">
									<span>Wallet</span>
									<i class='bi bi-wallet2'></i>
								</a>
							</li>
							<li>
								<a href="/project15/pat/mybooking.php">
									<span>My bookings</span> <i class="bi bi-journal-bookmark"></i>
								</a>
							</li>
							<li>
								<a href="/project15/pat/logout.php">
									<span>Sign out</span> <i class="bi bi-power"></i>
								</a>
							</li>
						</ul>
					</li>
					<li id="logn">
						<a href="/project15/pat/login.php">
							Sign-In
						</a>
					</li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

			<!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span>
				Appointment
			</a> -->

		</div>
	</header><!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container">
			<h1>Welcome to OneCare</h1>
			<h2>We are team of talented designers making websites with Bootstrap</h2>
			<a href="#about" class="btn-get-started scrollto">Get Started</a>
		</div>
	</section><!-- End Hero -->

	<main id="main">
		<div id="user-info"></div>
		<!-- ======= Why Us Section ======= -->
		<section id="why-us" class="why-us">
			<div class="container">

				<div class="row">
					<div class="col-lg-4 d-flex align-items-stretch">
						<div class="content">
							<h3>Why Choose OneCare?</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit,
								sed do eiusmod tempor incididunt ut labore et dolore
								magna aliqua. Duis aute irure dolor in reprehenderit
								Asperiores dolores sed et. Tenetur quia eos. Autem
								tempore quibusdam vel necessitatibus optio ad corporis.
							</p>
							<div class="text-center">
								<a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-8 d-flex align-items-stretch">
						<div class="icon-boxes d-flex flex-column justify-content-center">
							<div class="row">
								<div class="col-xl-4 d-flex align-items-stretch">
									<div class="icon-box mt-4 mt-xl-0">
										<i class="bx bx-receipt"></i>
										<h4>Corporis voluptates sit</h4>
										<p>
											Consequuntur sunt aut quasi enim aliquam quae
											harum pariatur laboris nisi ut aliquip
										</p>
									</div>
								</div>
								<div class="col-xl-4 d-flex align-items-stretch">
									<div class="icon-box mt-4 mt-xl-0">
										<i class="bx bx-cube-alt"></i>
										<h4>Ullamco laboris ladore pan</h4>
										<p>
											Excepteur sint occaecat cupidatat non proident,
											sunt in culpa qui officia deserunt
										</p>
									</div>
								</div>
								<div class="col-xl-4 d-flex align-items-stretch">
									<div class="icon-box mt-4 mt-xl-0">
										<i class="bx bx-images"></i>
										<h4>Labore consequatur</h4>
										<p>
											Aut suscipit aut cum nemo deleniti aut omnis.
											Doloribus ut maiores omnis facere
										</p>
									</div>
								</div>
							</div>
						</div><!-- End .content-->
					</div>
				</div>

			</div>
		</section><!-- End Why Us Section -->

		<!-- ======= About Section ======= -->
		<section id="about" class="about">
			<div class="container-fluid">

				<div class="row">
					<div
						class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
						<a href="https://www.youtube.com/watch?v=44UaY-AN6ho" class="glightbox play-btn mb-4"></a>
					</div>

					<div
						class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
						<h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
						<p>
							Esse voluptas cumque vel exercitationem. Reiciendis est
							hic accusamus. Non ipsam et sed minima temporibus laudantium.
							Soluta voluptate sed facere corporis dolores excepturi.
							Libero laboriosam sint et id nulla tenetur.
							Suscipit aut voluptate.
						</p>

						<div class="icon-box">
							<div class="icon"><i class="bx bx-fingerprint"></i></div>
							<h4 class="title"><a href="">Lorem Ipsum</a></h4>
							<p class="description">
								Voluptatum deleniti atque corrupti quos dolores
								et quas molestias excepturi sint
								occaecati cupiditate non provident
							</p>
						</div>

						<div class="icon-box">
							<div class="icon"><i class="bx bx-gift"></i></div>
							<h4 class="title"><a href="">Nemo Enim</a></h4>
							<p class="description">
								At vero eos et accusamus et iusto odio dignissimos
								ducimus qui blanditiis praesentium voluptatum
								deleniti atque
							</p>
						</div>

						<div class="icon-box">
							<div class="icon"><i class="bx bx-atom"></i></div>
							<h4 class="title"><a href="">Dine Pad</a></h4>
							<p class="description">
								Explicabo est voluptatum asperiores consequatur
								magnam.Et veritatis odit. Sunt aut
								deserunt minus aut eligendi omnis
							</p>
						</div>

					</div>
				</div>

			</div>
		</section><!-- End About Section -->

		<!-- ======= Counts Section ======= -->
		<section id="counts" class="counts">
			<div class="container">

				<div class="row justify-content-around">

					<div class="col-lg-3 col-md-6">
						<div class="count-box">
							<i class="fas fa-user-md"></i>
							<span id="doc" data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
								class="purecounter"></span>
							<p>Doctors</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 mt-5 mt-md-0">
						<div class="count-box">
							<i class="far fa-hospital"></i>
							<span id="dep" data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
								class="purecounter"></span>
							<p>Departments</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
						<div class="count-box">
							<i class="fas fa-user"></i>
							<span id="pat" data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
								class="purecounter"></span>
							<p>Patients</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
						<div class="count-box">
							<i class="fas fa-address-book"></i>
							<span id="vis" data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
								class="purecounter"></span>
							<p>Consultations</p>
						</div>
					</div>

				</div>

			</div>
		</section><!-- End Counts Section -->

		<!-- ======= Departments Section ======= -->
		<section id="departments" class="departments">
			<div class="container">

				<div class="section-title">
					<h2>Departments</h2>
					<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
						sint
						consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
						Quia
						fugiat sit
						in iste officiis commodi quidem hic quas.</p>
				</div>

				<div class="row gy-4">
					<div class="col-lg-3">
						<ul class="nav nav-tabs flex-column">
							<li class="nav-item">
								<a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Pediatrics</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-2">Cardiology</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-3">Neurology</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-4">Hepatology</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#tab-5">Eye Care</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-9">
						<div class="tab-content">
							<div class="tab-pane active show" id="tab-1">
								<div class="row gy-4">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
										<p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure
											voluptas iure
											porro quis
											delectus</p>
										<p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam
											necessitatibus aliquam
											fugiat debitis quis velit. Eum ex maxime error in consequatur corporis
											atque. Eligendi
											asperiores
											sed qui veritatis aperiam quia a laborum inventore</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="pat/assets/img/departments-1.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane " id="tab-2">
								<div class="row gy-4">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Cardiology</h3>
										<p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente
											dila parde
											sonata raqer
											a videna mareta paulona marka</p>
										<p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint.
											Laborum eos
											ipsum ipsa
											odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet
											eius et quis
											magni
											nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem
											vero</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="pat/assets/img/departments-2.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-3">
								<div class="row gy-4">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Et blanditiis nemo veritatis excepturi</h3>
										<p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente
											dila parde
											sonata raqer
											a videna mareta paulona marka</p>
										<p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et
											reiciendis
											sunt sunt
											est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates.
											Optio
											nesciunt eaque
											beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="pat/assets/img/departments-3.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-4">
								<div class="row gy-4">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Impedit facilis occaecati odio neque aperiam sit</h3>
										<p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non
											enim fuga.
											Qui natus
											non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
										<p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis
											quisquam.
											Neque
											necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed
											laboriosam a iste
											odio. Earum
											odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="pat/assets/img/departments-4.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-5">
								<div class="row gy-4">
									<div class="col-lg-8 details order-2 order-lg-1">
										<h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
										<p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro
											quia.</p>
										<p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis
											recusandae ut non
											quam ut
											quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed
											est sint
											aut vitae
											molestiae voluptate vel</p>
									</div>
									<div class="col-lg-4 text-center order-1 order-lg-2">
										<img src="pat/assets/img/departments-5.jpg" alt="" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section><!-- End Departments Section -->

		<!-- ======= Doctors Section ======= -->
		<section id="doctors" class="doctors">
			<div class="container">

				<div class="section-title">
					<h2>Doctors</h2>
					<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
						sint
						consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
						Quia
						fugiat sit
						in iste officiis commodi quidem hic quas.</p>
				</div>

				<div class="row">

					<div class="col-lg-6">
						<div class="member d-flex align-items-start">
							<div class="pic"><img src="doctorimage/e541f62abc7068517bb62d928a89cd5a_432df691efbe.jpg" class="img-fluid" alt="">
							</div>
							<div class="member-info">
								<h4>Jacob Thomas</h4>
								<span>Pediatrics</span>
								<p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
								<div class="social">
									<a href=""><i class="ri-twitter-fill"></i></a>
									<a href=""><i class="ri-facebook-fill"></i></a>
									<a href=""><i class="ri-instagram-fill"></i></a>
									<a href=""> <i class="ri-linkedin-box-fill"></i> </a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mt-4 mt-lg-0">
						<div class="member d-flex align-items-start">
							<div class="pic"><img src="doctorimage/doctors-1.jpg" class="img-fluid" alt="">
							</div>
							<div class="member-info">
								<h4>Gregory House</h4>
								<span>Pediatrics</span>
								<p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
								<div class="social">
									<a href=""><i class="ri-twitter-fill"></i></a>
									<a href=""><i class="ri-facebook-fill"></i></a>
									<a href=""><i class="ri-instagram-fill"></i></a>
									<a href=""> <i class="ri-linkedin-box-fill"></i> </a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mt-4">
						<div class="member d-flex align-items-start">
							<div class="pic"><img src="doctorimage/75153e8ba73a3707f25d09bf08a8f37b_5bd729544bff39661a.jpg" class="img-fluid" alt="">
							</div>
							<div class="member-info">
								<h4>Nandini Iyer</h4>
								<span>Orthopedics</span>
								<p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
								<div class="social">
									<a href=""><i class="ri-twitter-fill"></i></a>
									<a href=""><i class="ri-facebook-fill"></i></a>
									<a href=""><i class="ri-instagram-fill"></i></a>
									<a href=""> <i class="ri-linkedin-box-fill"></i> </a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mt-4">
						<div class="member d-flex align-items-start">
							<div class="pic"><img src="doctorimage/4b233cdb0a14ebf0170a7bf28ca55c8d_af80417d079f36f559d2.jpg" class="img-fluid" alt="">
							</div>
							<div class="member-info">
								<h4>Aparna Gupta</h4>
								<span>Orthopedics</span>
								<p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
								<div class="social">
									<a href=""><i class="ri-twitter-fill"></i></a>
									<a href=""><i class="ri-facebook-fill"></i></a>
									<a href=""><i class="ri-instagram-fill"></i></a>
									<a href=""> <i class="ri-linkedin-box-fill"></i> </a>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section><!-- End Doctors Section -->

		<!-- ======= Testimonials Section ======= -->
		<!-- <section id="testimonials" class="testimonials">
			<div class="container">

				<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
					<div class="swiper-wrapper">

						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="pat/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
									<h3>Saul Goodman</h3>
									<h4>Ceo &amp; Founder</h4>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
										suscipit rhoncus.
										Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus
										at
										semper.
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="pat/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
									<h3>Sara Wilsson</h3>
									<h4>Designer</h4>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
										quid cillum
										eram malis
										quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim
										culpa.
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="pat/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
									<h3>Jena Karlis</h3>
									<h4>Store Owner</h4>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
										veniam
										duis minim
										tempor labore quem eram duis noster aute amet eram fore quis sint minim.
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="pat/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
									<h3>Matt Brandon</h3>
									<h4>Freelancer</h4>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
										fugiat
										minim velit
										minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore
										illum
										veniam.
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial-item">
									<img src="pat/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
									<h3>John Larson</h3>
									<h4>Entrepreneur</h4>
									<p>
										<i class="bx bxs-quote-alt-left quote-icon-left"></i>
										Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
										noster veniam
										enim
										culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa
										fore nisi
										cillum
										quid.
										<i class="bx bxs-quote-alt-right quote-icon-right"></i>
									</p>
								</div>
							</div>
						</div>

					</div>
					<div class="swiper-pagination"></div>
				</div>

			</div>
		</section> -->
		<!-- End Testimonials Section -->

		<!-- ======= Gallery Section ======= -->
		<section id="gallery" class="gallery">
			<div class="container">

				<div class="section-title">
					<h2>Gallery</h2>
					<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
						sint
						consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
						Quia
						fugiat sit
						in iste officiis commodi quidem hic quas.</p>
				</div>
			</div>

			<div class="container-fluid">
				<div class="row g-0">

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<div class="col-lg-3 col-md-4">
						<div class="gallery-item">
							<a href="pat/assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
								<img src="pat/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
							</a>
						</div>
					</div>

				</div>

			</div>
		</section><!-- End Gallery Section -->

		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact">
			<div class="container">

				<div class="section-title">
					<h2>Contact</h2>
					<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
						sint
						consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
						Quia
						fugiat sit
						in iste officiis commodi quidem hic quas.</p>
				</div>
			</div>

			<div>
				<iframe style="border:0; width: 100%; height: 350px;"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3993.1485447338923!2d76.37628663504209!3d10.176210931111115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b08066d8c2c2ceb%3A0xbfb96c18873c470f!2sDe%20Paul%20Institute%20of%20Science%20%26%20Technology%20(DiST)%20Angamaly!5e0!3m2!1sen!2sin!4v1698761152734!5m2!1sen!2sin"
					frameborder="0" allowfullscreen></iframe>
			</div>

			<div class="container">
				<div class="row mt-5">

					<div class="col-lg-4">
						<div class="info">
							<div class="address">
								<a href="https://maps.app.goo.gl/LdieufXAramMmfcdA" target="_blank">
									<i class="bi bi-geo-alt"></i>
								</a>
								<h4>Location:</h4>
								<p>De Paul Nagar, Angamaly 683573, Kerala</p>
							</div>

							<div class="email">
								<a href="mailto:info@example.com">
									<i class="bi bi-envelope"></i>
								</a>
								<h4>Email:</h4>
								<p>info@example.com</p>
							</div>

							<div class="phone">
								<a href="tel:5589548855">
									<i class="bi bi-phone"></i>
								</a>
								<h4>Call:</h4>
								<p>+91 55895 48855</p>
							</div>

						</div>

					</div>

					<div class="col-lg-8 mt-5 mt-lg-0">

						<form action="forms/contact.php" method="post" role="form" class="php-email-form">
							<div class="row">
								<div class="col-md-6 form-group">
									<input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
										required>
								</div>
								<div class="col-md-6 form-group mt-3 mt-md-0">
									<input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
										required>
								</div>
							</div>
							<div class="form-group mt-3">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
									required>
							</div>
							<div class="form-group mt-3">
								<textarea class="form-control" name="message" rows="5" placeholder="Message"
									required></textarea>
							</div>
							<div class="my-3">
								<div class="loading">Loading</div>
								<div class="error-message"></div>
								<div class="sent-message">Your message has been sent. Thank you!</div>
							</div>
							<div class="text-center"><button type="submit">Send Message</button></div>
						</form>

					</div>

				</div>

			</div>
		</section><!-- End Contact Section -->

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">

		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 col-md-6 footer-contact">
						<h3>OneCare</h3>
						<p>
							De Paul Nagar<br>
							Angamaly 683573<br>
							Kerala<br>
							<br>
							<strong>Phone:</strong> <a class="link-dark" href="tel:5589548855">+91 55895 48855</a>
							<br>
							<strong>Email:</strong> <a class="link-dark"
								href="mailto:info@example.com">info@example.com</a><br>
						</p>
					</div>

					<div class="col-lg-2 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
						</ul>
					</div>

					<div class="col-lg-4 col-md-6 footer-newsletter ms-auto">
						<h4>Join Our Newsletter</h4>
						<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
						<form action="" method="post">
							<input type="email" name="email"><input type="submit" value="Subscribe">
						</form>
					</div>

				</div>
			</div>
		</div>

		<div class="container d-md-flex py-4">

			<div class="me-md-auto text-center text-md-start">
				<div class="copyright">
					&copy; Copyright <strong><span>OneCare</span></strong>. All Rights Reserved
				</div>
				<div class="credits">
					<!-- All the links in the footer should remain intact. -->
					<!-- You can delete the links only if you purchased the pro version. -->
					<!-- Licensing information: https://bootstrapmade.com/license/ -->
					<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/OneCare-free-medical-bootstrap-theme/ -->
					Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
				</div>
			</div>
			<div class="social-links text-center text-md-right pt-3 pt-md-0">
				<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
				<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
				<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
				<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
				<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
			</div>
		</div>
	</footer><!-- End Footer -->

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="pat/assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="pat/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="pat/assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="pat/assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="pat/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="pat/assets/js/main.js"></script>

</body>

</html>