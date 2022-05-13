<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
        <h4>Rekap Nilai Siswa</h4>
        </div>
        <div class="card-body">
        <!-- <form method="get" action="">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" placeholder="Masukan Nama Kelas">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="mapel">Kode Soal</label>
                    <input type="text" class="form-control" name="mapel" placeholder="Masukkan kode Mapel">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="soal">Kode Soal</label>
                    <input type="text" class="form-control" name="soal" placeholder="Masukkan kode Soal">
                </div>
            </div>
        </div>
<input type="submit" class="btn btn-primary" value="Filter">
</form> -->
<br>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover display" >
                <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Mapel</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                            <th>Tingkatan</th>
                            <th>Benar PG</th>
                            <th>Nilai PG</th>
                            <th>Nilai Esai</th>
                            <th>Total Nilai</th>
                            <!-- <th width="10%">Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($nilai as $nil){
                        $mapel = $this->db->query("SELECT * FROM mapel WHERE kodeMapel='$nil->kodeMapel'")->row();
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mapel->Nama_mapel; ?></td>
                        <td><?= $nil->nama_siswa; ?></td>
                        <td><?= $nil->Nama_kelas; ?></td>
                        <td><?= $nil->tingkatan; ?></td>
                        <td><?= $nil->benar; ?></td>
                        <td><?= $nil->nilai; ?></td>
                        <td><?= $nil->esai; ?></td>
                        <td><?= $nil->totalnilai; ?></td>
                        <!-- <td>
                        <a href=""></a>
                        </td> -->
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="1%">No</th>
                            <th>Kode mapel</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                            <th>Tingkatan</th>
                            <th>Benar PG</th>
                            <th>Nilai PG</th>
                            <th>Nilai Esai</th>
                            <th>Total Nilai</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'Data Rekap Nilai CBT ADA - SMK DARMAWAN'
            },
            {
                extend: 'pdf',
                messageTop: 'Data Rekap Nilai CBT ADA - SMK DARMAWAN',
                messageBottom: null
            },
            {
                extend: 'print',
                text: 'Print all',
                messageTop: 'Data Rekap Nilai CBT ADA - SMK DARMAWAN',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="<?= base_url().'gambar/smk.png' ;?>" style="position: absolute;width: 600;margin: 400 250;opacity: 0.2;" />'
                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },messageBottom: null
            },
            {
                extend: 'print',
                text: 'Print selected',
                messageTop: 'Data Rekap Nilai CBT ADA - SMK DARMAWAN',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="<?= base_url().'gambar/smk.png' ;?>" style="position: absolute;width: 600;margin: 400 250;opacity: 0.2;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },messageBottom: null
            }
        ],
        select: true
    } );
} );
</script>