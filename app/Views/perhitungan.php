<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php $siswa_dapat = []; ?>

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
                <form method="GET" action="/perhitungan/filter" class="row gx-1 gy-2 align-items-center justify-content-end">
                    <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                        <input type="number" name="jml" id="jml" min='1' value="<?= isset($_GET['jml']) ? $_GET['jml'] : 1  ?>" placeholder="Jumlah" class="form-control">
                    </div>
                    <div class="col-sm-2 col-md-4 col-lg-2 mb-3">
                        <select name="periode" class="custom-select" id="specificSizeSelect">
                            <option selected>Periode</option>
                            <?php foreach ($periode as $p) : ?>
                                <option <?= isset($_GET['periode']) && $_GET['periode'] == $p['periode'] ? 'selected' : '' ?> value="<?= $p['periode'] ?>"><?= $p['periode'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-auto mb-3">
                        <button type="submit" class="btn btn-primary" <?= $cek_bobot[0]['bobot_kriteria'] < 100 ? 'disabled' : '' ?>>Submit</button>
                    </div>
                </form>

                <?php if ($cek_bobot[0]['bobot_kriteria'] >= 100) { ?>
                    <?php if (isset($_GET['periode'])) { ?>
                        <div class="table-responsive mt-3">
                            <div class="table table-bordered">
                                <table class="table align-items-center table-flush table-hover dataTable" id="dataTableHoverPerhitungan" role="grid" aria-describedby="dataTableHover_info">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Ranking</th>
                                            <th>NIS Siswa</th>
                                            <th>Nama Siswa</th>
                                            <th>Hasil Perhitungan</th>
                                            <th>Tahun Masuk</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($data_perhitungan as $index => $value) :
                                            if ($_GET['jml'] >= ($index + 1)) {
                                                $siswa_dapat[] = $value['data']->nama_siswa;
                                            }
                                        ?>
                                            <tr>
                                                <td class="<?= $_GET['jml'] >= ($index + 1) ? '' : 'text-light bg-danger' ?>">
                                                    <?= $index + 1 ?></td>
                                                <td class="<?= $_GET['jml'] >= ($index + 1) ? '' : 'text-light bg-danger' ?>">
                                                    <?= $value['data']->nis_siswa ?></td>
                                                <td class="<?= $_GET['jml'] >= ($index + 1) ? '' : 'text-light bg-danger' ?>">
                                                    <?= $value['data']->nama_siswa ?></td>
                                                <td class="<?= $_GET['jml'] >= ($index + 1) ? '' : 'text-light bg-danger' ?>">
                                                    <?= number_format($value['hasil'], 6) ?></td>
                                                <td class="<?= $_GET['jml'] >= ($index + 1) ? '' : 'text-light bg-danger' ?>">
                                                    <?= $value['data']->periode ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } else { ?>
                        <b>Silahkan pilih tahun terlebih dahulu.</b>
                    <?php } ?>
                <?php } else { ?>
                    <b>Silahkan masukan kriteria sampai 100% dahulu untuk mengelola data siswa</b>
                    <div><a href="/kriteria" class="btn btn-primary">Kriteria</a></div>
                <?php } ?>

                <?php if (count($siswa_dapat) > 0) { ?>
                    <p class="text-justify">Dari Analisa Menggunakan SAW diatas, maka dapat disimpulkan dari jumlah
                        <?= count($data_perhitungan) ?>
                        siswa, yang direkomendasikan bantuan sebanyak <?= isset($_GET['jml']) ? $_GET['jml'] : 0 ?> orang.
                        Adapun
                        nama siswa yang direkomendasikan antara lain : <b> <?= join(', ', $siswa_dapat) ?> </b></p>
                <?php } ?>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var t = $('#dataTableHoverPerhitungan').DataTable({
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel'
                // ]
                
                // bootrap 5 styling dom and buttons
                dom: '<"d-flex justify-content-between"Bf>rtip',
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-outline-secondary btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-outline-secondary btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-outline-secondary btn-sm'
                    }
                ] 
            });
        });
    </script>
    <?= $this->endSection(); ?>