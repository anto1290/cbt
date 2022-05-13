<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header text-center">
            <h4>Daftar Mata Pelajaran</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-sm btn-success pull-right" href="<?= base_url() . 'admin/mapel_tambah'; ?>"><i class="fa fa-plus"></i> Tambah Mapel</a>
            <br><br>
            <div class="table-responsive">
                <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                    <thead>
                        <tr>
                            <th width="1%">NO</th>
                            <th>Nama Pelajaran</th>
                            <th>Kode Pelajaran</th>
                            <th>kelompok Pelajaran</th>
                            <th>Jurusan</th>
                            <th width="18%">Opsi</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($mapel as $mpl) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $mpl->Nama_mapel; ?></td>
                            <td><?= $mpl->kodeMapel; ?></td>
                            <td><?= $mpl->kelompok; ?></td>
                            <td><?= $mpl->jurusan; ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= base_url() . 'admin/mapel_edit/' . $mpl->id_mapel; ?>"><i class="fa fa-wrench"></i>Edit</a>
                                <a class="btn btn-danger" href="<?= base_url() . 'admin/mapel_hapus/' . $mpl->id_mapel; ?>"><i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>