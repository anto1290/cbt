<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <div class="header row justify-content-center">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Ganti Password
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Ganti Password
            </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Ganti Password</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "sukses") {
                            echo "<div class='alert alert-success'> Password Berhasil Diganti!
                                </div>";
                        }
                    }
                    ?>
                    <?= validation_errors(); ?>
                    <form action="<?= base_url() . 'admin/ganti_password_aksi'; ?>" method="post">
                        <div class="form-group">
                            <label for="password_baru" class="font-weight-bold">Password Baru</label>
                            <input class="form-control" type="password" name="password_baru" id="password_baru" placeholder="masukan password baru">
                        </div>
                        <div class="form-group">
                            <label for="password_ulang" class="font-weight-bold">Ulangi Password</label>
                            <input class="form-control" type="password" name="password_ulang" id="password_ulang" placeholder="masukan password baru">
                        </div>

                        <button class="btn btn-primary" type="submit">Ganti Password !</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() . 'assets/js/main.js'; ?>"></script>