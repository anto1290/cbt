<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Setting Exam
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Pengawas
            </p>
        </div>
    </div>
    <br>
    <br>
    <div class="col-md-12">
        <div class="row">
            <a href="javascript:bukaPengawas()" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <br>

        <table id="pengawasTabel" class="table table-bordered table-striped table-hover tabledatatable" width="100%">
            <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Pengawas 1</center>
                    </th>
                    <th>
                        <center>Pengawas 2</center>
                    </th>
                    <th>
                        <center>Pelajaran</center>
                    </th>
                    <th>
                        <center>Ruang Ujian</center>
                    </th>
                    <th>
                        <center>Opsi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pengawas as $p) {
                    if ($p->pengawas2 == 0) {
                        $gr = "-";
                    } else {
                        $guru = $this->db->query("SELECT * FROM guru WHERE id_guru = $p->pengawas2")->row();
                        $gr = $guru->nama_lengkap;
                    }
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p->nama_lengkap; ?></td>
                        <td><?= $gr; ?></td>
                        <td><?= $p->Nama_mapel; ?></td>
                        <td><?= $p->nama_ruang; ?></td>
                        <td>
                            <a href="<?= base_url() . 'admin/hapusPengawas/' . $p->idpengawas; ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahPengawas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengawas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fpengawas" action="<?= base_url() . 'admin/aksipengawas'; ?>" method="post">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label class="font-weight-bold" for="">Pengawas 1</label>
                                    <select name="pengawas1" id="pengawas1" class="form-control">
                                        <option value="">Pilih Guru Pengawas</option>
                                        <?php foreach ($gur as $g) { ?>
                                            <option value="<?= $g->kodeGuru; ?>"><?= $g->nama_lengkap; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="">Pengawas 2</label>
                                    <select name="pengawas2" id="pengawas2" class="form-control">
                                        <option value="">Pilih Guru Pengawas</option>
                                        <?php foreach ($gur as $g) { ?>
                                            <option value="<?= $g->kodeGuru; ?>"><?= $g->nama_lengkap; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Row -->
                        <div class="form-group">
                            <label for="mapel" class="font-weight-bold">Pelajaran Ujian</label>
                            <select name="mapel" id="mapel" class="form-control" required>
                                <option value="">Pilih Ujian</option>
                                <?php foreach ($mapel as $mpl) { ?>
                                    <option value="<?= $mpl->kodeMapel; ?>"><?= $mpl->Nama_mapel; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Akhir Pelajaran ujian -->
                        <div class="form-group">
                            <label for="codeSoal" class="font-weight-bold">Code Soal Ujian</label>
                            <select name="codeSoal[]" id="codeSoal" class="form-control" multiple="multiple" required>
                                <?php foreach ($paket as $p) { ?>
                                    <option value="<?= $p->codeSoal; ?>"><?= $p->codeSoal; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Akhir Code Soal ujian -->
                        <div class="form-group">
                            <label for="ruang" class="font-weight-bold">Ruang Ujian</label>
                            <select name="ruang" id="ruang" class="form-control" required>
                                <option value="">Pilih Ujian</option>
                                <?php foreach ($ruang as $r) { ?>
                                    <option value="<?= $r->idRuang; ?>"><?= $r->nama_ruang; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Akhir Ruang -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="aksiP()" type="button" class="btn btn-primary ">Tambah Pengawas</button>
            </div>
        </div>
    </div>
</div>
<!-- Sweet Alert -->
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<script>

    $(document).ready(function() {
        $('#pengawasTabel').DataTable();
    });
    st2 = jQuery.noConflict(true);
    st2("select").select2({dropdownParent:st2('#tambahPengawas'),theme:'bootstrap',placeholder:'Pilih',})
    function bukaPengawas() {
        $('#tambahPengawas').modal('show');
    }

    function aksiP() {
        document.getElementById('fpengawas').submit();
        Swal.fire({
            type: 'success',
            title: 'Data Berhasil di Tambah',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
<script src="<?= base_url() . 'assets/js/jsku.js'; ?>">