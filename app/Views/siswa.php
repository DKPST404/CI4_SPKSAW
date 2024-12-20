<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="isi" style="background-color: white !important">
        <a href="<?= base_url('/siswa/add') ?>" class="btn btn-primary mb-3" style="float: right;" role="button">Tambah Data</a>
        <!-- Page Heading -->
        <div class="table-responsive">
            <table id="table_id" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Periode</th>
                        <th></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $key => $data_siswa) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $data_siswa['nis_siswa'] ?></td>
                            <td><?= $data_siswa['nama_siswa'] ?></td>
                            <td><?= $data_siswa['kelas_siswa'] ?></td>
                            <td><?= $data_siswa['alamat_siswa'] ?></td>
                            <td><?= $data_siswa['periode'] ?></td>
                            <td>
                                <?php if(!checkPerhitungan($data_siswa['id_siswa'])) :  ?>
                                    <span class="badge badge-warning">Data Belum Lengkap</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('siswa/edit/' . $data_siswa['id_siswa']) ?>" class="btn btn-info">Edit</a>
                                <a href="<?= base_url('siswa/delete/' . $data_siswa['id_siswa']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin akan dihapus?')">Delete</a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<?= $this->endSection(); ?>