<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="isi" style="background-color: white !important">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Edit Data Kriteria</h1>
                </div>

                <div class="section-body">

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


                    <!-- Tabel Input -->
                    <div class="row">

                        <!-- Data Kriteria -->
                        <div class="col">
                            <div class="card">
                                <div class="card-body mt-5">

                                    <form action="/kriteria/editKriteria" method="POST">
                                        <input type="hidden" name="bobot_lama" value="<?= $kriteria['bobot_kriteria']; ?>">

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" id="id_kriteria" name="id_kriteria" value="<?= $kriteria['id_kriteria']; ?>" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="<?= $kriteria['nama_kriteria']; ?>" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bobot Kriteria</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="<?= $kriteria['bobot_kriteria']; ?>" placeholder="Bobot Kriteria" required>
                                            </div>
                                        </div>

                                        <fieldset class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kriteria</label>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="jenis_kriteria_benefit" name="jenis_kriteria" class="custom-control-input" value="benefit" <?= $kriteria['jenis_kriteria'] == 'benefit' ? 'checked' : ''; ?> required>
                                                    <label class="custom-control-label" for="jenis_kriteria_benefit">Benefit</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="jenis_kriteria_cost" name="jenis_kriteria" class="custom-control-input" value="cost" <?= $kriteria['jenis_kriteria'] == 'cost' ? 'checked' : ''; ?> required>
                                                    <label class="custom-control-label" for="jenis_kriteria_cost">Cost</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Kriteria</label>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="status_kriteria_aktif" name="status_kriteria" class="custom-control-input" value="aktif" <?= $kriteria['status_kriteria'] == 'aktif' ? 'checked' : ''; ?> required>
                                                    <label class="custom-control-label" for="status_kriteria_aktif">Aktif</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="status_kriteria_non_aktif" name="status_kriteria" class="custom-control-input" value="nonaktif" <?= $kriteria['status_kriteria'] == 'nonaktif' ? 'checked' : ''; ?> required>
                                                    <label class="custom-control-label" for="status_kriteria_non_aktif">Non
                                                        Aktif</label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- button -->
                                        <div class="col-sm-12">
                                            <div class="d-flex flex-row-reverse">
                                                <div class="p-1">
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
        <?= $this->endSection(); ?>