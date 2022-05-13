<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Guru
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Edit Data Guru
            </p>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <a href="<?= base_url() . 'admin/guru'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <?php foreach ($guru as $gr) : ?>
                <form action="<?= base_url() . 'admin/guru_update'; ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $gr->id_guru; ?>">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="username">Username</label>
                                <input value="<?= $gr->username; ?>" class="form-control" type="text" name="username" id="username" placeholder="Masukan Username">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                                <small class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengubah Password</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="nip">NIP GURU</label>
                                <input value="<?= $gr->nip; ?>" class="form-control" type="text" name="nip" id="nip" placeholder="Masukan NIP">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="Tugas">Tugas Tambahan</label>
                                <select class="form-control" name="Tugas" id="Tugas">
                                    <option value=" ">Tugas Tambahan</option>
                                    <?php foreach ($jabatan as $mpl) {
                                            ?>

                                        <option <?php if ($gr->jabatan_Tambahan == $mpl->kodeJabatan) {
                                                            echo "selected ='selected'";
                                                        } ?> value="<?= $mpl->kodeJabatan;  ?>"><?= $mpl->namaJabatan;  ?></option>

                                    <?php }


                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                                <input value="<?= $gr->nama_lengkap; ?>" class="form-control" type="text" name="nama" id="nama" placeholder="Masukan Nama Anda">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="hp">Handphone</label>
                                <input value="<?= $gr->hp; ?>" class="form-control" type="number" name="hp" id="hp" placeholder="Masukan nomor Handphone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="4"><?= $gr->alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="status">Status User</label>
                        <select class="form-control" name="status" id="status">
                            <option <?php if ($gr->status == "Aktif") {
                                            echo "selected='selected'";
                                        } ?> value="Aktif">Aktif</option>
                            <option <?php if ($gr->status == "Tidak Aktif") {
                                            echo "selected='selected'";
                                        } ?> value="Tidak Aktif">Non Aktif</option>
                        </select>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Update Data Guru</button>
                </form>

        </div>
    </div>
</div>