<html>
<head>
  <title>Form Import</title>
  
  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>
  
  <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
</head>
<body>
  <h3>Form Import</h3>
  <hr>
  
  <a href="<?php echo base_url("excel/formatS.xlsx"); ?>">Download Format</a>
  <br>
  <br>
  
  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?php echo base_url('Excel_import/form'); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file" accept=".xlsx,.xls">
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
  </form>
  
  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url().'Excel_import/import'."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    
    echo "<table border='1' cellpadding='9'>
    <tr>
      <th colspan='14'>Preview Data</th>
    </tr>
    <tr>
      <th>ID Kelasl</th>
      <th>Foto Siswa</th>
      <th>NIS</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Nama Siswa</th>
      <th>Jenis Kelamin</th>
      <th>Hp Siswa</th>
      <th>Alamat</th>
      <th>ID Jurusan</th>
      <th>Agama</th>
      <th>Status Siswa</th>
      <th>Tingkatan</th>
    </tr>";
    
    $numrow = 4;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $idkelas = $row['A']; // Ambil data kode Soal
      $fotoSiswa = $row['B'].".JPG"; // Ambil data kode Mapel
      $nis = $row['B']; // Ambil data id Guru
      $tempatLahir = $row['C']; // Ambil data Tingkatan
      $tanggalLahir = $row['D']; // Ambil data jurusan
      $nama_siswa = $row['E']; // Ambil data Nomor soal
      $JenisKelamin = $row['F']; // Ambil data soal
      $hp_siswa = $row['G']; // Ambil data Pilih a
      $alamat_siswa = $row['H']; // Ambil data Pilih b
      $idJurusan = $row['I']; // Ambil data Pilih c
      $Agama = $row['J']; // Ambil data Pilih d
      $status_siswa = $row['K']; // Ambil data Pilih e
      $Tingkatan = $row['L']; // Ambil data Kunci Jawab
      
     
      
      // Cek jika semua data tidak diisi
      if(empty($nis) && empty($Tingkatan) && empty($idJurusan) && empty($status_siswa))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 4){
        // Validasi apakah semua data telah diisi
        $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $Tingkatan_td = ( ! empty($Tingkatan))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $idJurusan_td = ( ! empty($idJurusan))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $status_siswa_td = ( ! empty($status_siswa))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        
        // Jika salah satu data ada yang kosong
        if(empty($nis) or empty($idJurusan) ){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td>".$idkelas."</td>";
        echo "<td>".$fotoSiswa."</td>";
        echo "<td".$nis_td.">".$nis."</td>";
        echo "<td>".$tempatLahir."</td>";
        echo "<td>".$tanggalLahir."</td>";
        echo "<td>".$nama_siswa."</td>";
        echo "<td>".$JenisKelamin."</td>";
        echo "<td>".$hp_siswa."</td>";
        echo "<td>".$alamat_siswa."</td>";
        echo "<td".$idJurusan_td.">".$idJurusan."</td>";
        echo "<td>".$Agama."</td>";
        echo "<td".$status_siswa_td.">".$status_siswa."</td>";
        echo "<td".$Tingkatan_td.">".$Tingkatan."</td>";
        echo "</tr>";
      
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("admin/siswa")."'>Cancel</a>";
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("admin/siswa")."'>Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
</body>
</html>