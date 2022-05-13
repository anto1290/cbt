<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Data Siswa
            </p>
        </div>
    </div>
    <br>
    <div class="row">
    </div>
    <div class="row report-group">
        <div class="col-md-3">
            <div id="rep" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem">
                            <p class="icon-item-report">
                                <i class="fa fa-users"></i>
                            </p>
                        </div>
                        <a href="<?= base_url() . 'admin/siswaview'; ?>">
                            <p class="title-item">
                                Siswa
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Jumlah Siswa Akif
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM siswa WHERE status_siswa='aktif'")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div id="rep3" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem3">
                            <p class="icon-item-report">
                                <i class="fas fa-user-edit"></i>
                            </p>
                        </div>
                        <a href="<?= base_url() . 'admin/edit_data'; ?>">
                            <p class="title-item">
                                Edit Siswa
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Edit Data Siswa
                        </p>
                        <p class="value-item">

                        </p>
                        <p class="des-item">
                            Edit Siswa
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <hr>
    <center>
        <h2>Wellcome</h2>

        <p>System Commputer Based Test SMK Darmawan</p>
    </center>
</div>