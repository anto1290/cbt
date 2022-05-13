<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header text-center ">
            <h5 class="animated infinity bounceInDown">Jurusan</h5>
        </div>
        <div class="card-body">
            <a class="btn btn-sm btn-success pull-right" href="<?= base_url() . 'admin/jurusanT'; ?>"><i class="fa fa-plus"></i> Tambah Jurusan</a>
            <br><br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th>Nama Jurusan</th>
                        <th>Alias</th>
                        <th width="10%">Opsi</th>
                    </tr>
                </thead>
                <?php
                foreach ($jurusan as $kls) : ?>
                    <tr>
                        <td><?= $kls->idJurusan; ?></td>
                        <td><?= $kls->Nama; ?></td>
                        <td><?= $kls->Alias; ?></td>
                        <td>
                            <a class="btn btn-danger" href="<?= base_url() . 'admin/hapusJurusan/' . $kls->idJurusan; ?>"><i class="fa fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php
                endforeach; ?>
            </table>
        </div>
    </div>
</div>