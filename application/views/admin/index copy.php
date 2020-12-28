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
                                <h4 class="page-title">Starter Page</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->


                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->



            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Tambah Toko</h4>
                            <p class="sub-title"></p>

                            <form action="" method="POST">

                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" class="form-control form-control-lg " required placeholder="Nama Toko" />
                                </div>

                                <div class="form-group">
                                    <label>Cari Lokasi</label>
                                    <div id="accordion">
                                        <div class="card mb-0 mt-2">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0 mt-0 font-14">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="text-dark">
                                                        Buka Peta
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <div id="mapid" style=" height: 800px;"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Simpan
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->


            </div> <!-- end col -->