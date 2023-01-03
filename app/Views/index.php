<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
                <div class="main-content">
                    <section class="section">
                        <div class="section-header" style="margin-left: 30px;">
                            <h1>Dashboard</h1>
                        </div>

                        <div class="section-title mt-0" style="margin-left: 30px;">
                            <div>
                                Silahkan Pilih menu dibawah ini.
                            </div>
                        </div>
                        <p></p>
                        <div class="row mb-3">
                            <div class="col-xl-3 col-md-6 mb-4" style="margin-left: 30px;">
                                <div class="card h-100">
                                    <a href="<?= base_url('/home/kriteria'); ?> " class="stretched-link"></a>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Menu</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Kriteria
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-cube fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="<?= base_url('/home/siswa'); ?>" class="stretched-link"></a>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Menu</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Siswa
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book-reader fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="<?= base_url('/home/perhitungan'); ?>" class="stretched-link"></a>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Menu</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Perhitungan
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
<?= $this->endSection(); ?>