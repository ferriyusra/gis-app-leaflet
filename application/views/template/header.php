<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?= $title; ?></title>
	<meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
	<meta content="Themesdesign" name="author" />
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico">



	<!-- leaflet -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/leaflet/leaflet.css" />
	<script src="<?= base_url('assets'); ?>/leaflet/leaflet.js"></script>

	<!-- Load Esri Leaflet from CDN -->
	<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js" integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ==" crossorigin=""></script>

	<!-- load leaflet routing machine -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>leaflet-routing-machine/dist/leaflet-routing-machine.css" />
	<script src="<?= base_url('assets/'); ?>leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
	<script src="<?= base_url('assets/'); ?>leaflet-routing-machine/examples/Control.Geocoder.js"></script>

	<!-- Load Esri Leaflet Geocoder from CDN -->
	<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css" integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g==" crossorigin="">
	<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js" integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ==" crossorigin=""></script>


	<!-- Sweet Alert -->
	<link href="<?= base_url('assets/'); ?>plugins/sweet-alert2/sweetalert2.css" rel="stylesheet" type="text/css">

	<!-- DataTables -->
	<link href="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/'); ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="<?= base_url('assets/'); ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">

	<!-- rangepicker -->


	<style>
		.coordinates {
			background: rgba(0, 0, 0, 0.5);
			color: #fff;
			position: absolute;
			bottom: 80px;
			left: 20px;
			padding: 5px 10px;
			margin: 0;
			font-size: 18px;
			line-height: 18px;
			border-radius: 3px;
			display: none;
		}

		.pointer {
			position: absolute;
			top: 86px;
			left: 60px;
			z-index: 99999;
		}

		/* menghilangkan start dan end rute */
		.leaflet-routing-geocoder {
			display: none;
		}

		.leaflet-routing-add-waypoint {
			display: none;
		}

		.leaflet-routing-reverse-waypoints {
			display: none;
		}
	</style>


</head>

<body class="fixed-left">

	<!-- Begin page -->
	<div id="wrapper">

		<!-- Top Bar Start -->
		<div class="topbar">

			<!-- LOGO -->
			<div class="topbar-left">
				<a href="index.html" class="logo">
					<span class="logo-light">
						<i class="mdi mdi-camera-control"></i> SIG
					</span>
					<span class="logo-sm">
						<i class="mdi mdi-camera-control"></i>
					</span>
				</a>
			</div>

			<nav class="navbar-custom">
				<ul class="navbar-right list-inline float-right mb-0">


					<li class="dropdown notification-list list-inline-item">
						<div class="dropdown notification-list nav-pro-img">
							<a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<img src="<?= base_url('assets/') ?>images/default.png" alt="user" class="rounded-circle">
							</a>
							<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
								<!-- item-->
								<a class="dropdown-item text-danger" href="<?= base_url('Auth/keluarAdmin') ?>"><i class="mdi mdi-power text-danger"></i> Keluar</a>
							</div>
						</div>
					</li>

				</ul>

				<ul class="list-inline menu-left mb-0">
					<li class="float-left">
						<button class="button-menu-mobile open-left waves-effect">
							<i class="mdi mdi-menu"></i>
						</button>
					</li>
				</ul>

			</nav>

		</div>
		<!-- Top Bar End -->
