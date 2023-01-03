<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
            <?php $hasil=[] ?>
            <?php foreach($siswa as $value): ?>
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

            <?php foreach($hasil as $key => $value): ?>
                <?php $siswa[$key]['hasil'] = $value ?>
            <?php endforeach; ?>

            <!-- php sort siswa by hasil -->
            <?php usort($siswa, function($a, $b) {
                return $b['hasil'] <=> $a['hasil'];
            }); ?>


            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="isi" style="background-color: white !important">
                    <!-- Page Heading -->
                    <div class="container-fluid">
                        <div class="isi" style="background-color: white !important">
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

                                    <?php $n=1 ?>
                                    <!-- if = (?) else (:) -->
                                    <?php foreach ($siswa as $value) : ?>
                                        <tr>
                                            <!-- sort siswa by hasil -->

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