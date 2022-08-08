         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-pks font-weight-bold"><?=$title ?></h1>
            <!-- Content Row -->
            <div class="row">
                <!-- 1st row Start -->
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h2 class="mb-2"><?=$jumlah_kader ?></h2>
                                            <p class="text-muted mb-0"><span class="badge badge-primary">Jumlah Kader</span></p>
                                        </div>
                                        <div class="lnr lnr-leaf display-4 text-primary"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h2 class="mb-2">8451</h2>
                                            <p class="text-muted mb-0"><span class="badge badge-success">Mutasi Masuk</span> Stock</p>
                                        </div>
                                        <div class="lnr lnr-chart-bars display-4 text-success"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h2 class="mb-2"> 31% <small></small></h2>
                                            <p class="text-muted mb-0"><span class="badge badge-danger">Mutasi Keluar</span></p>
                                        </div>
                                        <div class="lnr lnr-rocket display-4 text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h2 class="mb-2">158</h2>
                                            <p class="text-muted mb-0"><span class="badge badge-warning">Laporan</span></p>
                                        </div>
                                        <div class="lnr lnr-cart display-4 text-warning"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header with-elements">
                            <h6 class="card-header-title mb-0 text-pks">Informasi Akun</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-1">
                                    <img src="<?=base_url('assets/template/img/profile/') . $user['image'] ?>" class="card-img" alt="...">
                                </div>
                                <div class="col">
                                    <h6 class="text-pks">Username : <b><?=$pengguna['name'] ?></b></h6>
                                    <h6 class="text-pks">Email : <b><?=$pengguna['email'] ?></b></h6>
                                    <h6 class="text-pks">Role : <b><?=$pengguna['role'] ?></b></h6>
                                    <h6 class="text-pks">DPRa : <b><?=$pengguna['nama_dpra'] ?></b></h6>
                                    <h6 class="text-pks">DPC : <b><?=$pengguna['nama_dpc'] ?></b></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 1st row Start -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->




