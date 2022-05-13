<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Edit Kelas
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Edit Kelas
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Kelas</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/kelas'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <?php foreach ($kelas as $kls) : ?>
                <form action="<?= base_url() . 'admin/kelas_update'; ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $kls->idkelas; ?>">
                    <div class="form-group">
                        <label for="Tingkatan_Kelas">Tingkatan Kelas</label>
                        <select class="form-control" name="Tingkatan_Kelas" id="Tingkatan_Kelas">
                            <option value="">Pilih Tingkatan</option>
                            <option <?php if ($kls->Tingkatan_Kelas == "X") {
                                            echo "selected='selected'";
                                        } ?> value="X">Kelas X</option>
                            <option <?php if ($kls->Tingkatan_Kelas == "XI") {
                                            echo "selected='selected'";
                                        } ?> value="XI">Kelas XI</option>
                            <option <?php if ($kls->Tingkatan_Kelas == "XII") {
                                            echo "selected='selected'";
                                        } ?> value="XII">Kelas XII</option>
                            <option <?php if ($kls->Tingkatan_Kelas == "XIII") {
                                            echo "selected='selected'";
                                        } ?> value="XIII">Kelas XIII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">kode Kelas</label>
                        <input type="Text" name="kode" id="kode" class="form-control" value="<?= $kls->kodeKelas ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kelas</label>
                        <input type="Text" name="nama" id="nama" class="form-control" value="<?= $kls->Nama_kelas ?>">
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <select class="form-control" name="Jurusan" id="Jurusan">
                            <option value="">Pilih Tingkatan</option>
                            <option <?php if ($kls->Jurusan == "Usaha Perjalanan Wisata") {
                                            echo "selected='selected'";
                                        } ?> value="Usaha Perjalanan Wisata">Kelas UPW</option>
                            <option <?php if ($kls->Jurusan == "Perhotelan") {
                                            echo "selected='selected'";
                                        } ?> value="Perhotelan">Kelas PH</option>
                            <option <?php if ($kls->Jurusan == "Tata Boga") {
                                            echo "selected='selected'";
                                        } ?> value="Tata Boga">Kelas TBG</option>
                            <option <?php if ($kls->Jurusan == "Caregiver") {
                                            echo "selected='selected'";
                                        } ?> value="Caregiver">Kelas CGV</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Update Data</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>