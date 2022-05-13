<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Ujian dan jawaban
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Jawaban Siswa
            </p>
        </div>
    </div>
    <br>
        <a href="<?= base_url('admin/berjalan'); ?>" class="btn btn-primary"><i class="fa fa-undo" >Back</i></a>
        <br>
    <div class="card">
        <div class="card-header">
            <center>
                <h2>Daftar Siswa dan Jawaban</h2>
            </center>
        </div>
        <div class="card-body">
             <div class="table-responsive">
                <table id="jawabanU" class="table table-bordered table-responsive table-striped table-hover dataTables_filter">
                    <thead>
                        <tr>
                            <th>
                                <center>NO</center>
                            </th>
                            <th>
                                <center>NIS</center>
                            </th>
                            <th>
                                <center>Nama</center>
                            </th>
                            <th>
                                <center>Tingkatan</center>
                            </th>
                            <th>
                                <center>Kelas</center>
                            </th>
                            <th>
                                <center>Jawaban</center>
                            </th>
                            <!-- <th>
                                <center>Status Ujian</center>
                            </th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                        foreach ($sisU as $pkt) {
                            $kelas = $this->db->query("SELECT Nama_kelas FROM kelas WHERE kodeKelas='$pkt->kodeKelas'")->row();
                            $nama = $this->db->query("SELECT nama_siswa FROM siswa WHERE nis=$pkt->nis")->row();
                            $jawaban = $this->db->query("SELECT * FROM jawaban WHERE nis=$pkt->nis AND codeSoal='$pkt->codeSoal' ORDER BY Nomor_soal ASC")->result();
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pkt->nis; ?></td>
                            <td><?= $nama->nama_siswa; ?></td>
                            <td><?= $pkt->tingkatan; ?></td>
                            <td><?= $kelas->Nama_kelas; ?></td>
                            <td>
                                <?php foreach ($jawaban as $jwb) { 
                                    echo $jwb->Nomor_soal.'|'.$jwb->jawaban.',';
                                 } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#jawabanU').DataTable( {
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