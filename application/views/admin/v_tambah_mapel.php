<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Tambah Mata Pelajaran
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Tambah Mapel
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header teUPWt-center">
            <h4>Tambah Mata Pelajaran Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'admin/mapel'; ?>" class="btn btn-outline-dark pull-left"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <form action="<?= base_url() . 'admin/mapel_aksi'; ?>" method="post">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama Mata Pelajaran</label>
                            <input type="Text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama pelajaran">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold" for="kelompok">Kelompok Pelajaran</label>
                            <select class="form-control" name="kelompok" id="kelompok" required>
                                <option value="A">Kelompok A</option>
                                <option value="B">Kelompok B</option>
                                <option value="C1">Kelompok C1</option>
                                <option value="C2">Kelompok C2</option>
                                <option value="C3">Kelompok C3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold" for="jurusan">jurusan Pelajaran</label>
                            <select class="form-control" name="jurusan" id="jurusan" required>
                                <option value="ALL">ALL</option>
                                <option value="Usaha Perjalanan Wisata">Usaha Perjalanan Wisata</option>
                                <option value="Perhotelan">Perhotelan</option>
                                <option value="Tata Boga">Tata Boga</option>
                                <option value="Caregiver">Caregiver</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() . 'assets/js/main.js'; ?>"></script>