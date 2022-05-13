<link href="<?= base_url() . 'assets/datepicker/'; ?>dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/datepicker.min.js"></script>
<!-- date time picker -->
<link href="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.datetimepicker.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>jquery.js"></script>
<script src="<?= base_url() . 'assets/datetimepicker/'; ?>build/jquery.datetimepicker.full.min.js"></script>
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
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <form method="POST" action="<?= base_url('siswa/updateData'); ?>">
                        <div class="form-group">
                            <label class="font-weight-bold" for="fname">Nama Lengkap</label>
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="Full Name" value="<?= $siswa->nama_siswa; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="tempatLahir">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir" value="<?= $siswa->tempatLahir; ?>">
                        </div><div class="form-group">
                            <label class="font-weight-bold" for="tanggalLahir">Tanggal Lahir</label>
                            <input class="form-control" type="text" name="tanggalLahir" id="datetimepicker" value="<?= date($siswa->tanggalLahir); ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="nomorHp">Nomor Hp</label>
                            <input class="form-control" type="text" name="nomorHp" id="nomorHp" placeholder="089xxxxx">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="Kelas">Nama Kelas</label>
                            <input class="form-control" type="text" name="Kelas" id="Kelas" readonly value="<?= $this->db->query("SELECT Nama_kelas FROM kelas WHERE kodeKelas='$siswa->kodeKelas'")->row()->Nama_kelas ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="jurusan">Nama Jurusan</label>
                            <input class="form-control" type="text" name="jurusan" id="jurusan" readonly value="<?= $this->db->query("SELECT Nama FROM jurusan WHERE idJurusan='$siswa->idJurusan'")->row()->Nama ?>">
                        </div>
                         <!-- <div class="form-group">
                            <label class="font-weight-bold" for="Agama">Agama</label>
                            <select class="form-control" >
                                
                            </select>                            
                        </div> -->
                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Card Body -->
    </div>
</div>

<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/i18n/datepicker.en.js"></script>
<script>
    jQuery('#datetimepicker').datetimepicker({
        format: 'Y/m/d',
        lang: 'en'
    });
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