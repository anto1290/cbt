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
                Setting Jadwal
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Pilih Jadwal Ujian
            </p>
        </div>
    </div>
    <br>
    <form action="<?= base_url() . 'admin/setUji' ?>" method="post">
        <input type="hidden" name="Tingkatan" id="Tingkatan" value="<?= $paket->Tingkatan; ?>">
        <input type="hidden" name="jurusan" id="jurusan" value="<?= $paket->Jurusan; ?>">
        <input type="hidden" name="jumPG" id="jumPG" value="<?= $paket->JPilihan; ?>">
        <input type="hidden" name="jumEsai" id="jumEsai" value="<?= $paket->JEsai; ?>">
        <div class="form-group row">
            <label class="col-md-2" for="jenUjian">Jenis Ujian</label>
            :<div class="col-md-6">
                <select class="form-control" name="jenUjian" id="jenUjian">
                    <option value="">Pilih Ujian</option>
                    <?php foreach ($tes as $t) { ?>
                        <option value="<?= $t->aliasTes; ?>"><?= $t->namaTes; ?></option>
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
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
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
            <label class="col-md-2" for="kodeGuru">Guru</label>
            :<div class="col-md-6">
                <?php $guru = $this->db->query("SELECT * FROM guru WHERE kodeGuru='$paket->kodeGuru'")->row(); ?>
                <Select name="kodeGuru" class="form-control" readonly>
                    <option value="<?= $paket->kodeGuru; ?>"><?= $guru->nama_lengkap; ?></option>
                </Select>
            </div>
        </div>
        <!-- Tgl -->
        <div class="form-group row">
            <label class="col-md-2" for="tgl">Waktu Pelaksanaan</label>
            :<div class="col-md-6">
                <input type='text' name="tgl" id='datetimepicker' class='form-control' />
            </div>
        </div>
        <!-- Jam -->
        <div class="form-group row">
            <label class="col-md-2" for="Durasi">Durasi Pelaksanaan</label>
            :<div class="col-md-6">
                <input type='text' id="Durasi" class="form-control" name="Durasi" placeholder='dalam menit' />
            </div>
        </div>
        <!-- Tutup -->
        <div class="form-group row">
            <label class="col-md-2" for="Tutup">Tutup Pelaksanaan</label>
            :<div class="col-md-6">
                <input id='datetimepicker2' name="Tutup" class="form-control" type="text">
                <p>waktu Selesai Ujian</p>
            </div>
        </div>
        <div class="from-group row">
            <label class="col-md-2" for="Tutup">Acak Soal</label>
            :<div class="col-md-6">
                <select name="acak" id="acak">
                    <option value="Y">Ya</option>
                    <option value="N">Tidak</option>
                </select>
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