<?php
$kodeKelas = $this->session->userdata('kode');
$kelas = $this->db->query("SELECT * FROM kelas WHERE kodeKelas ='$kodeKelas'")->row();
$mapel = $this->db->query("SELECT * FROM setujian WHERE Token='$Tok' ")->row();
$Tmapel = $this->db->query("SELECT * FROM mapel WHERE kodeMapel='$mapel->kodeMapel'")->row();
$cekEsay = $this->db->query("SELECT * FROM paketsoal WHERE codeSoal='$mapel->codeSoal'")->row();
$dumm = "";
if($cekEsay->JPilihan === "0"){
  $dumm = "esay";
}else{
   $dumm = "pg";
}
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body text-center">
            <form action="<?= base_url() . 'siswa/'.$dumm.'/' . $mapel->codeSoal . '/' . $halaman = 1; ?>" method="post">
                <input type="hidden" name="Token" id="Token" value="<?= $mapel->Token; ?>">
                <input type="hidden" name="kodeMapel" id="kodeMapel" value="<?= $mapel->kodeMapel; ?>">
                <input type="hidden" name="codeSoal" id="codeSoal" value="<?= $mapel->codeSoal; ?>">
                <h3>Selamat Mengerjakan<b> <?= $siswa; ?></b></h3>
                <p>Jawab Pertanyaan Berikut Dengan Memilih Jawaban Dari Soal <b><?= $Tmapel->Nama_mapel; ?></b></p>
                <p>Untuk Kelas <b><?= $kelas->Nama_kelas; ?></b></p>
                <p>Durasi Waktu Soal <b><?= $mapel->lamaUjian; ?> Menit</b></p>
                <p>Kerjakan soal dengan jumlah soal PG <b><?= $mapel->jumlahPG; ?></b> dan ESAI <b><?= $mapel->jumlahEsai; ?></b></p>
                <b>SELAMAT MENGERJAKAN </b><br>
                <button class="btn btn-info btn-lg">Start Exam</button>
            </form>
        </div>
    </div>
</div>