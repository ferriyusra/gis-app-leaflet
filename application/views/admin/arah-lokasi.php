						<!-- ============================================================== -->
						<!-- Start right Content here -->
						<!-- ============================================================== -->
						<div class="content-page">
							<!-- Start content -->
							<div class="content">
								<div class="container-fluid">
									<div class="page-title-box">
										<div class="row align-items-center">
											<div class="col-sm-6">
												<h4 class="page-title">Tampil Arah Rute Lokasi</h4>
											</div>
											<div class="col-sm-6">
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item"><a href="javascript:void(0);">Peta</a></li>
													<li class="breadcrumb-item active">Tampil Arah Rute Lokasi</li>
												</ol>
											</div>
										</div> <!-- end row -->
									</div>
									<!-- end page-title -->

									<div class="row">
										<div class="col-lg-12">
											<div class="card m-b-20">
												<div class="card-body">

													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Latitude</label>
																<input type="text" name="latNow" class="form-control form-control-lg " placeholder="Latitude" />
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>longitude</label>
																<input type="text" name="lngNow" class="form-control form-control-lg " placeholder="longitude" />
															</div>
														</div>
														<div class="col-md-4">
															<button class="dariSini btn btn-primary btn-lg waves-effect waves-light mt-4 ml-0 "> <i class="fa fa-map-marker"></i> Tampilkan Lokasi Saya</button>
														</div>
													</div>

													<div id="mapid" style=" height: 800px;"></div>
												</div>
											</div>
										</div> <!-- end col -->

									</div> <!-- end row -->

								</div>
								<!-- container-fluid -->

							</div>
							<!-- content -->
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
															<btn href="" id="" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0 keSini" data-lat="<?= $t['latitude']; ?>" data-lng="<?= $t['longitude']; ?>">Ke sini</btn>
															
															
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
									reverseWaypoints: true,
									showAlternatives: true,
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
										var pos = i + 1;

										if (pos == 1) {
											urlIcon = '<?= base_url('assets/maps-icons/male.png') ?>';
										} else if (pos == n) {
											urlIcon = '<?= base_url('assets/maps-icons/finish.png') ?>';
										} else {
											urlIcon = '<?= base_url('assets/maps-icons/walk.png') ?>';
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
								// function keSini(latitude, longitude) {
								// 	let latLng = L.latLng(latitude, longitude);
								// 	control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
								// }
							</script>
