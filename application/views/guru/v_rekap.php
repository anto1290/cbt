<div class="container-fluid">
    <div class="table-responsive mt-2">
        <table id="sudo" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Soal</th>
                    <th>Kode Mapel</th>
                    <th>Tingkatan</th>
                    <th>Jurusan</th>
                    <th>Jumlah PG</th>
                    <th>Jumlah Esai</th>
                    <th>Status</th>
                    <th>Tahun Ajaran</th>
                    <th width="20%">Opsi</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($paket as $pkt) { ?>
                <tbody>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pkt->codeSoal; ?></td>
                        <td><?= $pkt->kodeMapel; ?></td>
                        <td><?= $pkt->Tingkatan; ?></td>
                        <td><?= $pkt->Jurusan; ?></td>
                        <td><?= $pkt->JPilihan; ?></td>
                        <td><?= $pkt->JEsai; ?></td>
                        <td><?= $pkt->status; ?></td>
                        <td><?= $pkt->tahunAjaran; ?></td>
                        <td>
                            <?php
                                if ($pkt->JEsai > 0) { ?>
                                <a class="btn btn-danger" href="<?= base_url() . 'guru/koreksi/' . $pkt->codeSoal; ?>"><i class="fas fa-check-double"> Koreksi</i></a>
                            <?php
                                } else {
                                    ?>
                                <a class="btn btn-danger disabled" href="#"><i class="fas fa-check-double"> Koreksi</i></a>
                            <?php } ?>
                            <a class="btn btn-info" href="<?= base_url() . 'guru/nilaiRekap/' . $pkt->codeSoal; ?>"><i class="fas fa-chart-bar"> Rekap Nilai</i></a>
                        </td>
                    </tr>

                </tbody>
            <?php } ?>
        </table>
    </div>


</div>
<script>
    $(document).ready(function() {
        $('#sudo').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
</script>