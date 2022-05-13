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
                                <center>Kode Soal</center>
                            </th>
                            <th>
                                <center>Kode Mapel</center>
                            </th>
                            <th>
                                <center>Tingkatan</center>
                            </th>
                            <th width="20%">
                                <center>Jurusan</center>
                            </th>
                            <th>
                                <center>Token</center>
                            </th>
                            <th>
                                <center>Semester</center>
                            </th>
                            <th width="20%">
                                <center>Aksi</center>
                            </th>
                            <th width="18%">
                                <center>Opsi</center>
                            </th>
                        </tr>
                    </thead>
                        <tbody>
                    <?php $no = 1;
                    foreach ($set as $pkt) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pkt->codeSoal; ?></td>
                                <td><?= $pkt->kodeMapel; ?></td>
                                <td><?= $pkt->tingkatan; ?></td>
                                <td><?= $pkt->jurusan; ?></td>
                                <td><?= $pkt->Token; ?></td>
                                <td><?= $pkt->semester; ?></td>
                                <td>
                                    <center><a class="btn btn-sm btn-info" href="<?= base_url() . 'admin/resSiswa/' . $pkt->idSetUji; ?>"><i class="fa fa-undo"></i></a>|<a class="btn btn-sm btn-primary" href="<?= base_url() . 'admin/cekJawaban/' . $pkt->idSetUji; ?>"><i class="fa fa-key"></i></a></center>
                                </td>
                                <td>
                                    <center><a class="btn btn-info" href="<?= base_url() . 'admin/nonAktif/' . $pkt->idSetUji; ?>"><i class="fa fa-clock-o"> Non-Aktifkan</i></a></center>
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



</script>