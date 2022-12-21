<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pendukung Keputusan</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url() ?>/assets/img/smansi.png" alt="SMA Negeri 1 Kesesi" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">SMA Negeri 1 Kesesi <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/home/kriteria'); ?>">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Kriteria</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/home/siswa'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Siswa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/home/perhitungan'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Perhitungan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>

                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Input Data Kriteria</h1>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
                                <div class="breadcrumb-item">Input Data Kriteria</div>
                            </div>
                        </div>

                        <div class="section-body">

                            <!-- Tabel Input -->
                            <div class="row">

                                <div class="alert alert-warning" role="alert">
                                    <p> Jenis Kriteria ada 2 yaitu <b>Benefit</b> dan <b>Cost.</b> <br>
                                        <b>Benefit </b>merupakan kriteria yang
                                        semakin tinggi nilainya dalam perhitungan semakin baik, sedangkan <br>
                                        <b> Cost </b>merupakan kriteria yang semakin tinggi nilainya dalam perhitungan
                                        valuenya akan semakin
                                        rendah.
                                        <br>
                                        <hr>
                                        Contoh Penghasilan Orang Tua termasuk ke dalam kriteria cost, karena semakin
                                        kecil penghasilan maka
                                        peluang untuk mendapatkan beasiswa akan semakin besar.
                                    </p>
                                </div>


                                <!-- Data Kriteria -->
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body mt-5">

                                            <form action="/kriteria" method="POST">

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

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Nama Kriteria" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Bobot Kriteria</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" min="0" max="<?= 100 - array_sum($bobot) ?>" class="form-control" name="bobot_kriteria" id="bobot_kriteria" placeholder="Bobot Kriteria" required oninvalid="this.setCustomValidity('kriteria tidak bisa ditambahkan karena bobot sudah 100%')">
                                                        * Masukkan range antara 10-100 untuk 1 kriteria.
                                                    </div>
                                                </div>

                                                <fieldset class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Jenis Kriteria</label>
                                                    <div class="col-sm-10">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="jenis_kriteria_benefit" name="jenis_kriteria" class="custom-control-input" value="benefit" required>
                                                            <label class="custom-control-label" for="jenis_kriteria_benefit">Benefit</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="jenis_kriteria_cost" name="jenis_kriteria" class="custom-control-input" value="cost" required>
                                                            <label class="custom-control-label" for="jenis_kriteria_cost">Cost</label>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <div class="col-sm-12">
                                                    <div class="d-flex flex-row-reverse">
                                                        <div class="p-1">
                                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                                        </div>
                                                        <div class="p-1">
                                                            <a href="/kriteria" class="btn btn-secondary">Kembali</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>
                </div>