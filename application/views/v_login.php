<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login SMPS SMK DARMAWAN</title>
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/login.css'; ?>">
</head>

<body class="bg-dark">
    <div class="container">
        <br /><br /><br /><br />
        <h3 class="font-weight-normal text-center text-white">SYSTEM MANAJEMEN PENILAIAN SEKOLAH</h3>
        <h2 class="font-weight-normal text-center text-white mb-5"><b>SMK DARMAWAN</b></h2>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "gagal") {
                            echo "<div class='alert alert-danger font-weight-bold textcenter'>
                        LOGIN GAGAL!</div>";
                        } else if ($_GET['alert'] == "belum_login") {
                            echo "<div class='alert alert-danger font-weight-bold textcenter'>
                        SILAHKAN LOGIN TERLEBIH DULU!</div>";
                        } else if ($_GET['alert'] == "logout") {
                            echo "<div class='alert alert-success font-weight-bold textcenter'>
                            ANDA TELAH LOGOUT!</div>";
                        } else if ($_GET['alert'] == "keluar") {
                            echo "<div class='alert alert-danger font-weight-bold textcenter'>
                            ANDA TELAH DIKELUARKAN DARI UJIAN INI!</div>";
                        } else if ($_GET['alert'] == "beres") {
                            echo "<div class='alert alert-success font-weight-bold textcenter'>
                            ANDA TELAH MENSELESAIKAN UJIAN!</div>";
                        }
                    }
                    ?>
                    <h4 id="h4" class="font-weight-bold text-center mb-3 mt-3">LOGIN</h4>
                    <!-- validasi error -->
                    <?= validation_errors(); ?>
                    <form method="post" action="<?= base_url() . 'login/login_aksi'; ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Masukkan username" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <label for="sebagai">Login Sebagai :</label>
                            <select name="sebagai" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                                <!-- <option value="pengawas">Pengawas</option> -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <center>
            <p class="text-white"><?= $versi; ?></p>
            <!-- <p class="text-white">10.10.10.2</p> -->
        </center>
        <br>

    </footer>
    <!-- JS -->
    <script src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/js/popper.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/js/bootstrap.js'; ?>"></script>
</body>

</html>