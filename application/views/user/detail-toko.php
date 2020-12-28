<!-- main banner -->
<main class="site-main">
	<section class="bg-half page-next-level">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="text-center text-white">
						<h4 class="text-uppercase title mb-4">Toko</h4>
						<p class="leader">Detail Informasi Toko</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- BLOG LIST START -->
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-7">

					<div class="job-detail border rounded p-4">
						<div class="job-detail-content">
							<img src="/" alt="" class="img-fluid float-left mr-md-3 mr-2 mx-auto d-block" style="max-width: 100%; height:auto;" />
							<div class="job-detail-com-desc overflow-hidden d-block">
								<h4 class="mb-2">
									<i class="fas fa-store mr-2"></i><span><?= $toko['nama_toko']; ?></span>
								</h4>
								<h5 class="mt-3">
									<i class="fas fa-stopwatch mr-2"></i><span><?= $toko['jam_buka_jam_tutup']; ?></span>
								</h5>
								<h5 class="mt-3">
									<i class="fas fa-phone mr-2"></i><span><?= $toko['no_telp']; ?></span>
								</h5>
							</div>
						</div>

						<div class="job-detail-desc mt-4">
							<div class="clearfix post-recent mb-3">
								<div class="text-center">
									<a href="#" class="text-center">
										<img alt="img-fluid rounded" src="<?= base_url('/assets/img-db/') . $toko['gambar']; ?>" class="img-fluid rounded" /></a>
								</div>
							</div>
							<p class="text-muted mb-3">
								<?= $toko['deskripsi_toko']; ?>
							</p>
						</div>
					</div>
					<!-- produk -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-5 mt-4">
					<div class="job-detail border rounded p-4">
						<h5 class="text-muted text-center pb-2">
							<i class="fas fa-map-marker-alt mr-2"></i><span>Jalan </span> <?= $toko['alamat_toko']; ?>
						</h5>

						<div class="job-detail-location pt-4 border-top">
							<div class="job-details-desc-item">
								<div id="mapid" style="height: 800px;"></div>
							</div>
						</div>
					</div>

					<div class="job-detail border rounded mt-4 p-4">
						<h5 class="text-muted text-center pb-2">
							<i class="mdi mdi-clock-outline mr-2"></i>Tampilkan Lokasi Saya
						</h5>

						<div class="job-detail-time border-top pt-2">
							<ul class="list-inline mb-0">
								<li class="clearfix text-muted border-bottom mt-3">
									<div class="form-group">
										<label>Latitude</label>
										<input type="text" name="latNow" class="form-control form-control-lg" placeholder="Latitude" readonly />
									</div>
									<div class="form-group">
										<label>Longitude</label>
										<input type="text" name="lngNow" class="form-control form-control-lg" placeholder="Longitude" readonly />
									</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="job-detail border rounded mt-4">
						<a href="#" class="dariSini btn btn-primary btn-block">
							<i class="fas fa-map-marker-alt mr-2"></i>Tampilkan Lokasi
							Saya</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- JOB DETAILS END -->

	<!-- produk -->
	<section class="daftar-produk">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 mt-5">
					<div class="section-title text-center mb-4 pb-2">
						<h4 class="title title-line pb-5">Produk Oleh - Oleh</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="customers-testimonials" class="owl-carousel">
						<!--PRODUK -->
						<?php foreach ($produk as $k) : ?>
							<div class="item">
								<div class="shadow-effect">
									<img class="img-fluid rounded-circle" src="<?= base_url('assets/img-konten/') . $k['gambar_produk']; ?>" />
									<h5 class="text-uppercase"><?= $k['nama_produk']; ?></h5>
									<p class="text-dark">Rp.<?= number_format($k['harga']); ?></p>
								</div>
								<input type="button" value="Detail Oleh-Oleh" id="<?= $k['id']; ?>" class="testimonial-name btn btn-sm view_data">
								</input>
							</div>
						<?php endforeach; ?>
						<!--END OF PRODUK-->
					</div>
				</div>
			</div>
		</div>


		<!-- view Modal -->
		<div class="modal fade" id="produkModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Detail Oleh - Oleh</h4>
					</div>
					<div class="modal-body">

						<div id="produk_result"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- BLOG LIST END -->
	<section class="daftar-produk mt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 mt-5">
					<div class="section-title text-center mb-4 pb-2">
						<h4 class="title title-line pb-5">Profile Pendiri Toko</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section mb-5">
		<div class="container">
			<div class="row">
				<?php foreach ($pendiri as $p) : ?>
					<div class="col-lg-12 col-md-5 mt-4">
						<div class="job-detail border rounded p-4">
							<h5 class="text-dark text-center pb-2">
								<i class="fas fa-user-circle"></i> <?= $p['nama_pendiri']; ?>
							</h5>

							<div class="job-detail-location pt-4 border-top text-center">
								<div class="job-details-desc-item">
									<img class="img-fluid" src="<?= base_url('assets/img-pendiri/') . $p['gambar_pendiri']; ?>" style="width:auto;" />
								</div>
							</div>
							<p class="text-dark text-center mt-5">
								<?= $p['deskripsi_pendiri']; ?>
							</p>
						</div>

					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>


</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
	let latLng = [-6.596819, 106.805927];
	var map = L.map('mapid').setView(latLng, 16);
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


	L.marker([<?= $toko['latitude'] ?>, <?= $toko['longitude'] ?>], {
		icon: iconCostum
	}).bindPopup(`<div class="col">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                            <h4 class="card-title font-16 mt-0">Nama Toko : <?= $toko['nama_toko']; ?></h4>
											<btn href="" id="" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0 keSini" data-lat="<?= $toko['latitude']; ?>" data-lng="<?= $toko['longitude']; ?>">Tampilkan Arah Rute</btn>
                                    </div>
                                    </div>
                                    </div>`).addTo(map);



	// ambil lokasi saya
	getLocation();

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {
		$("[name=latNow]").val(position.coords.latitude);
		$("[name=lngNow]").val(position.coords.longitude);
	}

	// rute
	var control = L.Routing.control({
		waypoints: [
			latLng
		],
		geocoder: L.Control.Geocoder.nominatim(),
		routeWhileDragging: true,
		reverseWaypoints: false,
		showAlternatives: false,
		altLineOptions: {
			styles: [{
					color: 'black',
					opacity: 0.15,
					weight: 9
				},
				{
					color: 'white',
					opacity: 0.8,
					weight: 6
				},
				{
					color: 'blue',
					opacity: 0.5,
					weight: 2
				}
			]
		},
		createMarker: function(i, waypoint, n) {
			let urlIcon;
			console.log(i + ", " + n);
			if (i == 0) {
				urlIcon = '<?= base_url('assets/maps-icons/male.png') ?>';
			} else if ((i + 1) == n) {
				urlIcon = '<?= base_url('assets/maps-icons/finish.png') ?>';
			}

			const marker = L.marker(waypoint.latLng, {
				draggable: true,
				bounceOnAdd: false,
				bounceOnAddOptions: {
					duration: 1000,
					height: 800,
					function() {
						(bindPopup(myPopup).openOn(map))
					}
				},
				icon: L.icon({
					iconUrl: urlIcon,
					iconSize: [38, 45]
				})
			});
			return marker;
		}
	})
	control.addTo(map);

	$(document).on("click", ".keSini", function() {
		let latLng = [$(this).data('lat'), $(this).data('lng')];
		control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
	})

	$(document).on("click", ".dariSini", function() {
		let latLng = [$("[name=latNow]").val(), $("[name=lngNow]").val()];
		control.spliceWaypoints(0, 1, latLng);
		map.panTo(latLng);
	})
</script>
