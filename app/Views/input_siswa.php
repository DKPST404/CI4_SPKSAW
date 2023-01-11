<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <div class="container-fluid">
    <section class="section">
        <div class="section-header">
            <h1>Input Data Siswa</h1>
        </div>
        <div class="section-body">
            <form action="/siswa/save" method="POST">
                <?= csrf_field(); ?>
                <!-- Tabel Input -->
                <div class="row">
                    <div class="col col-12">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-primary alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                <h6><i class="fas fa-info"></i><b> Info</b></h6> <strong><?= session()->getFlashdata('pesan'); ?></strong>
                            </div>
                    </div> <?php endif; ?>
                </div>
                <div class="col col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Input Data Siswa</h5>
                            <div class="form-group row"> <label for="nis_siswa" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10"> <input type="number" class="form-control" name="nis_siswa" id="nis_siswa" placeholder="NIS Siswa" required autofocus> </div>
                            </div>
                            <div class="form-group row"> <label for="nama_siswa" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10"> <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" required> </div>
                            </div>
                            <div class="form-group row"> <label for="kelas_siswa" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10"> <select class="form-control" id="kelas_siswa" name="kelas_siswa" required> <?php for ($i = 1; $i <= 5; $i++) : ?> <option value="X IPA <?= $i ?>">X IPA <?= $i ?></option> <?php endfor; ?> <?php for ($i = 1; $i <= 5; $i++) : ?> <option value="X IPS <?= $i ?>">X IPS <?= $i ?></option> <?php endfor; ?> <?php for ($i = 1; $i <= 5; $i++) : ?> <option value="XI IPA <?= $i ?>">XI IPA <?= $i ?></option> <?php endfor; ?> <?php for ($i = 1; $i <= 5; $i++) : ?> <option value="XI IPS <?= $i ?>">XI IPS <?= $i ?></option> <?php endfor; ?> <?php for ($i = 1; $i <= 5; $i++) : ?> <option value="XII IPA <?= $i ?>">XII IPA <?= $i ?></option> <?php endfor; ?> <?php for ($i = 1; $i <= 5; $i++) : ?> <option value="XII IPS <?= $i ?>">XII IPS <?= $i ?></option> <?php endfor; ?> </select> </div>
                            </div>
                            <div class="form-group row"> <label for="alamat_siswa" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10"> <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="Alamat Siswa" required> </div>
                            </div>
                            <div class="form-group row"> <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                                <div class="col-sm-10"> <input type="number" min="1900" max="2099" step="1" class="form-control" id="periode" name="periode" placeholder="Tahun Periode" required> </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Data Kriteria -->
                <div class="col col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Input Data Kriteria</h5> 
                            <?php foreach ($kriteria as $value) : ?> 
                                <div class="form-group row justify-content-between"> 
                                    <label for="inputEmail3" class="col-form-label"><?= $value['nama_kriteria'] ?></label>
                                    <div class="col-sm-7"> <input type="number" step="any" class="form-control" name="kriteria_siswa[<?= $value['id_kriteria'] ?>]" id="nis_siswa" placeholder="<?= $value['nama_kriteria'] ?> Siswa" required autofocus> </div>
                                </div> 
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div> <!-- Button -->
                <div class="col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="p-1"> <button class="btn btn-primary" type="submit">Simpan</button> </div>
                        <div class="p-1"> <a href="/siswa" class="btn btn-secondary">Kembali</a> </div>
                    </div>
                </div>
        </div>
        </form>
</div>
</section>
</div> <?= $this->endSection(); ?>