<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header text-center ">
            <h5 class="animated infinity bounceInDown">Setting Kelas</h5>
        </div>
        <div class="card-body">
            <a class="btn btn-sm btn-success pull-right" href="<?= base_url() . 'admin/kelas_tambah'; ?>"><i class="fa fa-plus"></i> Tambah Kelas</a>
            <br><br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th>Kode Kelas</th>
                        <th>Level</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th width="18%">Opsi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($kelas as $kls) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $kls->kodeKelas; ?></td>
                        <td><?= $kls->Tingkatan_Kelas; ?></td>
                        <td><?= $kls->Nama_kelas; ?></td>
                        <td><?= $kls->Jurusan; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= base_url() . 'admin/kelas_edit/' . $kls->idkelas; ?>"><i class="fa fa-wrench"></i>Edit</a>
                            <a class="btn btn-danger" href="<?= base_url() . 'admin/kelas_hapus/' . $kls->idkelas; ?>"><i class="fa fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>