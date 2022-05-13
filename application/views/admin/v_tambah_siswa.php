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
                Manajemen Data Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Tambah Data Siswa
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Siswa Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/siswa'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <form action="<?= base_url() . 'admin/siswa_aksi'; ?>" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="kelas">Nama Kelas</label>
                            <select class="form-control" name="kelas" id="kelas">
                                <option value="">--Pilih Kelas--</option>
                                <?php foreach ($kelas as $kls) { ?>
                                    <option value="<?= $kls->kodeKelas;  ?>"><?= $kls->Nama_kelas;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- Batas -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nis">Nomor NIS</label>
                            <input class="form-control" type="number" name="nis" id="nis" placeholder="Masukan nomor nis siswa">
                        </div>
                    </div>
                    <!-- Batas -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="Agama">Agama Siswa</label>
                            <select class="form-control" name="Agama" id="Agama">
                                <option value="">--Pilih Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                    </div>
                    <!-- Batas -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="Tingkatan">Tingkatan Siswa</label>
                            <select class="form-control" name="Tingkatan" id="Tingkatan">
                                <option value="">--Pilih Tingkatan--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                                <option value="XIII">XIII</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukan Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="hp">Nomor Handphone</label>
                            <input class="form-control" type="text" name="hp" id="hp" placeholder="Masukan Nomor Handphone">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="jurusan">Jurusan Siswa</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="">--Pilih Jurusan--</option>
                                <?php foreach ($jurusan as $js) { ?>
                                    <option value="<?= $js->idJurusan; ?>"><?= $js->Nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="tempatLahir">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempatLahir" id="tempatLahir">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="tanggalLahir">Tanggal Lahir</label>
                            <input class="form-control" type="text" name="tanggalLahir" id="datetimepicker1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="JKelamin">Jenis Kelamin</label>
                            <select class="form-control" name="JKelamin" id="JKelamin">
                                <option value="">Pilih Kelamin</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="font-weight-bold" for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="4"></textarea>
                </div>

                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Tambah Data Siswa</button>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() . 'assets/datepicker/'; ?>dist/js/i18n/datepicker.en.js"></script>
<script>
    jQuery('#datetimepicker').datetimepicker();

    jQuery.datetimepicker.setLocale('id');

    jQuery('#datetimepicker1').datetimepicker({

        timepicker: false,
        format: 'd-m-Y'
    });

    // 
    jQuery('#datetimepicker4').datetimepicker({
        format: 'd-m-Y H:i ',
        lang: 'en'
    });

    jQuery('#image_button').click(function() {
        jQuery('#datetimepicker4').datetimepicker('show'); //support hide,show and destroy command
    });

    jQuery('#datetimepicker2').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
</script>