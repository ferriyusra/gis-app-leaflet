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
 							<a class="nav-link" href="<?= base_url('User'); ?>">Beranda</a>
 						</li>
 						<li class="nav-item mx-md-2">
 							<a class="nav-link" href="<?= base_url('User/petaToko'); ?>">Peta Toko</a>
 						</li>
 						<li class="nav-item mx-md-2">
 							<a class="nav-link active" href="<?= base_url('User/daftarToko'); ?>">Daftar Toko</a>
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
 	<!-- start main -->
 	<main class="site-main">
 		<section class="bg-half page-next-level">
 			<div class="bg-overlay"></div>
 			<div class="container">
 				<div class="row justify-content-center">
 					<div class="col-md-6">
 						<div class="text-center text-white">
 							<h4 class="text-uppercase title mb-4">Toko</h4>
 							<p class="leader">Semua Daftar Toko</p>
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>
 		<!--end -carousel-->

 		<section class="section">
 			<div class="container">
 				<div class="row">
 					<?php foreach ($toko as $t) : ?>
 						<div class="col-lg-4 col-md-6 mb-4 pb-2">
 							<div class="blog position-relative overflow-hidden shadow rounded">
 								<div class="position-relative overflow-hidden">
 									<img src="<?= base_url('assets/img-db/') . $t['gambar']; ?> " class="img-fluid rounded-top" style="width:100%; height:190px;" />
 									<div class="overlay rounded-top bg-dark"></div>
 								</div>
 								<div class="content p-4">
 									<h4>
 										<a href="" class="title text-dark"><?= $t['nama_toko']; ?></a>
 									</h4>
 									<p class="text-muted">
 										<?= character_limiter($t['deskripsi_toko'], 50); ?>
 									</p>
 									<a href="<?= base_url('User/tokoDetail/'); ?><?= $t['id_toko']; ?>" class="text-dark readmore">Baca Detail <i class="fas fa-chevron-right"></i></a>
 								</div>
 							</div>
 						</div>
 					<?php endforeach; ?>
 					<!--end col-->
 				</div>
 			</div>
 		</section>
 	</main>
