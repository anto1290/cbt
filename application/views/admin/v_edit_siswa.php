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
                Edit Data Siswa
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Data Siswa</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/edit_data'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <?php foreach ($siswa as $sis) : ?>
                <form action="<?= base_url() . 'admin/siswa_update'; ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $sis->idsiswa; ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nama">Nama Kelas</label>
                                <select class="form-control" name="kelas" id="kelas" required>
                                    <option value="">--Pilih Kelas--</option>
                                    <?php foreach ($kelas as $kls) { ?>
                                        <option <?php if ($sis->kodeKelas == $kls->kodeKelas) {
                                                            echo "selected='selected'";
                                                        } ?> value="<?= $kls->kodeKelas;  ?>"><?= $kls->Nama_kelas;  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="nis">Nomor NIS</label>
                                <input value="<?= $sis->nis; ?>" class="form-control" type="number" name="nis" id="nis" placeholder="Masukan nomor nis siswa">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="Agama">Agama Siswa</label>
                                <select class="form-control" name="Agama" id="Agama">
                                    <option value="">--Pilih Agama--</option>
                                    <option <?php if ($sis->Agama == "Islam") {
                                                    echo "selected='selected'";
                                                } ?> value="Islam">Islam</option>
                                    <option <?php if ($sis->Agama == "Kristen") {
                                                    echo "selected='selected'";
                                                } ?> value="Kristen">Kristen</option>
                                    <option <?php if ($sis->Agama == "Hindu") {
                                                    echo "selected='selected'";
                                                } ?> value="Hindu">Hindu</option>
                                    <option <?php if ($sis->Agama == "Buddha") {
                                                    echo "selected='selected'";
                                                } ?> value="Buddha">Buddha</option>
                                    <option <?php if ($sis->Agama == "Kong Hu Cu") {
                                                    echo "selected='selected'";
                                                } ?> value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="Tingkatan">Tingkatan Siswa</label>
                                <select class="form-control" name="Tingkatan" id="Tingkatan" required>
                                    <option value="">--Pilih Tingkatan--</option>
                                    <option <?php if ($sis->Tingkatan == "X") {
                                                    echo "selected='selected'";
                                                } ?> value="X">X</option>
                                    <option <?php if ($sis->Tingkatan == "XI") {
                                                    echo "selected='selected'";
                                                } ?> value="XI">XI</option>
                                    <option <?php if ($sis->Tingkatan == "XII") {
                                                    echo "selected='selected'";
                                                } ?> value="XII">XII</option>
                                    <option <?php if ($sis->Tingkatan == "XIII") {
                                                    echo "selected='selected'";
                                                } ?> value="XIII">XIII</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                                <small class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengubah Password</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                                <input value="<?= $sis->nama_siswa; ?>" class="form-control" type="text" name="nama" id="nama" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="hp">Nomor Handphone</label>
                                <input value="<?= $sis->hp_siswa; ?>" class="form-control" type="text" name="hp" id="hp" placeholder="Masukan Nomor Handphone">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="jurusan">Jurusan Siswa</label>
                                <select class="form-control" name="jurusan" id="jurusan" required>
                                    <option value="">--Pilih Jurusan--</option>
                                    <?php foreach ($jurusan as $js) { ?>
                                        <option <?php if ($sis->idJurusan == $js->idJurusan) {
                                                            echo "selected='selected'";
                                                        } ?> value="<?= $js->idJurusan; ?>"><?= $js->Nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="tempatLahir">Tempat Lahir</label>
                                <input class="form-control" type="text" name="tempatLahir" id="tempatLahir" value="<?= $sis->tempatLahir; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php $ds = date_create($sis->tanggalLahir);
                                    $d = date_format($ds, "d-m-Y"); ?>
                                <label class="font-weight-bold" for="tanggalLahir">Tanggal Lahir</label>
                                <input class="form-control" type="text" name="tanggalLahir" id="datetimepicker1" value="<?= $d;  ?>">
                                <p>Format : 03-01-1997</p>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="JKelamin">Jenis Kelamin</label>
                                <select class="form-control" name="JKelamin" id="JKelamin">
                                    <option value="">Pilih Kelamin</option>
                                    <option <?php if ($sis->JenisKelamin == "Laki - Laki") {
                                                    echo "selected='selected'";
                                                } ?> value="Laki - Laki">Laki - Laki</option>
                                    <option <?php if ($sis->JenisKelamin == "Perempuan") {
                                                    echo "selected='selected'";
                                                } ?>value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold" for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="4"><?= $sis->alamat_siswa; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="status">Status Siswa</label>
                        <select class="form-control" name="status" id="status">
                            <option <?php if ($sis->status_siswa == "Aktif") {
                                            echo "selected='selected'";
                                        } ?> value="Aktif">Aktif</option>
                            <option <?php if ($sis->status_siswa == "Tidak Aktif") {
                                            echo "selected='selected'";
                                        } ?> value="Tidak Aktif">Non Aktif</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Update Data</button>
                </form>
            <?php endforeach; ?>
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