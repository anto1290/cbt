<link href="<?= base_url() . 'assets/datepicker/'; ?>dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/datepicker.min.js"></script>
<!-- date time picker -->
<link href="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.datetimepicker.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.js"></script>
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>build/jquery.datetimepicker.full.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Aktifkan Ulang Ujian
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Mensetting ujian ulang
            </p>
        </div>
    </div>
    <form action="<?= base_url() . 'admin/ubahUji' ?>" method="post">
        <input type="hidden" name="idU" id="idU" value="<?= $paket->idSetUji; ?>">
        <input type="hidden" name="Tingkatan" id="Tingkatan" value="<?= $paket->tingkatan; ?>">
        <input type="hidden" name="jurusan" id="jurusan" value="<?= $paket->jurusan; ?>">
        <input type="hidden" name="jumPG" id="jumPG" value="<?= $paket->jumlahPG; ?>">
        <input type="hidden" name="jumEsai" id="jumEsai" value="<?= $paket->jumlahEsai; ?>">
        <div class="form-group row">
            <label class="col-md-2" for="jenUjian">Jenis Ujian</label>
            :<div class="col-md-6">
                <select class="form-control" name="jenUjian" id="jenUjian">
                    <option value="">Pilih Ujian</option>
                    <?php foreach ($tes as $t) { ?>
                        <option <?php if ($paket->jenis_ujian == $t->aliasTes) {
                                        echo "selected='selected'";
                                    } ?> value="<?= $t->aliasTes; ?>"><?= $t->namaTes; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- Semester -->
        <div class="form-group row">
            <label class="col-md-2" for="semester">Semester</label>
            :<div class="col-md-6">
                <select class="form-control" name="semester" id="semester">
                    <option value="">Pilih Semester</option>
                    <option <?php if ($paket->semester == "Ganjil") {
                                echo "selected='selected'";
                            } ?> value="Ganjil">Ganjil</option>
                    <option <?php if ($paket->semester == "Genap") {
                                echo "selected='selected'";
                            } ?> value="Genap">Genap</option>
                </select>
            </div>
        </div>
        <!-- Code Soal -->
        <div class="form-group row">
            <label class="col-md-2" for="codeSoal">Kode Soal</label>
            :<div class="col-md-6">
                <input type="text" class="form-control" name="codeSoal" id="codeSoal" value="<?= $paket->codeSoal; ?>" readonly>
            </div>
        </div>
        <!-- kode mapel -->
        <div class="form-group row">
            <label class="col-md-2" for="kodeMapel">Kode Mapel</label>
            :<div class="col-md-6">
                <input type="text" class="form-control" name="kodeMapel" id="kodeMapel" value="<?= $paket->kodeMapel; ?>" readonly>
            </div>
        </div>
        <!-- kode mapel -->
        <div class="form-group row">
            <label class="col-md-2" for="idGuru">Guru</label>
            :<div class="col-md-6">
                <?php $guru = $this->db->query("SELECT * FROM guru WHERE id_guru=$paket->idGuru")->row(); ?>
                <Select name="idGuru" class="form-control" readonly>
                    <option value="<?= $paket->idGuru; ?>"><?= $guru->nama_lengkap; ?></option>
                </Select>
            </div>
        </div>
        <!-- Tgl -->
        <div class="form-group row">
            <label class="col-md-2" for="tgl">Waktu Pelaksanaan</label>
            :<div class="col-md-6">
                <input type='text' name="tgl" id='datetimepicker' class='form-control' value="<?php echo "$paket->tglUjian $paket->jamMulai" ?>" />
            </div>
        </div>
        <!-- Jam -->
        <div class="form-group row">
            <label class="col-md-2" for="Durasi">Durasi Pelaksanaan</label>
            :<div class="col-md-6">
                <input type='text' id="Durasi" class="form-control" name="Durasi" placeholder='dalam menit' value="<?= $paket->lamaUjian; ?>" />
            </div>
        </div>
        <!-- Tutup -->
        <div class="form-group row">
            <label class="col-md-2" for="Tutup">Tutup Pelaksanaan</label>
            :<div class="col-md-6">
                <input id='datetimepicker2' name="Tutup" class="form-control" type="text" value="<?= $paket->batasMasuk; ?>">
                <p>waktu Selesai Ujian</p>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2" for="Token">Token</label>
            :<div class="col-md-6">
                <input id="Token" name="Token" class="form-control" type="text" value="<?= $Token; ?>">
            </div>
            <button class="btn-sm btn btn-success" onclick="<?= base_url() . 'admin/run_key'; ?>"><i class="fa fa-undo"></i></button>
        </div>
        <button class="btn btn-info"><i class="fa fa-clock-o"></i> Set Ujian</button>

    </form>
</div>
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/i18n/datepicker.en.js"></script>
<script>
    jQuery('#datetimepicker').datetimepicker();
    jQuery('#datetimepicker4').datetimepicker({
        format: 'd.m.Y H:i',
        lang: 'ru'
    });
    jQuery('#image_button').click(function() {
        jQuery('#datetimepicker4').datetimepicker('show'); //support hide,show and destroy command
    });

    jQuery('#datetimepicker2').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
</script>