<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="isi" style="background-color: white !important">
            <a href="<?= base_url('add/') ?>" class="btn btn-primary" style="float: right;" role="button">Tambah Data</a>
            
                    <!-- Page Heading -->
                    <table id="table_id" class="table table-striped">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Periode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($siswa as $data_siswa) : ?>
                            <tr>
                                <td><?= $data_siswa['id_siswa'] ?></td>
                                <td><?= $data_siswa['nis_siswa'] ?></td>
                                <td><?= $data_siswa['nama_siswa'] ?></td>
                                <td><?= $data_siswa['kelas_siswa'] ?></td>
                                <td><?= $data_siswa['alamat_siswa'] ?></td>
                                <td><?= $data_siswa['periode'] ?></td>
                                <td>
                                    <a href="<?= base_url('siswa/edit/'.$data_siswa['id_siswa']) ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('siswa/delete/'.$data_siswa['id_siswa']) ?>" class="btn btn-danger">Delete</a>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
            
            <!-- End of Main Content -->

 <?= $this->endSection(); ?>