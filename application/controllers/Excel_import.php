<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
  private $filename = "import_dataS";
  public function __construct()
  {

    parent::__construct();

    $this->load->model('Excel_model', 'EM');
  }
  public function guidv4()
  {
    if (function_exists('com_create_guid') === true)
      return trim(com_create_guid(), '{}');
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
  public function form()
  {
    $data = array(); // Buat variabel $data sebagai array

    if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->EM->upload_file($this->filename);

      if ($upload['result'] == "success") { // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel.php';
        include APPPATH . 'third_party/PHPExcel/IOFactory.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
      } else { // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }

    $this->load->view('admin/v_siswaUpload', $data);
  }
  public function import()
  {
    // Load plugin PHPExcel nya
    include APPPATH . 'third_party/PHPExcel.php';
    include APPPATH . 'third_party/PHPExcel/IOFactory.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    $numrow = 1;
    foreach ($sheet as $row) {
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if ($numrow > 3) {
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'idsiswa' => $this->guidv4(),
          'kodeKelas' => $row['A'], // Insert data nis dari kolom A di excel
          'fotoSiswa' => $row['B'] . ".JPG", // Insert data nama dari kolom B di excel
          'nis' => $row['B'], // Insert data jenis kelamin dari kolom C di excel
          'tempatLahir' => $row['C'], // Insert data alamat dari kolom D di excel
          'tanggalLahir' => $row['D'], // Insert data alamat dari kolom D di excel
          'nama_siswa' => $row['E'], // Insert data alamat dari kolom D di excel
          'JenisKelamin' => $row['F'], // Insert data alamat dari kolom D di excel
          'password' => password_hash($row['B'], PASSWORD_DEFAULT), // Insert data alamat dari kolom D di excel
          'hp_siswa' => $row['G'], // Insert data alamat dari kolom D di excel
          'alamat_siswa' => $row['H'], // Insert data alamat dari kolom D di excel
          'idJurusan' => $row['I'], // Insert data alamat dari kolom D di excel
          'Agama' => $row['J'], // Insert data alamat dari kolom D di excel
          'status_siswa' => $row['K'], // Insert data alamat dari kolom D di excel
          'Tingkatan' => $row['L'], // Insert data alamat dari kolom D di excel
        ));
      }
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->EM->insert_multiple($data);

    redirect(base_url('admin/siswa')); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
}
