<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pendukung Keputusan SMA Negeri 1 Kesesi</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="content">
        <div class="container" style="margin-top: 10%;">
            <?php
            $errors     = session()->getFlashdata('errors');
            $messages   = session()->getFlashdata('message');
            ?>

            <div class="row">
                <div class="col-md-5">
                    <img src="<?= base_url('assets/img/smansi.png') ?>" class="rounded mx-auto d-block" alt="Image" style="width: 75%;"><br>
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4 text-center">
                                <h3>LOGIN</h3>
                                <p class="mb-4">SISTEM PENDUKUNG KEPUTUSAN PENERIMA BANTUAN SISWA MISKIN DI SMA NEGERI 1 KESESI</p>
                            </div>

                            <div class="card-body">
                                <?php if (isset($messages)) { ?>
                                    <div class="alert alert-danger alert-has-icon">
                                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                        <div class="alert-body">
                                            <div class="alert-title"><?= $messages; ?></div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <form action="/login" method="post">
                                    <div class="form-group first">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" required autofocus>
                                        <p class="d-block invalid-feedback"><?= isset($errors['username']) ? $errors['username'] : '' ?></p>
                                    </div>
                                    <div class="form-group last mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <p class="d-block invalid-feedback"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>
                                    </div>
                                    <input type="submit" value="Masuk" class="btn btn-block btn-primary">
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>/assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
        <script src="<?= base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>
        <!-- Data Tables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

</body>

</html>