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
        						<h4 class="page-title">Selamat datang <?= $admin['nama_admin']; ?></h4>
        					</div>
        					<div class="col-sm-6">
        						<ol class="breadcrumb float-right">
        							<li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard admin</a></li>
        						</ol>
        					</div>
        				</div> <!-- end row -->
        			</div>
        			<!-- end page-title -->


        			<div class="row">

        				<div class="col-md-6 col-lg-6">
        					<div class="card">
        						<div class="card-heading p-4">
        							<div class="mini-stat-icon float-right">
        								<i class="mdi mdi-store bg-primary  text-white"></i>
        							</div>
        							<div>
        								<h5 class="font-16">Data Toko</h5>
        							</div>
        							<h3 class="mt-4"><?= $toko; ?></h3>
        						</div>
        					</div>
        				</div>

        				<div class="col-md-6 col-lg-6">
        					<div class="card">
        						<div class="card-heading p-4">
        							<div class="mini-stat-icon float-right">
        								<i class="mdi mdi-cookie bg-success text-white"></i>
        							</div>
        							<div>
        								<h5 class="font-16">Data Produk</h5>
        							</div>

        							<h3 class="mt-4"><?= $produk; ?></h3>
        						</div>
        					</div>
        				</div>

        			</div>


        		</div>
        		<!-- container-fluid -->

        	</div>
        	<!-- content -->
