<!-- Begin Page Content -->
<div class="container-fluid main-content">
    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/bersihUjian') ?>">Bersihkan</a>
    <!-- Page Heading -->
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
    <table id="kimi" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Soal</th>
                <th>Kode Mapel</th>
                <th>Tingkatan</th>
                <th>Jurusan</th>
                <th>Jumlah PG</th>
                <th>Jumlah Esai</th>
                <th>Status</th>
                <th>Token</th>
                <th>Semester</th>
                <th>Tgl Ujian</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($set as $pkt) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pkt->codeSoal; ?></td>
                    <td><?= $pkt->kodeMapel; ?></td>
                    <td><?= $pkt->tingkatan; ?></td>
                    <td><?= $pkt->jurusan; ?></td>
                    <td><?= $pkt->jumlahPG; ?></td>
                    <td><?= $pkt->jumlahEsai; ?></td>
                    <td><?php if ($pkt->statusUjian == "Y") {
                                echo "AKTIF";
                            } else {
                                echo "Non-Aktif";
                            } ?>
                    </td>
                    <td><?= $pkt->Token; ?></td>
                    <td><?= $pkt->semester; ?></td>
                    <td><?= $pkt->tglUjian; ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-info" href="<?= base_url() . 'admin/ubahUjian/' . $pkt->idSetUji; ?>"><i class="fa fa-undo"> Aktifkan</i></a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url() . 'admin/hapusUjian/' . $pkt->idSetUji; ?>"><i class="fa fa-trash"> Hapus</i></a>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Soal</th>
                <th>Kode Mapel</th>
                <th>Tingkatan</th>
                <th>Jurusan</th>
                <th>Jumlah PG</th>
                <th>Jumlah Esai</th>
                <th>Status</th>
                <th>Token</th>
                <th>Semester</th>
                <th>Tgl Ujian</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#kimi').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });
    });
</script>