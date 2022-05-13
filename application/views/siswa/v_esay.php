<!-- css ragu ragu -->
<script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/esay.css'); ?>">

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <span class="navbar-brand"><img src="<?= base_url() . 'gambar/smk.png'; ?>" width="100"></span>
    <div class="col-md-4">
        <h5>Soal Esai Nomor : <?= $no ?></h5>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div id='timer'></div>
    </div>
</nav>
<div class="container-fluid">
    <?php
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    $Agama = $this->session->userdata('Agama');
    $nis = $this->session->userdata('nis');
    $jawaban = $this->db->query("SELECT * FROM jawaban WHERE Nomor_test=$uri4 AND codeSoal='$uri3' AND kodeMapel='$s->kodeMapel'  AND nis = $siswa AND jenis_soal='2'")->row();
    ?>
    <div class="loader">
        <img src="<?= base_url() . 'gambar/logo/preload.gif' ?>" alt="">
    </div>
    <form id="nextaja" action="<?= base_url() . 'siswa/test_aksi' ?>" method="post">
        <input type="hidden" name="kodeMapel" value="<?= $s->kodeMapel; ?>">
        <input type="hidden" name="codeSoal" value="<?= $s->codeSoal; ?>">
        <input type="hidden" name="idsiswa" value="<?= $nis; ?>">
        <input type="hidden" name="Nomor_soal" value="<?= $s->Nomor_soal; ?>">
        <input type="hidden" name="jsoal" value="2">
        <input type="hidden" name="id_guru" value="<?= $s->kodeGuru; ?>">
        <input type="hidden" name="halaman" value="<?= $uri4; ?>">
        <?php
        $soal = strip_tags($s->soal, "<br><u><btu><i><p><img><table></table><tr></tr><td></td><th></th>");
        if (empty($s->gambar_soal) && empty($s->audio_soal)) {
            echo "<legend>$soal</legend>";
        } else if (empty($s->gambar_soal)) { ?>
            <ul>
                <p><b>Perhatikan Suara Berikut !</b></p>
            </ul>
            <ul><audio controls>
                    <source src="<?= base_url() . 'audio/' . $s->audio_soal ?>"></audio></ul>
            <legend><?php echo "$soal"; ?></legend>
        <?php } else if (empty($s->audio_soal)) { ?>
            <ul>
                <p><b>Perhatikan Gambar Berikut !</b></p>
            </ul>
            <ul><img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal ?>" width="400"></ul>
            <legend><?php echo "$soal"; ?></legend>
        <?php } else { ?>
            <ul>
                <p><b>Perhatikan Gambar & Suara Berikut !</b></p>
            </ul>
            <ul><img src="<?= base_url() . 'gambar/soal/' . $s->gambar_soal ?>" width="400"></ul>
            <ul><audio controls>
                    <source src="<?= base_url() . 'audio/' . $s->audio_soal ?>"></audio></ul>
            <legend><?php echo "$soal"; ?></legend>
        <?php } ?>
        <textarea class="form-control" name="jawaban" id="jawaban" cols="30" rows="10"></textarea>
        <br>
        <div class="modal-footer">
            <br>
            <hr>
            <!-- PHP -->
            <?php
            $tampil2 = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND S.codeSoal='$uri3' AND (S.Tingkatan='$Tingkatan'OR S.Tingkatan='All')AND (PS.Jurusan='$jurusan->nama' OR PS.Jurusan = 'ALL') AND jenis_soal = '2'  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian='TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();

            $jmlhalaman = ceil($tampil2 / 1);
            ?>
            <input type="hidden" name="jmlH" id="jmlH" value="<?= $jmlhalaman ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php if ($uri4 > 1) {
                            $previous = $uri4 - 1; ?>
                            <a style="width:180px;" class="btn btn-success" href="<?= base_url() . 'siswa/esay/' . $uri3 . '/' . $previous; ?>"><i class="fas fa-arrow-alt-circle-left"></i> Previous</a>

                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <label for="warning" style="width:180px;" class="btn btn-warning text-white">
                            <center><input type="checkbox" name="ragu" id="warning" class="badgebox" value="1"><span class="badge">&check;</span> Ragu - Ragu</center>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <?php

                        if ($uri4 < $jmlhalaman) { ?>
                            <button style="width:180px;" type="button" id="nextAksi" class="btn btn-success">Next <i class="fas fa-arrow-alt-circle-right"></i></button>
                            <?php } else if ($uri4 == $jmlhalaman) {
                            $cekRagu = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND kodeMapel='$s->kodeMapel' AND nis=$siswa AND jenis_soal =2 AND Ragu=1")->num_rows();
                            if ($cekRagu == 0) { ?>
                                <button type="button" class="btn btn-primary tombol-selesai"><a class="finishTime"></a> Finish <i class="fas fa-check-circle"></i></button>
                            <?php } else { ?>
                                <button type="button" id="tombol-ragu" style="width:180px;" class="btn btn-primary ">Finish <i class="fas fa-check-circle"></i></button>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Sweet Alert -->