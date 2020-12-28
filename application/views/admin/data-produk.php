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
					<h4 class="page-title">Data Produk Toko</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="javascript:void(0);">Data Produk Toko</a></li>
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
								<a href="<?= base_url('admin/tambahProduk'); ?>" class="btn btn-primary btn-lg waves-effect waves-light mb-3 ml-0 ">Tambah Data</a>
							</div>
						</div>
						<table id="datatable" class="table table-responsive table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Toko</th>
									<th>Gambar Produk</th>
									<th>Nama Produk</th>
									<th>Deskripsi Produk</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>


							<tbody>
								<?php $i = 1;
								foreach ($kontenJoin as $t) : ?>
									<tr>
										<td><?= $i; ?></td>
										<td><?= $t['nama_toko']; ?></td>
										<td class="text-center">
											<img class="img-fluid rounded-circle" style="width: 50%;" src="<?= base_url('assets/img-konten/') . $t['gambar_produk']; ?> ">
										</td>
										<td><?= $t['nama_produk']; ?></td>
										<td><?= character_limiter($t['deskripsi'], 50); ?></td>
										<td><?= $t['harga']; ?></td>
										<td class="text-center">
											<a class="btn btn-md btn-danger tombol-hapus-konten" href="<?= base_url('admin/hapusKonten/'); ?><?= $t['id']; ?>">Hapus</a>
											<a class="btn btn-md btn-success" href="<?= base_url('admin/ubahProduk/'); ?><?= $t['id']; ?>">Ubah</a>
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