<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
                <div class="container-fluid">
                <div class="isi" style="background-color: white !important">
                
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
                            <?php foreach ($kriteria as $k): ?>
                            <tr>
                                <td><?= $k["id_kriteria"] ?></td>
                                <td><?= $k["nama_kriteria"] ?></td>
                                <td><?= $k["bobot_kriteria"] ?> %</td>
                                <td><?= $k["jenis_kriteria"] ?></td>
                                <td>Aktif</td>
                                <td>
                                    <a href="<?= base_url(
                                        "kriteria/edit/" . $k["id_kriteria"]
                                    ) ?>" class="btn btn-warning">Edit</a>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable();
                });
            </script>
<?= $this->endSection(); ?>