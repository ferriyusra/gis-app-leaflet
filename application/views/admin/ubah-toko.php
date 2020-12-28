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
        						<h4 class="page-title">Form Ubah Data Toko</h4>
        					</div>
        					<div class="col-sm-6">
        						<ol class="breadcrumb float-right">
        							<li class="breadcrumb-item"><a href="javascript:void(0);">Form Ubah Data Toko</a></li>
        						</ol>
        					</div>
        				</div> <!-- end row -->
        			</div>
        			<!-- end page-title -->
        			<div class="row">
        				<div class="col-lg-6">
        					<div class="card m-b-30">
        						<div class="card-body">
        							<h4 class="mt-0 header-title">Ubah Toko</h4>
        							<p class="sub-title">
        								<?php if (validation_errors()) : ?>
        									<div class="my-2">
        										<div class="alert alert-danger alert-dismissible fade show" role="alert">
        											<h2 class="text-center mt-1">Gagal Mengubah Data</h2>
        											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        												<span aria-hidden="true">×</span>
        											</button>
        											<h3>Kesalahan : </h3>
        											<strong> <?= validation_errors() ?></strong>
        										</div>
        									</div>
        								<?php endif; ?></p>
        							<?= form_open_multipart('admin/ubahToko'); ?>
        							<input type="hidden" name="id_toko" value="<?= $toko['id_toko']; ?>">
        							<div class="form-group">
        								<label>Nama Toko</label>
        								<input type="text" name="toko" class="form-control form-control-lg " placeholder="Nama Toko" value="<?= $toko['nama_toko']; ?>" />

        							</div>
        							<div class="form-group">
        								<label>Alamat Toko</label>
        								<textarea id="lokasi" type="text" name="alamat" class="form-control form-control-lg " rows="5" placeholder="Alamat Toko"><?= $toko['alamat_toko']; ?></textarea>

        							</div>
        							<div class="form-group">
        								<label>Latitude</label>
        								<input id="lat" type="text" name="latitude" class="form-control form-control-lg " placeholder="Latitude" readonly value="<?= $toko['latitude']; ?>" />

        							</div>
        							<div class="form-group">
        								<label>Longitude</label>
        								<input id="lng" type="text" name="longitude" class="form-control form-control-lg" placeholder="Longitude" readonly value="<?= $toko['longitude']; ?>" />

        							</div>
        							<!-- <div class="form-group">
        								<label>Deskripsi Toko</label>
        								<textarea id="lokasi" type="text" name="deskripsi" class="form-control form-control-lg " rows="5" placeholder="Deskripsi Toko"></textarea>
        							</div> -->
        							<div class="form-group">
        								<label>Deskripsi Toko</label>
        								<textarea id="elm1" name="deskripsi"><?= $toko['deskripsi_toko']; ?></textarea>
        							</div>
        							<div class="form-group">
        								<label>No Telpon</label>
        								<input type="text" name="no_telp" class="form-control form-control-lg " placeholder="No Telp Toko" value="<?= $toko['no_telp']; ?>" />

        							</div>
        							<div class="form-group">
        								<label>Jam Buka dan Jam Tutup</label>
        								<input type="text" name="jam" class="form-control form-control-lg " placeholder="Jam Buka dan Jam Tutup" value="<?= $toko['jam_buka_jam_tutup']; ?>" />

        							</div>
        							<div class="form-group">
        								<label>Gambar sekarang</label>
        								<div class="row">
        									<div class="col-sm-4">
        										<img src="<?= base_url('/assets/img-db/') . $toko['gambar']; ?>" class="img-thumbnail" name="old_img">
        									</div>
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="custom-file">
        									<input type="file" class="custom-file-input" id="image" name="image">
        									<label class="custom-file-label" for="image">Pilih Gambar Toko</label>

        								</div>
        							</div>

        							<div class="form-group">
        								<button type="submit" class="btn btn-lg btn-block btn-primary waves-effect waves-light" name="simpan">
        									Simpan
        								</button>
        								<button type="reset" class="btn  btn-lg btn-block btn-secondary waves-effect m-l-5">
        									Batal
        							</div>



        						</div>
        					</div>
        				</div> <!-- end col -->
        				<div class="col-lg-6">
        					<div class="card m-b-30">
        						<div class="card-body">
        							<div class="form-group">
        								<label>Pilih Lokasi</label>
        								<div id="mapid" style=" height: 800px;"></div>
        								<div class='pointer'> </div>
        							</div>
        						</div>
        					</div>


        				</div> <!-- end col -->





        			</div>
        			<!-- container-fluid -->

        		</div>
        		<!-- content -->

        		<script src="<?= base_url('assets/') ?>scripts/jquery-3.4.1.js"></script>



        		<!-- leaflet -->
        		<script>
        			// mendapatkan lokasi latitude dan longitude dengan cara drag marker, tetapi alamat tidak dapat
        			// var map = L.map('mapid').setView([-6.596819, 106.805927], 13);


        			// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        			//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        			// }).addTo(map);

        			// map.attributionControl.setPrefix(false);

        			// var marker = new L.marker([-6.596819, 106.805927], {
        			//     draggable: 'true'
        			// });


        			// marker.on('dragend', function(event) {
        			//     var position = marker.getLatLng();
        			//     marker.setLatLng(position, {
        			//         draggable: 'true'
        			//     }).bindPopup(position).update();
        			//     $("#lat").val(position.lat);
        			//     $("#lng").val(position.lng).keyup();
        			// });

        			// $("#lat, #lng").change(function() {
        			//     var position = [parseInt($("#lat").val()), parseInt($("#lng").val())];
        			//     marker.setLatLng(position, {
        			//         draggable: 'true'
        			//     }).bindPopup(position).update();
        			//     map.panTo(position);
        			// });

        			// map.addLayer(marker);
        			// end

        			// Control 2: This add a scale to the map
        			// L.control.scale().addTo(map);

        			// // Control 3: This add a Search bar
        			// var searchControl = new L.esri.Controls.Geosearch().addTo(map);

        			// var results = new L.LayerGroup().addTo(map);

        			// searchControl.on('results', function(data) {
        			//     results.clearLayers();
        			//     for (var i = data.results.length - 1; i >= 0; i--) {
        			//         results.addLayer(L.marker(data.results[i].latlng));
        			//     }
        			// });

        			// end


        			// mendapatkan alamat ketika marker ditaruh beserta lat dan lng nya

        			var latInput = document.querySelector("#lat");
        			var lngInput = document.querySelector("#lng");
        			var lokasiInput = document.querySelector("#lokasi");
        			var marker;
        			var map = L.map('mapid').setView([-6.596819, 106.805927], 15);
        			var geocodeService = L.esri.Geocoding.geocodeService();

        			// var Layer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        			// 	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        			// 	maxZoom: 18,
        			// 	id: 'mapbox.streets',
        			// 	accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        			// });
        			var Layer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        				attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        			});
        			map.addLayer(Layer);


        			map.on("click", function(e) {
        				var lat = e.latlng.lat;
        				var lng = e.latlng.lng;
        				if (!marker) {
        					marker = L.marker(e.latlng).addTo(map)
        				} else {
        					marker.setLatLng(e.latlng);
        				}


        				latInput.value = lat;
        				lngInput.value = lng;

        				$.ajax({
        					url: "https://nominatim.openstreetmap.org/reverse",
        					data: "lat=" + lat +
        						"&lon=" + lng +
        						"&format=json",
        					dataType: "JSON",
        					success: function(data) {
        						// console.log(data);
        						lokasiInput.value = data.display_name;
        					}
        				})

        				geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
        					if (error) {
        						return;
        					}
        					console.log(result);
        				});
        			})
        		</script>
