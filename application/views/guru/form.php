<?php
$uri3 = ($this->uri->segment(3));
?>
<html>

<head>
  <title>Form Import</title>

  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>

  <script>
    $(document).ready(function() {
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
  </script>
  <style>
DIV.table 
{
    display:table;
}
FORM.tr, DIV.tr
{
    display:table-row;
}
SPAN.td
{
    display:table-cell;
}
</style>
</head>

<body>
  <h3>Form Import</h3>
  <hr>

  <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
  <br>
  <br>

  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?php echo base_url("/guru/form/") . $uri3; ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">

    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
  </form>

  <?php
  if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form 
    if (isset($upload_error)) { // Jika proses upload gagal
      echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    $idpaket = $this->db->query("SELECT codeSoal,kodeMapel,Tingkatan,Jurusan,idPaketSoal FROM paketsoal WHERE idPaketSoal='$uri3'")->row();
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='" . base_url() . 'guru/import/' . $idpaket->idPaketSoal . "'>";
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";

    echo "<table border='1' cellpadding='9'>
    <tr>
      <th colspan='14'>Preview Data</th>
    </tr>
    <tr>
      <th>Kode Mapel</th>
      <th>Kode Soal</th>
      <th>kode Guru</th>
      <th>Tingkatan</th>
      <th>Jurusan</th>
      <th>Nomor Soal</th>
      <th>Soal</th>
      <th>Pilihan A</th>
      <th>Pilihan B</th>
      <th>Pilihan C</th>
      <th>Pilihan D</th>
      <th>Pilihan E</th>
      <th>Kunci Jawab</th>
      <th>Jenis Soal</th>
    </tr>";

    $numrow = 2;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach ($sheet as $row) {
      // Ambil data pada excel sesuai Kolom
      $Nomor_soal = $row['A']; // Ambil data Nomor soal
      $soal = $row['B']; // Ambil data soal
      $opsi_a = $row['C']; // Ambil data Pilih a
      $opsi_b = $row['D']; // Ambil data Pilih b
      $opsi_c = $row['E']; // Ambil data Pilih c
      $opsi_d = $row['F']; // Ambil data Pilih d
      $opsi_e = $row['G']; // Ambil data Pilih e
      $kunci_jawab = $row['H']; // Ambil data Kunci Jawab
      $jenis_soal = $row['I']; // Ambil data Jenis Soal


      // Cek jika semua data tidak diisi
      if (empty($Nomor_soal) && empty($soal) && empty($opsi_a) && empty($opsi_b) && empty($opsi_c) && empty($opsi_d) && empty($opsi_e) && empty($kunci_jawab) && empty($jenis_soal))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 3) {
        // Validasi apakah semua data telah diisi
        $kodeMapel_td = (empty($idpaket->kodeMapel)){
          " style='background: #E07171;'"}; // Jika NIS kosong, beri warna merah
        $Tingkatan_td = (empty($idpaket->Tingkatan)){
          " style='background: #E07171;'"}; // Jika Nama kosong, beri warna merah
        $Jurusan_td = (empty($idpaket->Jurusan)){
          " style='background: #E07171;'"}; // Jika Jenis Kelamin kosong, beri warna merah
        $jenis_soal_td = (empty($jenis_soal)){
          " style='background: #E07171;'"}; // Jika Alamat kosong, beri warna merah
        $codeSoal_td = (empty($idpaket->codeSoal)){
          " style='background: #E07171;'"}; // Jika Alamat kosong, beri warna merah
        $kodeGuru = $this->session->userdata('kode');
        // Jika salah satu data ada yang kosong
        if (empty($Nomor_soal)) {
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td" . $codeSoal_td . "><input name='codeSoal[]' type='text' style='outline: none;border: none;width: 70px;font-weight: bold; font-size: 10pt;' readonly value='". $idpaket->codeSoal ."' /> </td>";
        echo "<td" . $kodeMapel_td . ">" . $idpaket->kodeMapel . "</td>";
        echo "<td>" . $kodeGuru . "</td>";
        echo "<td" . $Tingkatan_td . ">" . $idpaket->Tingkatan . "</td>";
        echo "<td" . $Jurusan_td . ">" . $idpaket->Jurusan . "</td>";
        echo "<td><input name='Nomor_soal[]' type='text' style='outline: none;border: none;width: 70px;font-weight: bold; font-size: 10pt;' readonly value='". $Nomor_soal ."' /> </td>";
        echo "<td><input name='soal[]' type='text' style='outline: none;border: none;font-size: 10pt;' readonly value='". $soal ."' /> </td>";
        echo "<td><input name='opsi_a[]' type='text' style='outline: none;border: none;font-size: 10pt;' readonly value='". $opsi_a ."' /> </td>";
        echo "<td><input name='opsi_b[]' type='text' style='outline: none;border: none;font-size: 10pt;' readonly value='". $opsi_b ."' /> </td>";
        echo "<td><input name='opsi_c[]' type='text' style='outline: none;border: none;font-size: 10pt;' readonly value='". $opsi_c ."' /> </td>";
        echo "<td><input name='opsi_d[]' type='text' style='outline: none;border: none;font-size: 10pt;' readonly value='". $opsi_d ."' /> </td>";
        echo "<td><input name='opsi_e[]' type='text' style='outline: none;border: none;font-size: 10pt;' readonly value='". $opsi_e ."' /> </td>";
        echo "<td><input name='kunci_jawab[]' type='text' style='outline: none;border: none;font-size: 10pt;width:70px' readonly value='". $kunci_jawab ."' /> </td>";
        echo "<td" . $jenis_soal_td . "><input name='jenis_soal[]' type='text' style='outline: none;border: none;width: 70px;font-weight: bold; font-size: 10pt;' readonly value='". $jenis_soal ."' /> </td>";
        echo "</tr>";
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    echo "<button type='submit' name='import'>Import</button>";
    echo "<a href='" . base_url("guru/form/") . $uri3 . "'>Cancel</a>";
    echo "</table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if ($kosong > 0) {
      ?>
      <script>
        $(document).ready(function() {
          // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
          $("#jumlah_kosong").html('<?php echo $kosong; ?>');

          $("#kosong").show(); // Munculkan alert validasi kosong
        });
      </script>
  <?php
    } else { // Jika semua data sudah diisi
      echo "<hr>";

      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='" . base_url("guru/form/") . $idpaket->idPaketSoal . "'>Cancel</a>";
    }

    echo "</form>";
  }
  ?>
</body>

</html>