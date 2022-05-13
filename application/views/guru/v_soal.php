<?php
$kodeGuru = $this->session->userdata('kode');

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h4>Daftar Soal</h4>
        </div>
        <div class="card-body">
            <a href="<?= base_url() . 'guru/bankSoal'; ?>" class="btn btn-outline-dark btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
            <?php
            $cek = $this->db->query("SELECT * FROM soal WHERE codeSoal = '$pkt->codeSoal' AND kodeMapel = '$pkt->kodeMapel' AND kodeGuru = '$pkt->kodeGuru' AND jenis_soal = 1")->num_rows();
            $ceke = $this->db->query("SELECT * FROM soal WHERE codeSoal = '$pkt->codeSoal' AND kodeMapel = '$pkt->kodeMapel' AND kodeGuru = '$pkt->kodeGuru' AND jenis_soal = 2")->num_rows();
            if ($cek == $pkt->JPilihan) { ?>
                <a class="btn btn-sm btn-primary disabled" href="<?= base_url() . 'guru/soal_tambah_pg/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal PG</a>
                <a class="btn btn-sm btn-info" href="<?= base_url() . 'guru/soal_tambah_esai/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal Esai</a>
            <?php } else if ($ceke == $pkt->JEsai) { ?>
                <a class="btn btn-sm btn-primary " href="<?= base_url() . 'guru/soal_tambah_pg/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal PG</a>
                <a class="btn btn-sm btn-info disabled" href="<?= base_url() . 'guru/soal_tambah_esai/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal Esai</a>
            <?php } else if ($ceke == $pkt->JEsai && $cek == $pkt->JPilihan) { ?>
                <a class="btn btn-sm btn-primary disabled" href="<?= base_url() . 'guru/soal_tambah_pg/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal PG</a>
                <a class="btn btn-sm btn-info disabled" href="<?= base_url() . 'guru/soal_tambah_esai/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal Esai</a>
            <?php } else { ?>
                <a class="btn btn-sm btn-primary " href="<?= base_url() . 'guru/soal_tambah_pg/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal PG</a>
                <a class="btn btn-sm btn-info" href="<?= base_url() . 'guru/soal_tambah_esai/' . $pkt->idPaketSoal; ?>"><i class="fa fa-plus"></i> Tambah soal Esai</a>
            <?php } ?>
            <a class="btn btn-sm btn-success" href="<?= base_url() . 'guru/form/' . $pkt->idPaketSoal; ?>"><i class="fa fa-file-excel-o"></i> <span clas=""></span> Import soal Excel</a>
            <br><br>
            <table id="sudo" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th>Tingkatan</th>
                        <th>Kode Soal</th>
                        <th>Nama Jurusan</th>
                        <th>Soal</th>
                        <th>Kunci Jawab</th>
                        <th>Mapel</th>
                        <th>Jenis Soal</th>
                        <th width="18%">Opsi</th>
                    </tr>
                </thead>
                <?php
                $soal = $this->db->query("SELECT Nomor_soal,Tingkatan,codeSoal,soal,kunci_jawab,kodeMapel,jenis_soal,id_soal,Jurusan FROM soal WHERE Tingkatan='$pkt->Tingkatan' AND kodeGuru ='$pkt->kodeGuru' AND codeSoal='$pkt->codeSoal' AND kodeMapel='$pkt->kodeMapel' ORDER BY jenis_soal,Nomor_soal ASC")->result();
                foreach ($soal as $s) : ?>
                    <?php
                        $r = $this->db->query("SELECT Nama_mapel FROM mapel WHERE kodeMapel='$s->kodeMapel'")->row();
                        ?>
                    <tr>
                        <td><?= $s->Nomor_soal; ?></td>
                        <td><?= $s->Tingkatan; ?></td>
                        <td><?= $s->codeSoal; ?></td>
                        <td><?= $s->Jurusan; ?></td>
                        <td><?= $s->soal; ?></td>
                        <td><?= $s->kunci_jawab; ?></td>
                        <td><?= $r->Nama_mapel;  ?></td>
                        <td><?= $s->jenis_soal;  ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= base_url() . 'guru/soal_edit/' . $s->id_soal . "/" . $s->jenis_soal; ?>"><i class="fa fa-wrench"></i>Edit</a>
                            <a class="btn btn-danger" href="<?= base_url() . 'guru/soal_hapus/' . $s->id_soal . "/" . $pkt->idPaketSoal; ?>"><i class="fa fa-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
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