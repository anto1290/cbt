<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header text-center ">
            <h5 class="animated infinity bounceInDown">Cetak Kartu Ujian</h5>
        </div>
        <div class="card-body">
            <br><br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th>Kode Kelas</th>
                        <th>Ruang Ujian</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th width="18%">Opsi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($uji as $kls) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $kls->kodeKelas; ?></td>
                        <td><?= $kls->nama_ruang; ?></td>
                        <td><?= $kls->Nama_kelas; ?></td>
                        <td><?= $kls->Jurusan; ?></td>
                        <td>
                            <center>
                                <a target="_blank" href="<?= base_url('admin/readyCetak') . '/' . $kls->idRuang; ?>" class="btn btn-warning" style="width:100px"><i class="fa fa-print"> Print</i></a>
                            </center>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>