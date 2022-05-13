<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Setting Exam
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Pilih Menu
            </p>
        </div>
    </div>
    <br>
    <br>
    <?php
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "gagal") {
            echo "<script>
           alert('maaf nama kelas sudah tersedia');
           document.location.href = 'ruang';
           </script>";
        }
    }

    ?>
    <div class="row">
        <div class="col-md-4">

            <a href="javascript:bukaTambah()" class="btn btn-success" data-target="#test" data-toggle="test"><i class="fas fa-plus"></i> Tambah Ruang</a>

        </div>
    </div>
    <br>
    <table id="sudo" class="table table-borderless table-primary table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Nama Kelas</th>
                <th>Tingkatan</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <?php
        $no = 1;
        foreach ($ruang as $rg) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $rg->nama_ruang; ?></td>
                <td><?= $rg->Nama_kelas; ?></td>
                <td><?= $rg->Tingkatan_Kelas; ?></td>
                <td>
                    <a href="#" class="btn btn-warning"><i class="fas fa-wrench"></i> Edit </a>
                    <a href="<?= base_url('admin/hapusRuang') . '/' . $rg->idRuang; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="modal fade" id="tambahRuang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'admin/ruangaski'; ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="namaR">Nama Ruang</label>
                                <input type="text" name="namaR" id="namaR" placeholder="Masukan Nama Ruang" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="kelas">Nama Kelas</label>
                                <select name="kelas" id="kelas" class="form-control">
                                    <?php foreach ($kelas as $kls) { ?>
                                        <option value="<?= $kls->kodeKelas ?>"><?= $kls->Nama_kelas; ?></option>
                                    <?php }  ?>
                                </select>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function bukaTambah() {
        $('#tambahRuang').modal('show');
    }

    function gagal() {
        Swal.fire({
            title: 'Custom animation with Animate.css',
            animation: false,
            customClass: {
                popup: 'animated tada'
            }
        })

    }
</script>
<!-- Sweet Alert -->
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>