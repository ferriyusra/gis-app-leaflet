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
        						<h4 class="page-title">Peta Penyebaran</h4>
        					</div>
        					<div class="col-sm-6">
        						<ol class="breadcrumb float-right">
        							<li class="breadcrumb-item"><a href="javascript:void(0);">Peta</a></li>
        							<li class="breadcrumb-item active">Peta Lokasi</li>
        						</ol>
        					</div>
        				</div> <!-- end row -->
        			</div>
        			<!-- end page-title -->


        			<div class="row">
        				<div class="col-lg-12">
        					<div class="card m-b-20">
        						<div class="card-body">
        							<div id="mapid" style=" height: 800px;"></div>
        						</div>
        					</div>
        				</div> <!-- end col -->

        			</div> <!-- end row -->

        		</div>
        		<!-- container-fluid -->

        	</div>
        	<!-- content -->
        	<!-- leaflet -->
        	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        	<script>
        		var map = L.map('mapid').setView([-6.596819, 106.805927], 16);

        		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
        		}).addTo(map);



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
        	</script>
