<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

                <?php
                // dd(byNamaKriteria('penghasilan orang tua')['bobot_kriteria'])
                ?>

                <div class="container-fluid">
                    <div class="isi" style="background-color: white !important">
                        <table id="table_id" class="table table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>nama siswa</td>
                                    <td>kelas siswa</td>
                                    <td>alamat siswa</td>
                                    <td>periode</td>
                                    <td>tanggungan orang tua</td>
                                    <td>penghasilan orang tua</td>
                                    <td>kehadiran</td>
                                    <td>nilai_rapot</td>
                                    <td>peringkat</td>
                                    <td>Hasil</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- if = (?) else (:) -->
                                <?php foreach ($data as $value) : ?>
                                    <tr>
                                        <td><?= $value['id_siswa']; ?></td>
                                        <td><?= $value['nama_siswa']; ?></td>
                                        <td><?= $value['kelas_siswa']; ?></td>
                                        <td><?= $value['alamat_siswa']; ?></td>
                                        <td><?= $value['periode']; ?></td>
                                        <td>
                                            <?= hitungByKriteria('Tanggungan Orang Tua', $value['tanggungan_orang_tua'], $data) ?>
                                        </td>
                                        <td>
                                            <?= hitungByKriteria('Penghasilan Orang Tua', $value['penghasilan_orang_tua'], $data) ?>
                                        </td>
                                        <td>
                                            <?= hitungByKriteria('Nilai Kehadiran', $value['nilai_kehadiran'], $data) ?>
                                        </td>
                                        <td>
                                            <?= hitungByKriteria('Nilai Rata-rata rapot', $value['nilai_rata-rata_rapot'], $data) ?>
                                        </td>
                                        <td>
                                            <?= hitungByKriteria('Peringkat kelas', $value['peringkat_kelas'], $data) ?>
                                        </td>
                                        <td>
                                            <?= hitungHasil([
                                                array_keys($value)[6] => hitungByKriteria('Tanggungan Orang Tua', $value['tanggungan_orang_tua'], $data),
                                                array_keys($value)[7] => hitungByKriteria('Penghasilan Orang Tua', $value['penghasilan_orang_tua'], $data),
                                                array_keys($value)[8] => hitungByKriteria('Nilai Kehadiran', $value['nilai_kehadiran'], $data),
                                                array_keys($value)[9] => hitungByKriteria('Nilai Rata-rata rapot', $value['nilai_rata-rata_rapot'], $data),
                                                array_keys($value)[10] => hitungByKriteria('Peringkat kelas', $value['peringkat_kelas'], $data)
                                            ]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

  <?= $this->endSection(); ?>