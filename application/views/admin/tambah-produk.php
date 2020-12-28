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
        						<h4 class="page-title">Form Tambah Produk</h4>
        					</div>
        					<div class="col-sm-6">
        						<ol class="breadcrumb float-right">
        							<li class="breadcrumb-item"><a href="javascript:void(0);">Form Tambah Produk</a></li>
        						</ol>
        					</div>
        				</div> <!-- end row -->
        			</div>
        			<!-- end page-title -->
        			<div class="row">
        				<div class="col-lg-12">
        					<div class="card m-b-30">
        						<div class="card-body">
        							<h4 class="mt-0 header-title">Tambah Produk</h4>
        							<p class="sub-title">
        								<?php if (validation_errors()) : ?>
        									<div class="my-2">
        										<div class="alert alert-danger alert-dismissible fade show" role="alert">
        											<h2 class="text-center mt-1">Gagal Menambah Data</h2>
        											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        												<span aria-hidden="true">×</span>
        											</button>
        											<h3>Kesalahan : </h3>
        											<strong> <?= validation_errors() ?></strong>
        										</div>
        									</div>
        								<?php endif; ?>
        							</p>
        							<?= form_open_multipart('admin/tambahProduk'); ?>
        							<div class="form-group">
        								<label>Pilih Toko</label>
        								<select class="form-control" name="id_toko">
        									<option>Pilih Toko</option>
        									<?php foreach ($toko as $t) : ?>
        										<option value="<?= $t['id_toko']; ?>"><?= $t['nama_toko']; ?></option>
        									<?php endforeach; ?>
        								</select>
        							</div>
        							<div class="form-group">
        								<label>Nama Produk</label>
        								<input type="text" name="produk" class="form-control form-control-lg " placeholder="Nama Produk" value="<?= set_value('produk'); ?>" />
        							</div>
        							<div class="form-group">
        								<div class="custom-file">
        									<input type="file" class="custom-file-input" id="image" name="image">
        									<label class="custom-file-label" for="image">Pilih Gambar Produk</label>
        								</div>
        							</div>
        							<div class="form-group">
        								<label>Deskripsi Produk</label>
        								<textarea id="elm1" name="deskripsi"><?= set_value('deskripsi'); ?></textarea>
        							</div>
        							<div class="form-group">
        								<label>Harga Produk</label>
        								<input id="lat" type="text" name="harga" class="form-control form-control-lg " placeholder="Harga Produk" value="<?= set_value('harga'); ?>" />
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

        			</div>
        			<!-- container-fluid -->

        		</div>
        		<!-- content -->
