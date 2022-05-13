<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Setting Exam
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Pilih Menu
            </p>
        </div>
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
                        <a class="link-item" href="<?= base_url() . 'admin/setUjian'; ?>">
                            <p class="title-item" data-toggle="tooltip" data-placement="top" title="Klik Link Untuk Setting Ujian">
                                Ujian Aktif
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Total Ujian Aktif
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM paketsoal WHERE status='Y'")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep1" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem1">
                            <p class="icon-item-report">
                                <i class="fa fa-tablet"></i>
                            </p>
                        </div>
                        <a class="link-item" href="<?= base_url() . 'admin/berjalan'; ?>">
                            <p class="title-item">
                                Ujian Berjalan
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Ujian yang sedang berjalan
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM setujian WHERE statusUjian='Y'")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep2" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem2">
                            <p class="icon-item-report">
                                <i class="fa fa-book"></i>
                            </p>
                        </div>
                        <a class="link-item" href="<?= base_url() . 'admin/non'; ?>">
                            <p class="title-item">
                                Ujian Non- Aktif
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Ujian Yang Tidak Aktif
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM setujian WHERE statusUjian='Tidak Aktif'")->num_rows(); ?>
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
                                <i class="fa fa-user-secret"></i>
                            </p>
                        </div>
                        <a class="link-item" href="<?= base_url() . 'admin/paketnon'; ?>">
                            <p class="title-item">
                                Paket Ujian Off
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Paket Ujian yang dinon-aktifkan
                        </p>
                        <p class="value-item">
                            <?php echo $this->db->query("SELECT * FROM paketsoal WHERE status='N'")->num_rows(); ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Baris 2 -->
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
                        <a class="link-item" href="<?= base_url() . 'admin/pengawas'; ?>">
                            <p class="title-item" data-toggle="tooltip" data-placement="top" title="Klik Link Untuk Setting Ujian">
                                Pengawas
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Total Pengawas Aktif
                        </p>
                        <p class="value-item">
                            <?= $this->db->query("SELECT * FROM pengawas")->num_rows() ?>
                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep1" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem1">
                            <p class="icon-item-report">
                                <i class="fa fa-tablet"></i>
                            </p>
                        </div>
                        <a class="link-item" href="<?= base_url() . 'admin/berita_acara'; ?>">
                            <p class="title-item">
                                View Berita Acara
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Berita Acara Yang dibuat
                        </p>
                        <p class="value-item">
                            <?= $this->db->query("SELECT * FROM beritaacara")->num_rows() ?>

                        </p>
                        <p class="des-item">
                            Aktif
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div id="rep2" class="item-report col-md-12">
                <div class="row">
                    <div class="content col-md-12">
                        <div class="item-emblem2">
                            <p class="icon-item-report">
                                <i class="fa fa-book"></i>
                            </p>
                        </div>
                        <a class="link-item" href="<?= base_url() . 'admin/ruang'; ?>">
                            <p class="title-item">
                                Ruangan
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Setting Ruangan
                        </p>
                        <p class="value-item">
                            <?= $this->db->query("SELECT * FROM ruang_uji")->num_rows() ?>
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
                                <i class="fa fa-user-secret"></i>
                            </p>
                        </div>
                        <a class="link-item" href="<?= base_url() . 'admin/'; ?>">
                            <p class="title-item">
                                Cooming Soon
                            </p>
                        </a>
                        <p class="sub-title-item">
                            Cooming Soon
                        </p>
                        <p class="value-item">
                            none
                        </p>
                        <p class="des-item">
                            Aktif
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