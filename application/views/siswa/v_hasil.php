<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
        <h4>Nilai Hasil Study</h4>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            <h6>Nama Siswa </h6>
            </div>
            <div class="col-md-4">
            <?= ': '.$nama;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            <h6>Tingkatan Siswa </h6>
            </div>
            <div class="col-md-4">
            <?= ': '.$Tingkatan;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            <h6>Kelas Siswa </h6>
            </div>
            <div class="col-md-4">
            <?= ': '.$kelas;?>
            </div>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabledatatable" >
                <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Pelajaran</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($nilai as $n){?>
                    <tr>
                        <td><?=$no++;?></td>
                        <?php foreach($mapel=$this->db->query("SELECT Nama_mapel FROM mapel WHERE id_mapel=$n->id_mapel")->result() as $mpl ) {?>
                        <td><?= $mpl->Nama_mapel; ?></td>
                        <?php } ?>
                        <td><?= $n->totalnilai ;?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>