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
 							<a href="<?= base_url('User'); ?>" class="nav-link ">Beranda</a>
 						</li>
 						<li class="nav-item mx-md-2">
 							<a class="nav-link " href="<?= base_url('User/petaToko'); ?>">Peta Toko</a>
 						</li>
 						<li class="nav-item mx-md-2">
 							<a class="nav-link" href="<?= base_url('User/daftarToko') ?>">Daftar Toko</a>
 						</li>
 					</ul>


 					<!-- Mobile button -->
 					<form action="<?= base_url('Auth') ?>" class="form-inline d-sm-block d-md-none">
 						<button class="btn btn-login my-2 my-sm-0 px-4">
 							Admin
 						</button>
 					</form>

 					<!-- Dekstop button -->
 					<form action="<?= base_url('Auth') ?>" class="form-inline my-2 my-lg-0 d-none d-md-block">
 						<button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
 							Admin
 						</button>
 					</form>
 				</div>
 			</nav>
 		</div>
 	</header>
 	<!-- end header nav -->
 	<!-- main banner -->
 	<main class="site-main">
 		<!-- produk -->
 		<section class="daftar-produk">
 			<div class="container">
 				<div class="row justify-content-center">
 					<div class="col-12 mt-5">
 						<div class="section-title text-center mb-4 pb-2">
 							<h4 class="title title-line pb-5">Detail Produk Oleh - Oleh</h4>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="container">
 				<?php foreach ($produk as $k) : ?>
 					<div class="row">
 						<div class="col-md-3">
 							<img src="<?= base_url('assets/img-konten/') . $k['gambar_konten']; ?>" class="img-fluid" />
 						</div>
 						<div class="col-md">
 							<ul class="list-group">
 								<li class="list-group-item">
 									<h4><?= $k['nama_produk']; ?></h4>
 								</li>
 								<li class="list-group-item">
 									<strong>Harga : Rp.<?= number_format($k['harga']); ?></strong>
 								</li>
 								<li class="list-group-item">
 									<strong>Deskripsi : <?= $k['deskripsi']; ?></strong>
 								</li>
 							</ul>
 						</div>
 					<?php endforeach; ?>
 					</div>
 			</div>

 		</section>
 		<!-- BLOG LIST END -->
