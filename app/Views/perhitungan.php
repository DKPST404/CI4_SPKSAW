<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" class="d-block d-md-none" aria-label="breadcrumb">
        <ol class="breadcrumb mt-3"">
                            <li class=" breadcrumb-item"><a href="<?= base_url('/home'); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"></a><?= $slug; ?></li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div>
        <div class="isi" style="background-color: white !important">
            <div class="card card-body">
                <form method="POST" action="/perhitungan" class="row gx-1 gy-2 align-items-center justify-content-end">
                    <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                        <input type="number" name="jml" id="jml" min='1' value="<?= isset($selected_jml) ? $selected_jml : 1  ?>"  placeholder="Jumlah" class="form-control">
                    </div>    
                    <div class="col-sm-2 col-md-4 col-lg-2 mb-3">
                        <select name="periode" class="custom-select" id="specificSizeSelect">
                            <option selected>Periode</option>
                            <?php foreach ($periode as $p) : ?>
                                <option <?= isset($selected_periode) && $selected_periode == $p['periode'] ? 'selected' : '' ?> value="<?= $p['periode'] ?>"><?= $p['periode'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-auto mb-3">
                        <button type="submit" class="btn btn-primary" <?= array_sum($bobot) < 100 ? 'disabled' : '' ?>>Submit</button>
                    </div>
                </form>

                <?php if (array_sum($bobot) === 100) : ?>
                    <?php if (isset($siswa)) : ?>
                        <?php $hasil = [] ?>
                        <?php foreach ($siswa as $value) : ?>
                            <?php
                            array_push($hasil, hitungHasil([
                                array_keys($value)[6] => hitungByKriteria('Tanggungan Orang Tua', $value['tanggungan_orang_tua'], $siswa),
                                array_keys($value)[7] => hitungByKriteria('Penghasilan Orang Tua', $value['penghasilan_orang_tua'], $siswa),
                                array_keys($value)[8] => hitungByKriteria('Nilai Kehadiran', $value['nilai_kehadiran'], $siswa),
                                array_keys($value)[9] => hitungByKriteria('Nilai Rata-rata rapot', $value['nilai_rata-rata_rapot'], $siswa),
                                array_keys($value)[10] => hitungByKriteria('Peringkat kelas', $value['peringkat_kelas'], $siswa)
                            ]))
                            ?>
                        <?php endforeach; ?>

                        <?php foreach ($hasil as $key => $value) : ?>
                            <?php $siswa[$key]['hasil'] = $value ?>
                        <?php endforeach; ?>

                        <!-- php sort siswa by hasil -->
                        <?php usort($siswa, function ($a, $b) {
                            return $b['hasil'] <=> $a['hasil'];
                        }); ?>

                        <div class="mt-3">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>Ranking</td>
                                            <td>NIS siswa</td>
                                            <td>Nama siswa</td>
                                            <td>Hasil</td>
                                            <td>periode</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n = 1 ?>
                                        <?php foreach ($siswa as $value) : ?>
                                            <tr <?= $n > $selected_jml ? 'style="background-color: rgb(252 84 131 / 50%); color:black !important;"' : ''  ?>>
                                                <td><?= $n++ ?></td>
                                                <td><?= $value['nis_siswa']; ?></td>
                                                <td><?= $value['nama_siswa']; ?></td>
                                                <td>
                                                    <?= hitungHasil([
                                                        array_keys($value)[6] => hitungByKriteria('Tanggungan Orang Tua', $value['tanggungan_orang_tua'], $siswa),
                                                        array_keys($value)[7] => hitungByKriteria('Penghasilan Orang Tua', $value['penghasilan_orang_tua'], $siswa),
                                                        array_keys($value)[8] => hitungByKriteria('Nilai Kehadiran', $value['nilai_kehadiran'], $siswa),
                                                        array_keys($value)[9] => hitungByKriteria('Nilai Rata-rata rapot', $value['nilai_rata-rata_rapot'], $siswa),
                                                        array_keys($value)[10] => hitungByKriteria('Peringkat kelas', $value['peringkat_kelas'], $siswa)
                                                    ]) ?>
                                                </td>
                                                <td><?= $value['periode']; ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i> <strong>Warning</strong> <br> 
                        Bobot kriteria tidak 100%, silahkan <a href="/kriteria">cek <i class="fas fa-external-link-alt" style="font-size: 12px; margin-left: 2px; margin-right: 3px;"></i></a> kembali
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var t = $('#table_id').DataTable({
                // "order": [
                //     [3, "desc"]
                // ],
                // "ordering": true,
                // "orderable": true,
            });
            // t.on('order.dt search.dt', function() {
            //     let i = 1;

            //     t.cells(null, 0, {
            //         search: 'applied',
            //         order: 'applied'
            //     }).every(function(cell) {
            //         this.data(i++);
            //     });
            // }).draw();
        });
    </script>
    <?= $this->endSection(); ?>