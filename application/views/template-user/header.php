<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="#">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/bootstrap_v4/css/bootstrap.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/fontawesome/css/all.css" />

	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/owlcarousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets-frontend/'); ?>front-end/libraries/owlcarousel/owl.theme.default.min.css" />


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
	<style>
		.leaflet-routing-add-waypoint {
			display: none;
		}
	</style>
	<title><?= $title; ?></title>
</head>

<body>