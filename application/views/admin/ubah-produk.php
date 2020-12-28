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
        						<h4 class="page-title">Form Ubah Data Produk</h4>
        					</div>
        					<div class="col-sm-6">
        						<ol class="breadcrumb float-right">
        							<li class="breadcrumb-item"><a href="javascript:void(0);">Form Ubah Data Produk</a></li>
        						</ol>
        					</div>
        				</div> <!-- end row -->
        			</div>
        			<!-- end page-title -->
        			<div class="row">
        				<div class="col-lg-12">
        					<div class="card m-b-30">
        						<div class="card-body">
        							<h4 class="mt-0 header-title">Ubah Produk</h4>
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
        								<?php endif; ?>
        							</p>

        							<?= form_open_multipart('admin/ubahProduk'); ?>
        							<input type="hidden" name="id" value="<?= $konten['id']; ?>">
        							<div class="form-group">
        								<label>Pilih Toko</label>
        								<select class="form-control" name="id_toko">
        									<option value="">Pilih Toko</option>
        									<?php foreach ($kontenJoin as $k) : ?>
        										<?php if ($k['id_toko'] == $konten['id_toko']) : ?>
        											<option value="<?= $k['id_toko']; ?>" selected><?= $k['nama_toko']; ?></option>
        										<?php else : ?>
        											<option value="<?= $k['id_toko']; ?>"><?= $k['nama_toko']; ?></option>
        										<?php endif; ?>
        									<?php endforeach; ?>
        								</select>
        							</div>
        							<div class="form-group">
        								<label>Nama Produk</label>
        								<input type="text" name="produk" class="form-control form-control-lg " value="<?= $konten['nama_produk']; ?>" placeholder="Nama Produk" />
        								<small class="form-text text-danger"> <?= form_error('produk') ?></small>
        							</div>
        							<div class="form-group">
        								<label>Gambar sekarang</label>
        								<div class="row">
        									<div class="col-sm-4">
        										<img src="<?= base_url('/assets/img-konten/') . $konten['gambar_produk']; ?>" class="img-thumbnail" name="old_img">
        									</div>
        								</div>
        							</div>
        							<div class="form-group">
        								<div class="custom-file">
        									<input type="file" class="custom-file-input" id="image" name="image">
        									<label class="custom-file-label" for="image">Pilih Gambar Produk</label>
        								</div>
        							</div>
        							<div class="form-group">
        								<label>Deskripsi Produk</label>
        								<textarea id="elm1" name="deskripsi"> <?= $konten['deskripsi']; ?> </textarea>
        								<small class="form-text text-danger"> <?= form_error('deskripsi') ?></small>
        							</div>
        							<div class="form-group">
        								<label>Harga Produk</label>
        								<input id="lat" type="text" name="harga" class="form-control form-control-lg " value="<?= $konten['harga']; ?>" placeholder="Harga Produk" />
        								<small class="form-text text-danger"> <?= form_error('harga') ?></small>
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
