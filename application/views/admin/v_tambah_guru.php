<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Tambah Data Guru
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Data Guru
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Guru Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/guru'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <form action="<?= base_url() . 'admin/guru_aksi'; ?>" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nip">NIP GURU</label>
                            <input class="form-control" type="text" name="nip" id="nip" placeholder="Masukan NIP">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="Tugas">Tugas Tambahan</label>
                            <select class="form-control" name="Tugas" id="Tugas">
                                <option value="">--Pilih Tugas--</option>
                                <?php foreach ($jabatan as $mpl) { ?>
                                    <option value="<?= $mpl->kodeJabatan;  ?>"><?= $mpl->namaJabatan;  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukan Nama Anda">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="hp">Handphone</label>
                            <input class="form-control" type="number" name="hp" id="hp" placeholder="Masukan nomor Handphone">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="kode">Kode Guru</label>
                            <input class="form-control" type="text" name="kode" id="kode" placeholder="Masukan Kode Guru GR">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="tempat" class="font-weight-bold">Tempat Lahir</label>
                        <input class="form-control" type="text" name="tempat" id="tempat" placeholder="masukan Tempat Lahir">
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal" class="font-weight-bold">tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal" id="tanggal">
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="4"></textarea>
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Tambah Data Guru</button>
            </form>
        </div>
    </div>
</div>