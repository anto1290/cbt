<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Manajemen Data Sekolah
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Data Mengajar
            </p>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4>Daftar Guru Mengajar</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-sm btn-success pull-right" href="<?= base_url() . 'admin/createMengajar' ?>"><i class="fa fa-plus"></i> Tambah Jam Mengajar</a>
            <br><br>
            <table id="sudo" class="table table-bordered table-striped table-hover tabledatatable">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <!-- <th>Mapel</th> -->
                        <th>Nama Guru</th>
                        <th>Nama Mapel</th>
                        <th>Tingkatan</th>
                        <th>Jumlah Jam</th>
                        <th width="18%">Opsi</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($mengajar as $gr) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $gr->nama_lengkap; ?></td>
                        <td><?= $gr->Nama_mapel; ?></td>
                        <td><?= $gr->tingkatan; ?></td>
                        <td><?= $gr->jumlahJam; ?></td>
                        <td>
                            <a class="btn btn-warning" href="#"><i class="fa fa-wrench"></i>Edit</a>
                            <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>