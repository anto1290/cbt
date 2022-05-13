<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - System CBT SMK Darmawan Sentul</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
   <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/datatables.min.css'; ?>">
  <!-- css datatables -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/Bootstrap-4-4.1.1/css/bootstrap.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/FixedColumns-3.2.5/css/fixedColumns.bootstrap4.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/Responsive-2.2.2/css/responsive.bootstrap4.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/Buttons-1.5.6/css/buttons.bootstrap4.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/Buttons-1.5.6/css/buttons.dataTables.min.css'; ?>">
    <!-- icon font awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/font-awesome.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/style.css'; ?>">
    <!-- js select2 -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/select2/select2.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/select2/select2-bootstrap.css'; ?>">
    <!-- JS MATH AJAX -->
    <!-- JQUERY -->
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-1.9.1.min.js'; ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="<?= base_url() . 'admin' ?>" class="navbar-brand">CBT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'admin'; ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'admin/mapel'; ?>"><i class="fa fa-archive">
                            </i> Mapel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'admin/kelas'; ?>"><i class="fa fa-building">
                            </i> Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'admin/guru'; ?>"><i class="fa fa-user">
                            </i> Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'admin/siswa'; ?>"><i class="fa fa-users">
                            </i> Siswa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-print"></i> Print Berkas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url() . 'admin/'; ?>"><i class="fa fa-address-card"></i> Kartu Ujian</a>
                            <a class="dropdown-item" href="<?= base_url() . 'admin/'; ?>"><i class="fa fa-clone"></i> Berita Acara</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cubes"></i> Set Ujian
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url() . 'admin/setUjian'; ?>"><i class="fa fa-clock-o"></i> Ujian</a>
                            <a class="dropdown-item" href="<?= base_url() . 'admin/berjalan'; ?>"><i class="fa fa-diamond"></i> Uji Berjalan</a>
                            <a class="dropdown-item" href="<?= base_url() . 'admin/non'; ?>"><i class="fa fa-diamond"></i> Uji Non-Aktif</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?php // base_url().'admin/pengawas'; 
                                                            ?>">
                            <i class="fa fa-bell"></i> Pengawas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'admin/ganti_password'; ?>">
                            <i class="fa fa-lock"></i> Ganti Password</a>
                    </li>
                </ul>
                <span class="navbar-text mr-3 text-center">
                    Halo, <?= $this->session->userdata('username'); ?> [admin]
                </span>
                <a href="<?= base_url() . 'admin/logout' ?>" class="btn btn-outline-light ml-1">
                    <i class="fa fa-power-off"></i> KELUAR</a>
            </div>
        </div>
    </nav>
    <br><br>