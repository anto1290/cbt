
<script type="text/javascript" src="<?= base_url().'assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js';?>"></script>

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
        <h4>Nama Siswa</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="sudo" class="table table-striped table-bordered" style="width:100%">
                <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nomor NIS</th>
                            <th>Nama Kelas</th>
                            <th>Kelas</th>
                            <th>Nama Siswa</th>
                            <th>Alamat</th>
                            <!-- <th width="10%">Opsi</th> -->
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach($siswa as $sis){
                    ?>
                    <tbody>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $sis->nis; ?></td>
                        <td><?= $sis->Nama_kelas; ?></td>
                        <td><?= $sis->Tingkatan; ?></td>
                        <td><?= $sis->nama_siswa; ?></td>
                        <td><?= $sis->alamat_siswa; ?></td>
                        <!-- <td>
                        <a href=""></a>
                        </td> -->
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
