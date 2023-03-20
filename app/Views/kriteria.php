<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="isi" style="background-color: white !important">
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
        <a href="<?= base_url('/kriteria/add') ?>" class="btn btn-primary mb-3" style="float: right;" role="button">Tambah Data</a>
        <!-- Page Heading -->
        <table id="table_id" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot Kriteria</th>
                    <th>Jenis Kriteria</th>
                    <th>Status Kriteria</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $bobot = [] ?>
                <?php foreach ($kriteria as $key => $k) : ?>
                    <?php
                    if ($k['status_kriteria'] == 'aktif') {
                        $bobot[] = $k["bobot_kriteria"];
                    }
                    ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $k["nama_kriteria"] ?></td>
                        <td><?= $k["bobot_kriteria"] ?> %</td>
                        <td><?= $k["jenis_kriteria"] ?></td>
                        <td><?= $k["status_kriteria"] ?></td>
                        <td>
                            <a href="<?= base_url("kriteria/edit/" . $k["id_kriteria"]) ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url("kriteria/delete/" . $k["id_kriteria"]) ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin akan dihapus?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr class="bg-primary" style="color: #fff !important">
                    <td colspan="2"><strong>JUMLAH BOBOT KRITERIA</strong></td>
                    <td colspan="4"><strong><span class="<?= array_sum($bobot) == 100 ? 'badge badge-success' : (array_sum($bobot) < 100 && array_sum($bobot) !== 0 ? 'badge badge-warning' : 'badge badge-danger') ?>"><?= array_sum($bobot); ?> %</span></strong></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                    <td style="display: none;"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
<?= $this->endSection(); ?>