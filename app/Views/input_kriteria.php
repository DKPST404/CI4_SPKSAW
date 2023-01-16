<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="isi" style="background-color: white !important">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Input Data Kriteria</h1>
                </div>

                <div class="section-body">

                    <!-- Tabel Input -->
                    <div class="row">

                        <div class="alert alert-warning" role="alert">
                            <p> Jenis Kriteria ada 2 yaitu <b>Benefit</b> dan <b>Cost.</b> <br>
                                <b>Benefit </b>merupakan kriteria yang
                                semakin tinggi nilainya dalam perhitungan semakin baik, sedangkan <br>
                                <b> Cost </b>merupakan kriteria yang semakin tinggi nilainya dalam perhitungan
                                valuenya akan semakin
                                rendah.
                                <br>
                                <hr>
                                Contoh Penghasilan Orang Tua termasuk ke dalam kriteria cost, karena semakin
                                kecil penghasilan maka
                                peluang untuk mendapatkan beasiswa akan semakin besar.
                            </p>
                        </div>


                        <!-- Data Kriteria -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body mt-5">

                                    <form action="/kriteria/save" method="POST">

                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div>
                                                <div class="alert alert-primary alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h6><i class="fas fa-info"></i><b> Info</b></h6>
                                                    <strong><?= session()->getFlashdata('pesan'); ?></strong>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bobot Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="number" min="0" <?= array_sum($bobot) == 100 ? 'disabled' : '' ?> max="<?= 100 - array_sum($bobot) ?>" class="form-control" name="bobot_kriteria" id="bobot_kriteria" placeholder="Bobot Kriteria" data-skg="<?= array_sum($bobot); ?>" oninvalid="this.setCustomValidity('tambahkan antara 0-<?=100 - array_sum($bobot)?>')">
                                                <?php if(array_sum($bobot) == 100): ?>
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <strong>Bobot Kriteria sudah mencapai 100%</strong>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="alert alert-info mt-2" role="alert">
                                                        <strong>Bobot Kriteria yang tersisa <span id="sisapersen"><?= 100 - array_sum($bobot) ?></span> %</strong>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <fieldset class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kriteria</label>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="jenis_kriteria_benefit" name="jenis_kriteria" class="custom-control-input" value="benefit" required>
                                                    <label class="custom-control-label" for="jenis_kriteria_benefit">Benefit</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="jenis_kriteria_cost" name="jenis_kriteria" class="custom-control-input" value="cost" required>
                                                    <label class="custom-control-label" for="jenis_kriteria_cost">Cost</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="col-sm-12">
                                            <div class="d-flex flex-row-reverse">
                                                <div class="p-1">
                                                <button class="btn btn-primary" onclick="contoh"type="submit">Simpan</button>
                                                </div>
                                                <div class="p-1">
                                                    <a href="/kriteria" class="btn btn-secondary">Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
        </div>
        <script>
            // javascript ready 
            $(document).ready(function() {
                $('#table_id').DataTable();
                $("#bobot_kriteria").on('change', function() {
                    var skg = $(this).data('skg');
                    var bobot = $(this).val();

                    var sisabobot = 100 - (parseInt(skg) + parseInt(bobot));
                    $("#sisapersen").html(sisabobot);
                });
            });
        </script>
        <?= $this->endSection(); ?>