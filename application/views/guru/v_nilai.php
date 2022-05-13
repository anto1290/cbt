<?php 
        $uri3 = ($this->uri->segment(3));

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Koreksi Esay</h4>
        </div>
        <div class="card-body">
                <table id="sudo" class="table table-bordered table-responsive table-striped table-hover dataTables_filter">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>soal</th>
                            <th>Nilai</th>
                            <th>Koreksi</th>
                        </tr>
                    </thead>
                    <?php $no=1; foreach ($soal as $ja) {?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $ja->soal; ?></td>     
                            <td><span><?= $ja->nilai_esai; ?></span></td> 
                            <td>
                                <a class="btn btn-sm btn-info" href="<?= base_url().'guru/tambah_nilai/'.$ja->idsiswa.'/'.$ja->idjawab ;?>"><i class="fa fa-balance-scale" ></i> Koreksi</a>
                            </td>    
                        </tr>
                    <?php }?>
                        
                    </tbody>
                </table>
                <a class="btn btn-info" href="<?= base_url().'guru/esaiNilai/'.$uri3; ?>"><i class="fa fa-save" ></i> Simpan Nilai</a>
        </div>
    </div>
</div>