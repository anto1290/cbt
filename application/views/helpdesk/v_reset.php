<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
        <h4>Reset Akun Siswa</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="sudo" class="table table-bordered table-striped table-hover dataTables_filter" >
                <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>id mapel</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                            <th>Tingkatan</th>
                            <th>Reset Siswa</th>
                            
                            <!-- <th width="10%">Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($nilai as $nil){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $nil->id_mapel; ?></td>
                        <td><?= $nil->nama_siswa; ?></td>
                        <td><?= $nil->Nama_kelas; ?></td>
                        <td><?= $nil->tingkatan; ?></td>
                        <td>
                    <a class="btn btn-danger" href="<?= base_url().'admin/resetSiswa/'.$nil->idnilai; ?>"><i class="fa fa-reset"></i>Reset</a>
                </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>