<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Tambah Guru Pengajar
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Tambah Jam
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Jam Pengajar</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url() . 'admin/mengajarAksi' ?>" method="post">
                <div class="col-md-6 offset-3">
                    <div class="form-group">
                        <label class="font-weight-bold" for="kodeGuru">Nama Guru</label>
                        <select name="idguru" id="idguru" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php foreach ($guru as $gr) { ?>
                                <option value="<?= $gr->kodeGuru; ?>"><?= $gr->nama_lengkap; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="mapel">Mata Pelajaran</label>
                        <select name="mapel" id="mapel" class="form-control">
                            <option value="">Pilih Mata Pelajaran</option>
                            <?php foreach ($mapel as $mpl) { ?>
                                <option value="<?= $mpl->kodeMapel ?>"><?= $mpl->Nama_mapel; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tingkat" class="font-weight-bold">Tingkatan :</label>
                        <select name="tingkat" id="tingkat" class="form-control">
                            <option value="">Pilih Tingkatan</option>
                            <option value="X">Tingkat X</option>
                            <option value="XI">Tingkat XI</option>
                            <option value="XII">Tingkat XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam" class="font-weight-bold">Jam Mengajar</label>
                        <input type="number" name="jam" id="jam" class="form-control">
                    </div>
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() . 'assets/js/main.js'; ?>"></script>