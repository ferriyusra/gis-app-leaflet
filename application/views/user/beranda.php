<!-- header nav -->
<header class="header_area">
	<div class="container">
		<?= $this->session->flashdata('message'); ?>
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
						<a class="nav-link active" href="<?= base_url('User'); ?>">Beranda</a>
					</li>
					<li class="nav-item mx-md-2">
						<a class="nav-link" href="<?= base_url('User/petaToko'); ?>">Peta Toko</a>
					</li>
					<li class="nav-item mx-md-2">
						<a class="nav-link" href="<?= base_url('User/daftarToko'); ?>">Daftar Toko</a>
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
	<section class="site-banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 teks ">
					<h1>Sistem Informasi Geografis</h1>
					<p>
						Selamat datang diwebsite Sistem Informasi Geografis Peta
						Penyebaran Toko Oleh - Oleh Makanan Khas Bogor
					</p>
					<div class="site-buttons">
						<div class="d-flex flex-row flex-wrap">
							<button type="button" class="btn button primary-button mr-4 page-scroll" id="peta">
								Jelajahi Website
							</button>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 banner-image">
					<img src="<?= base_url('assets-frontend/'); ?>front-end/img/header/bg-0.png" alt="banner-img" class="img-fluid" />
				</div>
			</div>
		</div>
	</section>

	<!-- main peta -->
	<section class="peta" id="peta-main" class="main-peta mt-5">
		<div class="col-12">
			<div class="section-title text-center mb-4 pb-2">
				<h4 class="title title-line pb-5">Peta</h4>
				<p class="text-muted para-desc mx-auto mb-1">
					Peta Penyebaran Toko
				</p>
			</div>
		</div>
		<div class="mapclass" id="idmap">
			<div id="mapid" style="height: 600px;"></div>
		</div>
	</section>
	<!-- end peta -->


	<!-- daftar toko -->
	<section class="section bg-light">
		<div class="container">
			<!-- Header Sentence -->
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="section-title text-center mb-4 pb-2">
						<h4 class="title title-line pb-5">Daftar Toko</h4>
						<p class="text-muted para-desc mx-auto mb-1">
							Beberapa Daftar Toko
						</p>
					</div>
				</div>
			</div>

			<!-- List toko -->
			<div class="row">
				<div class="col-lg-12">
					<?php foreach ($toko as $t) : ?>
						<div class="toko-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
							<div class="lable text-center pt-2 pb-2">
								<ul class="list-unstyled best text-white mb-0 text-uppercase">
									<li class="list-inline-item">
										<i class="fas fa-store"></i>
									</li>
								</ul>
							</div>
							<div class="p-4">
								<div class="row align-items-center">
									<div class="col-md-2">
										<div class="mo-mb-2">
											<img src="<?= base_url('assets/img-db/') . $t['gambar']; ?> " alt="" class="img-fluid mx-auto d-block rounded-circle" style="width: 54px; height: 54px;" />
										</div>
									</div>
									<div class="col-md-3 text-center">
										<div>
											<h4 class="text-dark"><?= $t['nama_toko']; ?>
											</h4>
										</div>
									</div>
									<div class="col-md-3">
										<div>
											<p class="text-muted mb-0 text-center">
												<i class="fas fa-map-marker-alt mr-2"></i>
												<?= $t['alamat_toko']; ?>
											</p>
										</div>
									</div>
									<div class="col-md-2">
										<div>
											<p class="text-muted mb-0 mo-mb-2 text-center">
												<i class="fas fa-stopwatch mr-2"></i>Jam Buka dan Jam Tutup
												:
												<span class="text-primary"></span>
												<br /> <?= $t['jam_buka_jam_tutup']; ?>
												</span>
											</p>
										</div>
									</div>
									<div class="col-md-2">
										<div>
											<p class="text-muted mb-0 text-center">
												<i class="fas fa-phone mr-2"></i>No Telp :
												<span><?= $t['no_telp']; ?></span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="p-3 bg-light">
								<div class="row">
									<div class="col-md-12 text-center">
										<div>
											<a href="<?= base_url('User/tokoDetail/'); ?><?= $t['id_toko']; ?>" class="text-primary ">Lihat Detail
												<i class="fas fa-chevron-circle-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- End Of Loop -->
			</div>
		</div>
		<!-- end row -->

		<!-- More Button-->
		<div class="row">
			<div class="col-lg-12 mt-5 pt-2 mx-auto text-center">
				<a href="<?= base_url('User/daftarToko') ?>" class="btn btn-sm btn-outline-primary"> Lihat Semua >></a>
			</div>
		</div>
		</div>
	</section>
	<!-- all jobs end -->
	<!-- end daftartoko -->
</main>
<!--  ======================= End Main Area ================================ -->
<script>
	var map = L.map('mapid').setView([-6.596819, 106.805927], 14);

	// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	// 	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
	// }).addTo(map);
	var Layer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
	});
	map.addLayer(Layer);



	// marker icons
	var iconCostum = L.icon({
		iconUrl: '<?= base_url('assets/maps-icons/market.png') ?>',
		iconAnchor: [22, 28],
		iconSize: [38, 44],
		popupAnchor: [0, -30]
	});

	<?php foreach ($toko as $t) : ?>
		L.marker([<?= $t['latitude'] ?>, <?= $t['longitude'] ?>], {
			icon: iconCostum
		}).bindPopup(`<div class="col">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                            <h4 class="card-title font-16 mt-0">Nama Toko : <?= $t['nama_toko']; ?></h4>
											<a href="<?= base_url('User/tokoDetail/'); ?><?= $t['id_toko']; ?>" class="text-primary ">Lihat Detail
														<i class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                    </div>
                                    </div>`).addTo(map);
	<?php endforeach; ?>
</script>
