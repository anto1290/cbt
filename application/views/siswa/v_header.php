<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa - System Penilaian SMK Darmawan Sentul</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
    <!-- css datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/datatables.css'; ?>">
    <!-- icon font awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
   
  <!-- JQUERY -->
  <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?= base_url() . 'assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js'; ?>"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3" style="background:linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);">
        <div class="container-fluid">
            <a href="<?= base_url() . 'siswa' ?>" class="navbar-brand">CBT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'siswa'; ?>"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'siswa/ujian'; ?>"><i class="fas fa-pen">
                            </i> Ujian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . '#'; ?>"><i class="fas fa-pen">
                            </i> E-Learning</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() . 'siswa/updateProfil'; ?>"><i class="fas fa-pen">
                            </i> Edit Profil</a>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-graduate"></i> Hasil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url() . 'siswa/'; ?>"><i class="fas fa-paste"></i> Ujian Harian</a>
                            <a class="dropdown-item" href="<?= base_url() . 'siswa/'; ?>"><i class="far fa-hand-point-up"></i> Ujian Tengan Semester</a>
                            <a class="dropdown-item" href="<?= base_url() . 'siswa/'; ?>"><i class="far fa-hand-point-up"></i> Ujian Akhir Semester</a>
                    </li>
                </ul>
                <span class="navbar-text mr-3 text-center">
                    Halo, <?= $this->session->userdata('nis'); ?> [Siswa]
                </span>
                <a href="<?= base_url() . 'siswa/logout' ?>" class="btn btn-outline-light ml-1">
                    <i class="fa fa-power-off"></i> KELUAR</a>
            </div>
        </div>
    </nav>