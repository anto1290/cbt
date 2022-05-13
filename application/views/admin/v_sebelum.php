<div class="main-content" id="main-content">
    <div class="header row">
        <div class="col-md-12">
            <p class="header-tittle  animated infinity bounceInDown ">
                Ujian Non - AKtif
            </p>
            <p class="sub-header-tittle  animated infinity bounceInDown ">
                Ujian Sudah Berakhir dan Sudah Dinon Aktifkan
            </p>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <center>
                <h2>Daftar Ujian Non Aktif</h2>
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
                            <th width="5%">
                                <center>Jurusan</center>
                            </th>
                            <th>
                                <center>Status</center>
                            </th>
                            <th>
                                <center>Jumlah PG</center>
                            </th>
                            <th>
                                <center>Jumlah Esai</center>
                            </th>
                            <th>
                                <center>Tahun Ajaran</center>
                            </th>
                            <th width="20%">
                                <center>Opsi</center>
                            </th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($set as $pkt) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pkt->codeSoal; ?></td>
                                <td><?= $pkt->kodeMapel; ?></td>
                                <td><?= $pkt->Tingkatan; ?></td>
                                <td><?= $pkt->Jurusan; ?></td>
                                <td><?php if ($pkt->status == "Y") {
                                            echo "AKTIF";
                                        } else {
                                            echo "Non-Aktif";
                                        } ?>
                                </td>
                                <td><?= $pkt->JPilihan; ?></td>
                                <td><?= $pkt->JEsai; ?></td>
                                <td><?= $pkt->tahunAjaran; ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-lg btn-success" href="<?= base_url() . ''; ?>"><i class="fas fa-fw fa-power-off"></i></a>
                                    </center>
                                </td>
                            </tr>

                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() . 'assets/js/main.js'; ?>"></script>