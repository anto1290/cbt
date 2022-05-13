<link href="<?= base_url() . 'assets/datepicker/'; ?>dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/datepicker.min.js"></script>
<!-- date time picker -->
<link href="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.datetimepicker.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.js"></script>
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>build/jquery.datetimepicker.full.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Tambah Berita Acara
            </p>
        </div>
    </div>
    <br>
    <br>
    <form action="<?= base_url() . 'admin/aksi_berita'; ?>" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="ujian">Jenis Ujian</label>
                    <select class="form-control" name="ujian" id="ujian" autocomplete="off" required>
                        <option value="">Pilih Jenis Ujian</option>
                        <?php foreach ($tes as $t) {  ?>
                            <option value="<?= $t->namaTes; ?>"><?= $t->aliasTes; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div><!-- Akhir -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="pengawas1">Pengawas 1</label>
                    <select class="form-control" name="pengawas1" id="pengawas1" autocomplete="off" required>
                        <option value="-">Pilih Pengawas</option>
                        <?php foreach ($guru as $gr) {  ?>
                            <option value="<?= $gr->nama_lengkap; ?>"><?= $gr->nama_lengkap; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="pengawas2">Pengawas 2</label>
                    <select class="form-control" name="pengawas2" id="pengawas2">
                        <option value="">Pilih Pengawas</option>
                        <?php foreach ($guru as $gr) {  ?>
                            <option value="<?= $gr->nama_lengkap; ?>"><?= $gr->nama_lengkap; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div><!-- Akhir -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="ruang">Ruang Pengawasan</label>
                    <input class="form-control" type="text" name="ruang" id="ruang" autocomplete="off" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="mapel">Mapel</label>
                    <select class="form-control" name="mapel" id="mapel" >
                        <option>Pilih Mapel</option>
                        <?php foreach ($mapel as $key => $m) { ?>
                            <option value="<?= $m->Nama_mapel ;?>" ><?= $m->Nama_mapel ;?></option>
                            <?php 
                        } ?>

                    </select>
                </div>
            </div>
        </div><!-- Akhir -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="jSiswa">Jumlah Siswa</label>
                    <input class="form-control" type="text" name="jSiswa" id="jSiswa">
                    <p>Jumlah Siswa Dalam Ruangan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="jSiswaHadir">Jumlah Siswa Hadir</label>
                    <input class="form-control" type="text" name="jSiswaHadir" id="jSiswaHadir">
                    <p>Jumlah Siswa Hadir Dalam Ruangan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="jSiswaTHadir">Jumlah Siswa Tidak Hadir</label>
                    <input class="form-control" type="text" name="jSiswaTHadir" id="jSiswaTHadir">
                    <p>Jumlah Siswa Tidak Hadir Dalam Ruangan</p>
                </div>
            </div>
        </div><!-- Akhir -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="Mulai">Waktu Mulai</label>
                    <input class="form-control" type="text" name="Mulai" id="datetimepicker2" autocomplete="off" required>
                    <p>Waktu Mulai Ujian</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="selesai">Waktu Selesai</label>
                    <input class="form-control" type="text" name="selesai" id="datetimepicker3" autocomplete="off" required>
                    <p>Waktu Akhir Ujian</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="tglUjian">Tanggal Ujian</label>
                    <input class="form-control" type="text" name="tglUjian" id="datetimepicker4" autocomplete="off" required>
                    <p>Waktu Akhir Ujian</p>
                </div>
            </div>
        </div><!-- Akhir -->
        <button class="btn btn-success"><i class="fa fa-plus"> Tambah Berita Acara </i></button>
    </form>
</div>
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/i18n/datepicker.en.js"></script>
<script>
    jQuery('#datetimepicker').datetimepicker();
    jQuery('#datetimepicker4').datetimepicker({
        format: 'Y-m-d',
        lang: 'en'
    });
    jQuery('#image_button').click(function() {
        jQuery('#datetimepicker4').datetimepicker('show'); //support hide,show and destroy command
    });

    jQuery('#datetimepicker2').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
    jQuery('#datetimepicker3').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
</script>