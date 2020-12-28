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
        					<h4 class="page-title">Data Pendiri Toko</h4>
        				</div>
        				<div class="col-sm-6">
        					<ol class="breadcrumb float-right">
        						<li class="breadcrumb-item"><a href="javascript:void(0);">Data Pendiri Toko</a></li>
        					</ol>
        				</div>
        			</div> <!-- end row -->
        		</div>
        		<!-- end page-title -->

        		<div class="row">
        			<div class="col-lg-9">
        				<div class="card m-b-30">
        					<div class="card-body">
        						<div class="row">
        							<div class="col-4">
        								<a href="<?= base_url('admin/tambahPendiri'); ?>" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0 ">Tambah Data</a>
        							</div>
        						</div>
        						<table id="datatable" class="table table-responsive table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        							<thead>
        								<tr>
        									<th>No</th>
        									<th>Nama Toko</th>
        									<th>Nama Pendiri</th>
        									<th>Gambar Pendiri</th>
        									<th>Deskripsi Pendiri</th>
        									<th>Aksi</th>
        								</tr>
        							</thead>
        							<tbody>
        								<?php $i = 1;
										foreach ($pendiriJoin as $t) : ?>
        									<tr>
        										<td><?= $i; ?></td>
        										<td><?= $t['nama_toko']; ?></td>
        										<td><?= $t['nama_pendiri']; ?></td>
        										<td class="text-center">
        											<img class="img-fluid" style="width: 100px;" src="<?= base_url('assets/img-pendiri/') . $t['gambar_pendiri']; ?> ">
        										</td>
        										<td><?= character_limiter($t['deskripsi_pendiri'], 50); ?></td>
        										<td class="text-center">
        											<a class="btn btn-md btn-danger  tombol-hapus-pendiri" href="<?= base_url('admin/hapusPendiri/'); ?><?= $t['id_pendiri']; ?>">Hapus</a>
        											<a class="btn btn-md btn-success" href="<?= base_url('admin/ubahPendiri/'); ?><?= $t['id_pendiri']; ?>">Ubah</a>
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
