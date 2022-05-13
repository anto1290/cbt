<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header text-center">
            <h4 class="animated infinity bounceInDown">Tambah Kelas Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/kelas'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <form action="<?= base_url() . 'admin/kelas_aksi'; ?>" method="post">
                <div class="form-group">
                    <label for="Tingkatan_Kelas">Tingkatan Kelas</label>
                    <select class="form-control" name="Tingkatan_Kelas" id="Tingkatan_Kelas">
                        <option value="">Pilih Tingkatan</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                        <option value="XIII">Kelas XIII</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode">Kode Kelas</label>
                    <input type="Text" name="kode" id="kode" class="form-control" placeholder="Masukan kode Kelas">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input type="Text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Kelas">
                </div>
                <div class="form-group">
                    <label for="Jurusan">Jurusan</label>
                    <select class="form-control" name="Jurusan" id="Jurusan">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach ($jurusan as $jr) : ?>
                            <option value="<?= $jr->Nama; ?>">Kelas <?= $jr->Alias; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Tambah Data</button>
            </form>
        </div>
    </div>
</div>