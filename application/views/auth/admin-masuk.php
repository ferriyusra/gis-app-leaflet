<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/bootstrap_v4/css/bootstrap.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/fontawesome/css/all.css" />
	<!--  Magnific Popup css file  -->
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/vendor/Magnific-Popup/dist/magnific-popup.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/fontawesome/css/fontawesome.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/fontawesome/css/brands.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/owlcarousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/owlcarousel/owl.theme.default.min.css" />


	<!-- aos -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<!-- leaflet -->
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/leaflet/leaflet.css" />
	<script src="<?= base_url('assets-frontend/'); ?>front-end/leaflet/leaflet.js"></script>

	<!-- Load Esri Leaflet from CDN -->
	<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js" integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ==" crossorigin=""></script>

	<!-- load leaflet routing machine -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>leaflet-routing-machine/dist/leaflet-routing-machine.css" />
	<script src="<?= base_url('assets/'); ?>leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
	<script src="<?= base_url('assets/'); ?>leaflet-routing-machine/examples/Control.Geocoder.js"></script>

	<!-- Load Esri Leaflet Geocoder from CDN -->
	<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css" integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g==" crossorigin="">
	<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js" integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ==" crossorigin=""></script>

	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/styles/style.css" />
	<title><?= $title; ?></title>
</head>

<body>
	<!-- header nav -->
	<header class="header_area">
		<div class="container">
			<nav class="row navbar navbar-expand-lg navbar-light bg-white">
				<a href="#" class="navbar-brand">
					<img src="<?= base_url('assets-frontend/'); ?>front-end/img/logo/logo.svg" />
				</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navb">
					<ul class="navbar-nav ml-auto mr-3">
						<li class="nav-item mx-md-2">
							<a class="nav-link " href="<?= base_url('User'); ?>">Beranda</a>
						</li>
						<li class="nav-item mx-md-2">
							<a class="nav-link" href="<?= base_url('User/petaToko'); ?>">Peta Toko</a>
						</li>
						<li class="nav-item mx-md-2">
							<a class="nav-link" href="<?= base_url('User/daftarToko'); ?>">Daftar Toko</a>
						</li>
					</ul>

					<!-- Mobile button -->
					<form action="<?= base_url('auth'); ?>" class="form-inline d-sm-block d-md-none">
						<button class="btn btn-login my-2 my-sm-0 px-4">
							Admin
						</button>
					</form>

					<!-- Dekstop button -->
					<form action="<?= base_url('auth'); ?>" class="form-inline my-2 my-lg-0 d-none d-md-block">
						<button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
							Admin
						</button>
					</form>
				</div>
			</nav>
		</div>
	</header>
	<!-- end header nav -->

	<div class="container">
		<div class="row py-5 mt-4 align-items-center">
			<!-- For Demo Purpose -->
			<div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
				<img src="<?= base_url('assets-frontend/'); ?>front-end/img/header/bg-2.png" alt="" class="img-fluid mb-3 d-none d-md-block" />
			</div>

			<!-- Registeration Form -->
			<div class="col-md-7 col-lg-6 ml-auto">
				<h2 class="text-center">Masuk Halaman Admin</h2>
				<br />
				<form method="post" action="<?= base_url('auth') ?>">
					<?= $this->session->flashdata('message'); ?>
					<div class="row">
						<!-- First Name -->
						<div class="input-group col-lg-12 mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-white px-4 border-md border-right-0">
									<i class="fa fa-user text-muted"></i>
								</span>
							</div>
							<input id="nama" type="text" name="nama_pengguna" placeholder="Nama Pengguna" class="form-control bg-white border-left-0 border-md" autocomplete="off" />
						</div>
						<?= form_error('nama_pengguna', ' <small class="form-text text-danger pl-3">', '</small>'); ?>

						<!-- Password -->
						<div class="input-group col-lg-12 mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text bg-white px-4 border-md border-right-0">
									<i class="fa fa-lock text-muted"></i>
								</span>
							</div>
							<input id="password" type="password" name="password" placeholder="Kata Sandi" class="form-control bg-white border-left-0 border-md" />
						</div>
						<?= form_error('password', ' <small class="form-text text-danger pl-3">', '</small>'); ?>
						<!-- Social Login -->
						<div class="form-group col-lg-12 mx-auto">
							<button class="btn btn-primary btn-block py-2 btn-twitter">
								<i class="fas fa-sign-in-alt mr-2"></i>
								<span class="font-weight-bold">Masuk Admin</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--  ======================= End Main Area ================================ -->

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url('assets-frontend/'); ?>front-end/libraries/bootstrap_v4/js/jquery-3.4.1.min.js"></script>
	<script src="<?= base_url('assets-frontend/'); ?>front-end/libraries/bootstrap_v4/js/bootstrap.js"></script>
	<script src="<?= base_url('assets-frontend/'); ?>front-end/libraries/owlcarousel/owl.carousel.min.js"></script>
	<!-- aos -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!--  isotope js library  -->
	<script src="<?= base_url('assets-frontend/'); ?>front-end/vendor/isotope/isotope.min.js"></script>

	<!--  Magnific popup script file  -->
	<script src="<?= base_url('assets-frontend/'); ?>front-end/vendor/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('assets-frontend/'); ?>front-end/scripts/main.js"></script>
	<script>
		$(function() {
			$("input, select").on("focus", function() {
				$(this)
					.parent()
					.find(".input-group-text")
					.css("border-color", "#80bdff");
			});
			$("input, select").on("blur", function() {
				$(this)
					.parent()
					.find(".input-group-text")
					.css("border-color", "#ced4da");
			});
		});
	</script>
</body>

</html>
