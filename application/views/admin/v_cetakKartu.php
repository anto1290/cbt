<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - System CBT SMK Darmawan Sentul</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
    <!-- icon font awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">
    <!-- custome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/kartu.css'; ?>">
    <!-- icon animate -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
    <!-- JQUERY -->
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>

</head>

<body>
    <?php
    $i = 0;
    for ($i; $i < $total; $i++) :
        ?>
        <div class="row">
            <div class="colom1">
                <div class="row headkartu">
                    <div class="col-md-2">
                        <img src="<?= base_url() . 'gambar/logo/smk.png' ?>" alt="logo" width="50px">
                    </div>
                    <div class="col-md-10">
                        <center>
                            <h6>SMK DARMAWAN</h6>
                            <p>Jalan Gunung Pancar No 03 Kp.Wates RT.004/RW.001</p>
                            <p><b>Telp :</b> 021 - 879 515 26 <b>NPSN :</b> 69953897</p>
                        </center>
                        <div class="foot">
                            <center>
                                <p><b>E-mail :</b> smkdarmawansentul@gmail.com <b>Website :</b>www.smkdarmawansentul.sch.id</p>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row bbodykartu">
                    <div class="col-md-12">
                        <center>
                            <h6>KARTU UJIAN</h6>
                            <h5>Penilaian Akhir Semester</h5>
                        </center>
                    </div>
                </div>
                <div class="row bodykartu">
                    <div class="col-md-2">

                        <p>Nama</p>
                        <p>Lokasi</p>
                        <p>username</p>
                        <p>password</p>
                    </div>
                    <div class="col-md-1">

                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-md-7">

                        <p><?= $siswa[$i]->nama_siswa; ?></p>
                        <p><?= $siswa[$i]->nama_ruang; ?></p>
                        <p><?= $siswa[$i]->nis; ?></p>
                        <p><?= $siswa[$i]->nis; ?></p>
                    </div>
                    <div class="col-md-2">
                        <img src="<?= base_url('gambar/siswa') . '/' . $siswa[$i]->fotoSiswa; ?>" alt="">
                    </div>
                    <br>
                </div>
                <div class="row bummper"></div>
                <div class="row footerKartu">
                    <div class="col-md-12">
                        <center>
                            <p>Print By System CBT SMK Darmawan</p>
                            <span>Copyright &copy; Muhammad Nurwibawanto 2019</span>
                        </center>
                    </div>
                </div>
            </div>
            <?php $i = $i + 1;

                if ($i != $total) {
                    ?>
                <div class="colom2">
                    <div class="row headkartu">
                        <div class="col-md-2">
                            <img src="<?= base_url() . 'gambar/logo/smk.png' ?>" alt="logo" width="50px">
                        </div>
                        <div class="col-md-10">
                            <center>
                                <h6>SMK DARMAWAN</h6>
                                <p>Jalan Gunung Pancar No 03 Kp.Wates RT.004/RW.001</p>
                                <p><b>Telp :</b> 021 - 879 515 26 <b>NPSN :</b> 69953897</p>
                            </center>
                            <div class="foot">
                                <center>
                                    <p><b>E-mail :</b> smkdarmawansentul@gmail.com <b>Website :</b>www.smkdarmawansentul.sch.id</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="row bbodykartu">
                        <div class="col-md-12">
                            <center>
                                <h6>KARTU UJIAN</h6>
                                <h5>Penilaian Akhir Semester</h5>
                            </center>
                        </div>
                    </div>
                    <div class="row bodykartu">
                        <div class="col-md-2">

                            <p>Nama</p>
                            <p>Lokasi</p>
                            <p>username</p>
                            <p>password</p>
                        </div>
                        <div class="col-md-1">

                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="col-md-7">
                            <p><?= $siswa[$i]->nama_siswa; ?></p>
                            <p><?= $siswa[$i]->nama_ruang; ?></p>
                            <p><?= $siswa[$i]->nis; ?></p>
                            <p><?= $siswa[$i]->nis; ?></p>
                        </div>
                        <div class="col-md-2">
                            <img src="<?= base_url('gambar/siswa') . '/' . $siswa[$i]->fotoSiswa; ?>" height="50px" width="50px" alt="">
                        </div>
                        <br>
                    </div>
                    <div class="bummper"></div>
                    <div class="row footerKartu">
                        <div class="col-md-12">
                            <center>
                                <p>Print By System CBT SMK Darmawan</p>
                                <span>Copyright &copy; Muhammad Nurwibawanto 2019</span>
                            </center>
                        </div>
                    </div>
                </div>
            <?php } else {
                    echo "";
                } ?>
        </div>
    <?php endfor;
    $i = $i + 1;
    ?>
</body>
<!-- Footer -->
<footer class="sticky-footer bg-white">
</footer>
<!-- JS Bootstrap -->

<script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.js'; ?>"></script>
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->

</body>

</html>