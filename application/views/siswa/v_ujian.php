<div class="container-fluid">
    <div class="header row">
        <div class="col-md-12">
            <h2 class="header-tittle  animated infinity bounceInDown ">
                Siswa Ujian
            </h2>
            <h6 class="sub-header-tittle  animated infinity bounceInDown ">
                Sistem Penilaian
            </h6>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <center>
                <h4>Tata Tertib</h4>
            </center>

        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['alert'])) {
                if ($_GET['alert'] == "waktu") {
                    echo "<div class='alert alert-danger font-weight-bold text-center'>
                        Waktu Ujian Telah Habis!</div>";
                } else if ($_GET['alert'] == "habis") {
                    echo "<div class='alert alert-danger font-weight-bold text-center'>
                        Ujian Telah Berakhir!</div>";
                } else if ($_GET['alert'] == "blom") {
                    echo "<div class='alert alert-info font-weight-bold text-center'>
                        Maaf Ujian Blom Di Mulai!</div>";
                } else if ($_GET['alert'] == "tidak") {
                    echo "<div class='alert alert-info font-weight-bold text-center'>
                        Maaf Token Yang Anda Masukan Salah!</div>";
                } else if ($_GET['alert'] == "tokenT") {
                    echo "<div class='alert alert-danger font-weight-bold text-center'>
                        Maaf Token Yang Anda Masukan Tidak Sama!</div>";
                }
            }
            ?>
            <?= validation_errors(); ?>
            <div class="row">
                <div class="col-md-5 offset-md-3">
                    <!-- <p><i class="fab fa-gripfire"> </i><b> Peserta dilarang mengunakan paket data sendiri</b></p> -->
                    <!-- <p><i class="fab fa-gripfire"> </i><b> Peserta hanya terkoneksi jaringan SMK DARMAWAN</b></p> -->
                    <p><i class="fab fa-gripfire"> </i><b> Peserta wajib mengikuti intruksi pengawas</b></p>
                    <p><i class="fab fa-gripfire"> </i><b> Peserta dilarang keras menggunakan aplikasi lain pada saat ujian</b></p>
                    <p><i class="fab fa-gripfire"> </i><b> Peserta dilarang membuka tabs google chrome pada saat ujian</b></p>
                    <p><i class="fab fa-gripfire"> </i><b> Peserta peserta yang melakukan pelanggaran akan secara otomatis logout dan tidak bisa masuk ujian</b></p>
                    <p><i class="fab fa-gripfire"> </i><b> Pengawas berhak mengeluarkan Peserta ujian</b></p>
                    <p><i class="fab fa-gripfire"> </i><b> Selama ujian Peserta dilarang berkerja sama</b></p>
                    <p><i class="fab fa-gripfire"> </i><b> Peserta Ujian diharapkan menggunakan waktu sebaik mungkin</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-3">
                    <form action="<?= base_url() . 'siswa/uji'; ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="Token">Masukan Kode Token</label>
                                    <input class="form-control" type="text" name="Token" id="Token" placeholder="Input Code">
                                    <button type="submit" class="btn btn-success mt-2"> Enter </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Card Body -->
    </div>
</div>