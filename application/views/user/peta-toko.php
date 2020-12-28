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
 							<a class="nav-link active" href="<?= base_url('User/petaToko'); ?>">Peta Toko</a>
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
 		<!-- main peta -->
 		<section id="peta" class="main-peta mt-5">
 			<div class="col-12">
 				<div class="section-title text-center mb-4 pb-2">
 					<h4 class="title title-line pb-5">Peta</h4>
 					<p class="text-muted para-desc mx-auto mb-1">
 						Peta Penyebaran Toko
 					</p>
 				</div>
 			</div>

 			<div class="row mx-auto">
 				<div class="col-lg-9 col-md-7">
 					<div class="job-detail border rounded p-4">
 						<div class="job-detail-content">
 							<div id="mapid" style="height: 600px;"></div>
 						</div>
 					</div>

 					<!-- produk -->
 				</div>

 				<div class="col-lg-3 col-md-5 mt-4 mt-sm-0">
 					<div class="job-detail border rounded p-4">
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
 										<label>longitude</label>
 										<input type="text" name="lngNow" class="form-control form-control-lg" placeholder="longitude" readonly />
 									</div>
 								</li>
 							</ul>
 						</div>
 					</div>

 					<div class="job-detail border rounded mt-4">
 						<button class="dariSini btn btn-primary btn-block">
 							<i class="fas fa-map-marker-alt mr-2"></i>Tampilkan Lokasi
 							Saya</button>

 					</div>
 				</div>
 			</div>

 		</section>
 		<!-- end peta -->
 	</main>
 	<!--  ======================= End Main Area ================================ -->
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

 		<?php foreach ($toko as $t) : ?>
 			L.marker([<?= $t['latitude'] ?>, <?= $t['longitude'] ?>], {
 				icon: iconCostum
 			}).bindPopup(`<div class="col">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                            <h4 class="card-title font-16 mt-0">Nama Toko : <?= $t['nama_toko']; ?></h4>
											<btn href="" id="" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0 keSini" data-lat="<?= $t['latitude']; ?>" data-lng="<?= $t['longitude']; ?>">Tampilkan Arah Rute</btn>
											
											
                                    </div>
                                    </div>
                                    </div>`).addTo(map);
 		<?php endforeach; ?>


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
 				// var pos = i + 1;

 				if (i == 0) {
 					urlIcon = '<?= base_url('assets/maps-icons/male.png') ?>';
 				} else if ((i + 1) == n) {
 					urlIcon = '<?= base_url('assets/maps-icons/finish.png') ?>';
 				}


 				//  if (i == 0) {
 				// 	urlIcon = '<('assets/maps-icons/male.png') ?>';
 				// } else if ((i + 1) == n) {
 				// 	urlIcon = '('assets/maps-icons/finish.png') ?>';
 				// }


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
