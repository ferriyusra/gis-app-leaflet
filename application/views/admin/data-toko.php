        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
        	<!-- Start content -->
        	<div class="content">
        		<div class="container-fluid">
        		</div>
        		<div class="page-title-box">
        			<!-- sweetalert -->
        			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        			<div class="row align-items-center">
        				<div class="col-sm-6">
        					<h4 class="page-title">Data Toko</h4>
        				</div>
        				<div class="col-sm-6">
        					<ol class="breadcrumb float-right">
        						<li class="breadcrumb-item"><a href="javascript:void(0);">Data Toko</a></li>
        					</ol>
        				</div>
        			</div> <!-- end row -->
        		</div>
        		<!-- end page-title -->

        		<div class="row">
        			<div class="col-12">
        				<div class="card m-b-30">
        					<div class="card-body">
        						<div class="row">
        							<div class="col-4">
        								<a href="<?= base_url('admin/tambahToko'); ?>" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0 ">Tambah Data</a>
        							</div>
        						</div>
        						<table id="datatable" class="table table-responsive table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        							<thead>
        								<tr>
        									<th>No</th>
        									<th>Nama Toko</th>
        									<th>Lokasi</th>
        									<th>Latitude</th>
        									<th>Longitude</th>
        									<th>Deskripsi Toko</th>
        									<th>No Telp</th>
        									<th>Jam Buka dan Jam Tutup</th>
        									<th>Gambar Toko</th>
        									<th>Aksi</th>
        								</tr>
        							</thead>


        							<tbody>
        								<?php $i = 1;
										foreach ($toko as $t) : ?>
        									<tr>
        										<td><?= $i; ?></td>
        										<td><?= $t['nama_toko']; ?></td>
        										<td><?= $t['alamat_toko']; ?></td>
        										<td><?= $t['latitude']; ?></td>
        										<td><?= $t['longitude']; ?></td>
        										<td><?= character_limiter($t['deskripsi_toko'], 50); ?></td>
        										<td><?= $t['no_telp']; ?></td>
        										<td><?= $t['jam_buka_jam_tutup']; ?></td>
        										<td>
        											<img style="width: 100%;" src="<?= base_url('assets/img-db/') . $t['gambar']; ?> ">
        										</td>
        										<td class="text-center">
        											<a class="btn btn-md btn-danger tombol-hapus" href="<?= base_url('admin/hapusToko/'); ?><?= $t['id_toko']; ?>">Hapus</a>
        											<a class="btn btn-md btn-success" href="<?= base_url('admin/ubahToko/'); ?><?= $t['id_toko']; ?>">Ubah</a>
        										</td>
        									</tr>
        									<?php $i++; ?>
        								<?php endforeach; ?>
        							</tbody>
        						</table>
        					</div>
        				</div>
        			</div> <!-- end col -->
        		</div> <!-- end row -->
        	</div>
        	<!-- container-fluid -->

        </div>
        <!-- content -->