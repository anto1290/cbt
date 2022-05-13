<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Guru - System CBT SMK Darmawan Sentul</title>
  <!-- css bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap-toogle.css'; ?>">

  <!-- icon font awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">

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

  <!-- CSS Sendiri -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/admin.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
  <!-- JS MATH AJAX -->
  <script type="text/javascript" async src="<?= base_url() . 'assets/MathJax/es5/tex-mml-chtml.js'; ?>"></script>

  <!-- JQUERY -->
  <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?= base_url() . 'assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js'; ?>"></script>

</head>

<body>
  <?php
  $kode = $this->session->userdata('kode');
  $user = $this->session->userdata('username');
  $guru = $this->db->query("SELECT pengawas AS PGS FROM guru WHERE kodeGuru = '$kode' AND username = '$user' ")->row();
  $wali = $this->db->query("SELECT * FROM guru,kelas WHERE guru.kodeGuru = kelas.kodeGuru");
  $cek = $wali->num_rows();
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background:linear-gradient(90deg, rgba(32,61,209,1) 0%, rgba(37,149,245,1) 100%);">
    <div class="container-fluid">
      <a href="<?= base_url() . 'guru' ?>" class="navbar-brand">CBT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'guru'; ?>"><i class="fas fa-tachometer-alt" width="30px" height="20px"></i> Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-pencil-alt">
              </i> Perencanaan soal</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() . 'guru/bankSoal'; ?>">Bank Soal</a>
              <a class="dropdown-item" href="<?= base_url() . 'guru/rekap'; ?>">Rekap Nilai</a>
              <div class="dropdown-divider"></div>
              <?php
              if ($guru->PGS === "Aktif") {
                ?>
                <a class="dropdown-item" href="<?= base_url() . 'guru/pengawasUjian' ?>">Pengawas</a>
            </div>
          <?php
          }
          ?>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-database"></i> Perencanaan</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Rancangan Penilaian</a>
              <a class="dropdown-item" href="#">Penilaian</a>
              <div class="dropdown-divider"></div>
              <?php


              if ($cek > 0) { ?>
                <a class="dropdown-item" href="">Cetak Hasil PTS</a>
                <a class="dropdown-item" href="">Cetak Rapot </a>
              <?php } ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-folder-plus"></i> Administrasi</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() . 'guru/buku1'; ?>">Buku 1</a>
              <a class="dropdown-item" href="<?= base_url() . 'guru/buku2'; ?>">Buku 2</a>
              <a class="dropdown-item" href="#">Buku 3</a>
              <a class="dropdown-item" href="#">Buku 4</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="">Coming Soon</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . 'guru/ganti_password'; ?>">
              <i class="fa fa-lock"></i> Ganti Password</a>
          </li>
        </ul>
        <span class="navbar-text mr-3 text-center">
          Halo, <?= $this->session->userdata('username'); ?> [Guru]
        </span>
        <a href="<?= base_url() . 'guru/logout' ?>" class="btn btn-outline-light ml-1">
          <i class="fa fa-power-off"></i> KELUAR</a>
      </div>
    </div>
  </nav>
  <br><br>