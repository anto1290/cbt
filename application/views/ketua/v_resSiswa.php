<!-- Begin Page Content -->
<div class="container-fluid main-content">

    <!-- Page Heading -->
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Ujian Sedang Berjalan
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Anda Dapat Menonaktifkan Ujian dan Merestart Siswa
            </p>
        </div>
    </div>
    <br>
    <br>
    <a href="<?= base_url('admin/berjalan'); ?>" class="btn btn-primary"><i class="fa fa-undo" >Back</i></a>
    <div class="card">
        <div class="card-header">
            <center>
                <h2>Daftar Ujian Sedang Berjalan</h2>
            </center>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="sudo" class="table table-bordered table-responsive table-striped table-hover dataTables_filter">
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
                                <center>Kode Soal</center>
                            </th>
                            <th>
                                <center>Kelas</center>
                            </th>
                            <th>
                                <center>Jenis Ujian</center>
                            </th>
                            <th>
                                <center>Token</center>
                            </th>
                            <th>
                                <center>Semester</center>
                            </th>
                            <th>
                                <center>Status Ujian</center>
                            </th>
                            <th style="width: 30%;">
                                <center>Opsi Ujian </center>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sisU as $pkt) { 
                        $statusFinish = $this->db->query("SELECT * FROM nilai WHERE nis=$pkt->nis AND codeSoal='$pkt->codeSoal'")->num_rows();
                        $kelas = $this->db->query("SELECT Nama_kelas FROM kelas WHERE kodeKelas='$pkt->kodeKelas'")->row();
                        $nama = $this->db->query("SELECT nama_siswa FROM siswa WHERE nis=$pkt->nis")->row();

                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pkt->nis; ?></td>
                                <td><?= $nama->nama_siswa; ?></td>
                                <td><?= $pkt->tingkatan; ?></td>
                                <td><?= $pkt->codeSoal; ?></td>
                                <td><?= $kelas->Nama_kelas; ?></td>
                                <td><?= $pkt->jurusan; ?></td>
                                <td><?= $pkt->Token; ?></td>
                                <td><?= $pkt->semester; ?></td>
                                <td>
                                    <?php if($statusFinish > 0){
                                        ?>
                                        <span class="badge badge-success">Selesai</span>
                                    <?php }else if($pkt->statusU == 1){ ?>
                                        <span class="badge badge-danger">Dikeluarkan</span>
                                    <?php 
                                    }else{ ?>
                                        <span class="badge badge-secondary">Sedang Dikerjakan</span>
                                    <?php } ?> 
                                </td>
                                <td>
                                    <center>
                                    <button id="restartAkun-<?= $pkt->idSiswaUjian; ?>" data-id="<?= $pkt->idSiswaUjian; ?>" class="restart btn btn-info btn-sm" ><i class="fa fa-undo"></i></button>
                                    <button id="keluarAkun-<?= $pkt->idSiswaUjian; ?>"  data-id="<?= $pkt->idSiswaUjian; ?>" class="btn  keluar btn-danger btn-sm" ><i class="fa fa-sign-out-alt"></i></button>
                                    <button id="selesaiAkun-<?= $pkt->idSiswaUjian; ?>"  data-nis="<?= $pkt->nis; ?>" data-codeSoal="<?= $pkt->codeSoal; ?>" class="btn selesai btn-warning btn-sm" ><i class="fa fa-key"></i></button>
                                    <button id="HapusAkun-<?= $pkt->idSiswaUjian; ?>"  data-id="<?= $pkt->idSiswaUjian; ?>"  data-nis="<?= $pkt->nis; ?>" data-codeSoal="<?= $pkt->codeSoal; ?>" class="btn hapus btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                    
                                    </center>

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.restart').click(function(){
    var idButton = $(this).attr('id');
    var id = $(this).attr('data-id');
    let stat = 0;
    Swal.fire({
        title: 'Apakah Yakin ',
        text: "untuk Merestart Akun ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Restart'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"<?= base_url('admin/ress'); ?>",
                data : {
                    id:id,
                    stat:stat
                }
            }).done(function(){
                 Swal.fire(
                    'Restart!',
                    'Restart Akun Success',
                    'success'
                    );
          		location.reload(true);
            }).fail(function(){
                Swal.fire(
                    'Restart!',
                    'Restart Akun Fail',
                    'error'
                    );
            });
           
        }
        }) 
    
       
    });
    $('.keluar').click(function(){
    	var idButton = $(this).attr('id');
        var id = $(this).attr('data-id');
        let stat = 1;
        Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Keluarkan Akun Tersebut!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Keluar!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
            url:"<?= base_url('admin/ress'); ?>",
            data : {
                id:id,
                stat:stat
            }
        }).done(function(){
            Swal.fire(
            'Akun!',
            'Akun Berhasil Dikeluarkan',
            'success'
            );
            location.reload(true);
        }).fail(function(){
            Swal.fire(
            'Akun!',
            'Akun Gagal Dikeluarkan',
            'error'
            );
        });
            
        }
        }); 
        
    });
    $('.selesai').click(function(){
    	var idButton = $(this).attr('id');
        var nis = $(this).attr('data-nis');
        var codeSoal = $(this).attr('data-codeSoal');
        Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Diselesaikan Akun Tersebut!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Selesai!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
            type:"POST",
            url:"<?= base_url('admin/selesai'); ?>",
            data : {
                nis:nis,
                codeSoal:codeSoal
            }
        }).done(function(){
            Swal.fire(
            'Akun!',
            'Akun Berhasil Diselesaikan',
            'success'
            );
            location.reload(true);
        }).fail(function(){
            Swal.fire(
            'Akun!',
            'Akun Gagal Diselesaikan',
            'error'
            );
        });
            
        }
        }); 
        
    });
    $('.hapus').click(function(){
        var idButton = $(this).attr('id');
        var id = $(this).attr('data-id');
        var nis = $(this).attr('data-nis');
        var codeSoal = $(this).attr('data-codeSoal');
        Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Hapus Akun Tersebut Dari Ujian!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Selesai!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
            type:"POST",
            url:"<?= base_url('admin/hapusdariSoal'); ?>",
            data : {
                id,
                nis,
                codeSoal
            }
        }).done(function(){
            Swal.fire(
            'Akun!',
            'Akun Berhasil Hapus',
            'success'
            );
            location.reload(true);
        }).fail(function(){
            Swal.fire(
            'Akun!',
            'Akun Gagal Hapus',
            'error'
            );
        });
            
        }
        }); 
        
    });
});
</script>