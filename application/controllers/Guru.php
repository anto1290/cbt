<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
  private $filename = "import_data";
  function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
    // cek session
    if ($this->session->userdata('status') != "guru_login") {
      redirect(base_url() . 'login?alert=belum_login');
    }
    /*         $this->load->library('PHPExcel'); */
  }

  public function index()
  {
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_index');
    $this->load->view('guru/v_footer');
  }
  function guidv4()
  {
    if (function_exists('com_create_guid') === true)
      return trim(com_create_guid(), '{}');
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
  
  function logout()
  {
    $this->session->sess_destroy();

    redirect(base_url() . 'login?alert=logout');
  }
  function ganti_password()
  {
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_ganti_password');
    $this->load->view('guru/v_footer');
  }
  function ganti_password_aksi()
  {
    $baru = $this->input->post('password_baru');
    $ulang = $this->input->post('password_ulang');

    $this->form_validation->set_rules('password_baru', 'Password baru', 'required|matches[password_ulang]');
    $this->form_validation->set_rules('password_ulang', 'Password ulang', 'required');
    if ($this->form_validation->run() != false) {
      $id = $this->session->userdata('id');

      $where = array('id' => $id);
      $data = array('password' => password_hash($baru, PASSWORD_DEFAULT));
      $this->m_data->update_data($where, $data, 'guru');
      redirect(base_url() . 'guru/ganti_password/?alert=sukses');
    } else {
      $this->load->view('guru/v_header');
      $this->load->view('guru/v_ganti_password');
      $this->load->view('guru/v_footer');
    }
  }
  function bankSoal()
  {
    $kodeGuru = $this->session->userdata('kode');
    $data['Jurusan'] = $this->db->query("SELECT * FROM jurusan")->result();
    $data['paket'] = $this->db->query("SELECT * FROM paketsoal WHERE kodeGuru = '$kodeGuru'")->result();
    $data['mapel'] = $this->db->query("SELECT kodeMapel,Nama_mapel FROM mapel")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_bankSoal', $data);
  }
  function cekCodeSoal()
  {
    $codeSoal = $this->input->post('codeSoal');
    $cek = $this->db->query("SELECT codeSoal FROM paketsoal WHERE codeSoal LIKE '%$codeSoal%' ")->row();
    //$data = $this->db->query("SELECT codeSoal FROM paketsoal WHERE codeSoal = '$codeSoal' ")->row();
    if ($cek != NULL) {
      $data = $cek->codeSoal;
    } else {
      $data = "NULL";
    }
    echo json_encode($data);
  }
  function editBankSoal()
  {
    $kodeGuru = $this->session->userdata('kode');
    $id = $this->input->post("id");
    $data = $this->db->query("SELECT * FROM paketsoal WHERE kodeGuru = '$kodeGuru' AND idPaketSoal='$id'")->row();
    echo json_encode($data);
  }
  function bankAksi()
  {
    $kodeSoal = $this->input->post('codeSoal');
    $kodeMapel = $this->input->post('codeMapel');
    $Tingkatan = $this->input->post('Tingkatan');
    $JumPG = $this->input->post('JumPG');
    $kodeGuru = $this->input->post('kodeGuru');
    $JumEsai = $this->input->post('JumEsai');
    $bobotPG = $this->input->post('bobotPG');
    $bobotEsai = $this->input->post('bobotEsai');
    $persenPG = $this->input->post('persenPG');
    $persenEsai = $this->input->post('persenEsai');
    $jurusan = $this->input->post('jurusan');
    $date = date("Y-m-d");
    $status = "Y";
    $tahunAjaran = $this->input->post('tahunAjaran');
    $cek = $this->db->query("SELECT codeSoal FROM paketsoal WHERE codeSoal='$kodeSoal'")->row();
    if ("$cek->codeSoal" === "$kodeSoal") {
    } else {
      $data = array(
        'idPaketSoal' => $this->guidv4(),
        'codeSoal' => $kodeSoal,
        'kodeMapel' => $kodeMapel,
        'Tingkatan' => $Tingkatan,
        'Jurusan' => $jurusan,
        'JPilihan' => $JumPG,
        'JEsai' => $JumEsai,
        'bobotpg' => $bobotPG,
        'bobotesai' => $bobotEsai,
        'persenPG' => $persenPG,
        'persenEsai' => $persenEsai,
        'tglBuat' => $date,
        'status' => $status,
        'tahunAjaran' => $tahunAjaran,
        'kodeGuru' => $kodeGuru
      );
      $this->m_data->input_data($data, 'paketsoal');
    }
    redirect(base_url() . 'guru/bankSoal');
  }
  function editBank()
  {
    $idPaketSoal = $this->input->post('idPaket');
    $kodeSoal = $this->input->post('codeSoal');
    $oldcodeSoal = $this->input->post('oldcodeSoal');
    $kodeGuru = $this->session->userdata('kode');
    $soalUp = $this->db->query("SELECT * FROM soal WHERE codeSoal='$oldcodeSoal' AND kodeGuru='$kodeGuru'")->result();
    $kodeMapel = $this->input->post('codeMapel');
    $Tingkatan = $this->input->post('Tingkatan');
    $JumPG = $this->input->post('JumPG');
    $JumEsai = $this->input->post('JumEsai');
    $bobotPG = $this->input->post('bobotPG');
    $bobotEsai = $this->input->post('bobotEsai');
    $persenPG = $this->input->post('persenPG');
    $persenEsai = $this->input->post('persenEsai');
    $jurusan = $this->input->post('jurusan');
    $date = $this->input->post('date');
    $Agama = $this->input->post('Agama');
    $status = "Y";
    $tahunAjaran = $this->input->post('tahunAjaran');
    $where = array('idPaketSoal' => $idPaketSoal);
    $data = array(
      'codeSoal' => $kodeSoal,
      'kodeMapel' => $kodeMapel,
      'Tingkatan' => $Tingkatan,
      'Jurusan' => $jurusan,
      'JPilihan' => $JumPG,
      'JEsai' => $JumEsai,
      'bobotpg' => $bobotPG,
      'bobotesai' => $bobotEsai,
      'persenPG' => $persenPG,
      'persenEsai' => $persenEsai,
      'tglBuat' => $date,
      'status' => $status,
      'Agama' => $Agama,
      'tahunAjaran' => $tahunAjaran
    );
    if ($soalUp) {
      $dataUp = array();
      foreach ($soalUp as $SU) {
        $dataUp[] = array(
          'id_soal' => $SU->id_soal,
          'codeSoal' => $kodeSoal,
          'Tingkatan' => $Tingkatan,
          'Jurusan' => $jurusan
        );
      }
      $this->m_data->update_data($where, $data, 'paketsoal');
    }
    $this->db->update_batch('soal', $dataUp, 'id_soal');
    redirect(base_url() . 'guru/bankSoal');
  }
  function hapusBank($id)
  {
    $where = array('idPaketSoal' => $id);
    $soal = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$id'")->row();
    $delFile = $this->db->query("SELECT * FROM soal WHERE codeSoal='$soal->codeSoal' AND kodeMapel='$soal->kodeMapel'")->result();
    foreach ($delFile as $DL) {
      if ($DL->gambar_soal || $DL->audio_soal || $DL->video_soal) {
        unlink("./gambar/soal/$DL->gambar_soal");
        unlink("./audio/$DL->audio_soal");
        unlink("./video/$DL->video_soal");
      }
    }
    $this->db->query("DELETE FROM soal WHERE codeSoal='$soal->codeSoal' AND kodeMapel='$soal->kodeMapel'");
    $this->m_data->delete_data($where, 'paketsoal');
    redirect(base_url() . 'guru/bankSoal/');
  }
  function soal()
  {
    $kodeGuru = $this->session->userdata('kode');
    $uri3 = ($this->uri->segment(3));
    $data['pkt'] = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$uri3' AND kodeGuru='$kodeGuru'")->row();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_soal', $data);
    $this->load->view('guru/v_footer');
  }
  function previewPG()
  {
    $kodeGuru = $this->session->userdata('kode');
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    $p = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$uri3' AND kodeGuru='$kodeGuru'")->row();
    $data['s'] = $this->m_data->previewSoal($p->kodeGuru,$p->codeSoal,$p->kodeMapel,$uri4,1);
    $jawaban = $this->db->query("SELECT * FROM jawabpreview WHERE Nomor_soal=$uri4 AND codeSoal='$p->codeSoal' AND kodeGuru='$p->kodeGuru' AND jenis_soal='1'")->num_rows();
    $this->load->view('guru/v_header');
    if($jawaban > 0){
    $this->load->view('guru/v_previewU', $data);
    }else{
    $this->load->view('guru/v_preview', $data);
    }
    $this->load->view('guru/v_footer');
  }function previewEsai()
  {
    $kodeGuru = $this->session->userdata('kode');
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    $p = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$uri3' AND kodeGuru='$kodeGuru'")->row();
    $data['s'] = $this->m_data->previewSoal($p->kodeGuru,$p->codeSoal,$p->kodeMapel,$uri4,2);
    $jawaban = $this->db->query("SELECT * FROM jawabpreview WHERE Nomor_soal=$uri4 AND codeSoal='$p->codeSoal' AND kodeGuru='$p->kodeGuru' AND jenis_soal='2'")->num_rows();
    $this->load->view('guru/v_header');
    if($jawaban > 0){
    $this->load->view('guru/v_previewEsaiU', $data);
    }else{
    $this->load->view('guru/v_previewEsai', $data);
    }
    $this->load->view('guru/v_footer');
  }
  function previewAksiPG(){
        $kodeMapel = $this->input->post('kodeMapel');
        $codeSoal = $this->input->post('codeSoal');
        $Nomor_soal = $this->input->post('Nomor_soal');
        $id_guru = $this->input->post('id_guru');
        $jsoal = $this->input->post('jsoal');
        $ragu = $this->input->post('ragu') + 0;
        $halaman = $this->input->post('halaman') + 1;
        $jawaban = $this->input->post('jawaban');
        $dbJawab = $this->db->query("SELECT * FROM jawabpreview WHERE Nomor_soal=$Nomor_soal AND codeSoal='$codeSoal' AND kodeGuru='$id_guru'")->row();
        if(!$dbJawab){
        $data = array(
            'idpreview' => $this->guidv4(),
            'kodeGuru' => $id_guru,
            'Nomor_soal' => $Nomor_soal,
            'codeSoal' => $codeSoal,
            'kodeMapel' => $kodeMapel,
            'Ragu' => $ragu,
            'jenis_soal' => $jsoal,
            'jawaban' => $jawaban
        );
        $this->m_data->input_data($data, 'jawabpreview');
        }else{
            $where = array('codeSoal' => $codeSoal,'kodeGuru'=>$id_guru,'Nomor_soal'=>$Nomor_soal);
            $data = array('jawaban'=>$jawaban,'Ragu'=>$ragu);
            $this->m_data->update_data($where, $data, 'jawabpreview');
        }
        echo json_encode($data);
  }
  function previewAksiPGU(){
     $kodeMapel = $this->input->post('kodeMapel');
        $codeSoal = $this->input->post('codeSoal');
        $kodeGuru = $this->input->post('kodeGuru');
        $ragu = $this->input->post('ragu');
        $idjawab = $this->input->post('idjawab');
        $jawaban = $this->input->post('jawaban');
        $where = array('idpreview' => $idjawab);
        $data = array(
            'Ragu' => $ragu,
            'jawaban' => $jawaban
        );
        $this->m_data->update_data($where, $data, 'jawabpreview');
        echo json_encode($data);
  }
  function nilai(){
        $cS = $this->input->post('idPaketSoal');
        $baypass = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$cS'")->row();
        $botpg = $baypass->bobotpg;
        $kodeGuru = $baypass->kodeGuru;
        $botesai = $baypass->bobotesai;
        $per_pg = $baypass->persenPg;
        $per_esai = $baypass->persenEsai;
        $kodeMapel = $baypass->kodeMapel;
        $codeSoal = $baypass->codeSoal;
        $jumlah_soal = $this->db->query("SELECT * FROM soal WHERE kodeGuru='$kodeGuru' AND codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND jenis_soal=1")->num_rows();
        $hasil = $this->db->query("SELECT COUNT(J.jawaban) AS jml FROM jawabpreview AS J,soal AS S WHERE J.codeSoal='$codeSoal' AND J.jawaban = S.kunci_jawab AND J.kodeGuru = S.kodeGuru AND J.codeSoal=S.codeSoal AND S.kodeMapel=J.kodeMapel AND J.Nomor_soal=S.Nomor_soal AND J.jenis_soal=1 AND J.kodeGuru='$kodeGuru'")->row();
        $salah = $jumlah_soal - $hasil->jml;
        $nilai = $hasil->jml * $botpg;
        $this->db->query("DELETE FROM jawabpreview WHERE kodeGuru='$kodeGuru' AND codeSoal='$codeSoal' AND kodeMapel='$kodeMapel'");
        json_decode($nilai);
  }
  public function form()
  {
    $data = array(); // Buat variabel $data sebagai array

    if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->m_data->upload_excel($this->filename);

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

    $this->load->view('guru/form', $data);
  }

  function import()
  {
    $uri3 = ($this->uri->segment(3));
    // Load plugin PHPExcel nya
    // include APPPATH . 'third_party/PHPExcel.php';
    // include APPPATH . 'third_party/PHPExcel/IOFactory.php';
    $Nomor_soal_arr = $this->input->post('Nomor_soal');
    $soal_arr = $this->input->post('soal');
    $opsi_a_arr = $this->input->post('opsi_a');
    $opsi_b_arr = $this->input->post('opsi_b');
    $opsi_c_arr = $this->input->post('opsi_c');
    $opsi_d_arr = $this->input->post('opsi_d');
    $opsi_e_arr = $this->input->post('opsi_e');
    $kunci_jawab_arr = $this->input->post('kunci_jawab');
    $jenis_soal_arr = $this->input->post('jenis_soal');
    // $excelreader = new PHPExcel_Reader_Excel2007();
    // $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
    // $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
    // ambil data dari sebuah paket soal
    $idpaket = $this->db->query("SELECT codeSoal,kodeMapel,Tingkatan,Jurusan,idPaketSoal FROM paketsoal WHERE idPaketSoal='$uri3'")->row();
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    $numrow = 0;
    foreach ($Nomor_soal_arr as $NS) {
      array_push($data, array(
          'id_soal' => $this->guidv4(),
          'codeSoal' => $idpaket->codeSoal, // Insert data nama dari kolom A di excel
          'kodeMapel' => $idpaket->kodeMapel, // Insert data nis dari kolom B di excel
          'kodeGuru' => $this->session->userdata('kode'), // Insert data jenis kelamin dari kolom C di excel
          'Tingkatan' => $idpaket->Tingkatan, // Insert data alamat dari kolom F di excel
          'Jurusan' => $idpaket->Jurusan, // Insert data alamat dari kolom F di excel
          'Nomor_soal' => $NS,
          'soal' => $soal_arr[$numrow], // Insert data alamat dari kolom G di excel
          'opsi_a' => $opsi_a_arr[$numrow], // Insert data alamat dari kolom H di excel
          'opsi_b' => $opsi_b_arr[$numrow], // Insert data alamat dari kolom I di excel
          'opsi_c' => $opsi_c_arr[$numrow], // Insert data alamat dari kolom J di excel
          'opsi_d' => $opsi_d_arr[$numrow], // Insert data alamat dari kolom K di excel
          'opsi_e' => $opsi_e_arr[$numrow], // Insert data alamat dari kolom L di excel
          'kunci_jawab' => $kunci_jawab_arr[$numrow], // Insert data alamat dari kolom M di excel
          'jenis_soal' => $jenis_soal_arr[$numrow], // Insert data alamat dari kolom N di excel
      ));
       $numrow++; // Tambah 1 setiap kali looping
    }

    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    
    $this->db->insert_batch('soal',$data);
    redirect("guru/soal/".$idpaket->idPaketSoal); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
  function soal_tambah_pg()
  {
    $kode = $this->session->userdata('kode');
    $uri3 = ($this->uri->segment(3));
    $data['pkt'] = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$uri3' AND kodeGuru='$kode'")->row();
    $mapel =  $this->session->userdata('id_mapel');
    $data['kelas'] = $this->m_data->get_data('kelas')->result();
    $data['guru'] = $this->db->query("SELECT * FROM mapel")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_soal_tambah_pg', $data);
    $this->load->view('guru/v_footer');
  }

  function soal_tambah_esai()
  {
    $kode = $this->session->userdata('kode');
    $uri3 = ($this->uri->segment(3));
    $data['pkt'] = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$uri3' AND kodeGuru='$kode'")->row();
    $codeSoal = $data['pkt']->codeSoal;
    $kodeMapel = $data['pkt']->kodeMapel;
    $data['sisah'] = $this->db->query("SELECT sum(bobotesaiSoal) AS JMLE FROM soal WHERE codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND kodeGuru='$kode' AND jenis_soal=2")->row();
    $data['kelas'] = $this->m_data->get_data('kelas')->result();
    $data['guru'] = $this->db->query("SELECT * FROM mapel")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_soal_tambah_esai', $data);
    $this->load->view('guru/v_footer');
  }
  function tinymce_upload()
  {
    $config['upload_path'] = './gambar/soal';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_filename']         = 128;
    $config['encrypt_name']         = true;
    $config['remove_spaces']        = true;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('file')) {
      $this->output->set_header('HTTP/1.0 500 Server Error');
      exit;
    }
     $file = $this->upload->data();
            $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode(['location' => base_url().'gambar/soal/'.$file['file_name']]))
            ->_display();
            exit;
      // $data = ['uploaded'=>1,'fileName'=>$fileName,'url' => base_url() . 'gambar/soal/'.$fileName];
      // return json_encode($data);
    
  }

  function soal_aksi()
  {
    // $config = array();
    $config['upload_path'] = './gambar/soal/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_filename']         = 128;
    $config['encrypt_name']         = true;
    $config['remove_spaces']        = true;
    $this->load->library('upload', $config, 'imageupload'); // Create custom object for cover upload
    $this->imageupload->initialize($config);
    $gambar = $this->imageupload->do_upload('image');

    // Catalog upload
    // $config = array();
    $config['upload_path'] = './audio/';
    $config['allowed_types'] = 'mp3';
    $config['max_size'] = '0';
    $config['max_filename']         = 128;
    $config['encrypt_name']         = true;
    $config['remove_spaces']        = true;
    $this->load->library('upload', $config, 'audioupload');  // Create custom object for catalog upload
    $this->audioupload->initialize($config);
    $audio = $this->audioupload->do_upload('audio');
    //  Video
    $config['upload_path'] = './video/';
    $config['allowed_types'] = 'mp4|mkv|avi|flv|wmv|mp3';
    $config['max_size'] = '10240';
    $config['max_filename']         = 128;
    $config['encrypt_name']         = true;
    $config['remove_spaces']        = true;
    $this->load->library('upload', $config, 'videoupload');  // Create custom object for catalog upload
    $this->videoupload->initialize($config);
    $video = $this->videoupload->do_upload('video');

    // Check uploads success
    if ($gambar || $audio || $video) {

      // Both Upload Success

      // Data of your cover file
      $gambar = $this->imageupload->data();
      // Data of your cover file
      $video = $this->videoupload->data();
      //   print_r($cover_data);

      // Data of your catalog file
      $audio = $this->audioupload->data();
      //   print_r($catlog_data);
    } else {

      // Error Occured in one of the uploads

      echo 'Cover upload Error : ' . $this->imageupload->display_errors() . '<br/>';
      echo 'Catlog upload Error : ' . $this->audioupload->display_errors() . '<br/>';
      echo 'Catlog upload Error : ' . $this->videoupload->display_errors() . '<br/>';
    }

    $idPaketSoal = $this->input->post('idPaketSoal');
    $Tingkat = $this->input->post('Tingkat');
    $bobot = $this->input->post('bobot') + 0;
    $codeSoal = $this->input->post('codeSoal');
    $codeMapel = $this->input->post('codeMapel');
    $kodeGuru = $this->input->post('kodeGuru');
    $Nomor = $this->input->post('Nomor_soal');
    $jurusan = $this->input->post('jurusan');
    $gambar = $this->imageupload->data('file_name');
    $audio = $this->audioupload->data('file_name');
    $video = $this->videoupload->data('file_name');
    $jsoal = $this->input->post('jsoal');
    $soal = ($this->input->post('soal'));
    $opsi_a = $this->input->post('opsi_a');
    $opsi_b = $this->input->post('opsi_b');
    $opsi_c = $this->input->post('opsi_c');
    $opsi_d = $this->input->post('opsi_d');
    $opsi_e = $this->input->post('opsi_e');
    $kunci = $this->input->post('kunci');
    $data = array(
      'id_soal' => $this->guidv4(),
      'codeSoal' => $codeSoal,
      'KodeMapel' => $codeMapel,
      'kodeGuru' => $kodeGuru,
      'Tingkatan' => $Tingkat,
      'Jurusan' => $jurusan,
      'Nomor_soal' => $Nomor,
      'gambar_soal' => $gambar,
      'audio_soal' => $audio,
      'video_soal' => $video,
      'soal' => $soal,
      'opsi_a' => $opsi_a,
      'opsi_b' => $opsi_b,
      'opsi_c' => $opsi_c,
      'opsi_d' => $opsi_d,
      'opsi_e' => $opsi_e,
      'kunci_jawab' => $kunci,
      'bobotesaiSoal' => $bobot,
      'jenis_soal' => $jsoal

    );
    $this->m_data->input_data($data, 'soal');
    redirect(base_url() . 'guru/soal/' . $idPaketSoal);
  }
  function soal_edit()
  {
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    $kode = $this->session->userdata('kode');
    if ($uri4 < 2) {
      $data['pkt'] = $this->db->query("SELECT * FROM paketsoal LEFT JOIN soal ON paketsoal.codeSoal = soal.codeSoal WHERE id_soal ='$uri3'")->result();
      $data['kelas'] = $this->m_data->get_data('kelas')->result();
      $data['guru'] = $this->db->query("SELECT * FROM mapel")->result();
      $this->load->view('guru/v_header');
      $this->load->view('guru/v_soal_edit_pg', $data);
      $this->load->view('guru/v_footer');
    } else {
      $data['pkt'] = $this->db->query("SELECT * FROM paketsoal LEFT JOIN soal ON paketsoal.codeSoal = soal.codeSoal WHERE id_soal ='$uri3'")->row();
      $data['kelas'] = $this->m_data->get_data('kelas')->result();
      $codeSoal = $data['pkt']->codeSoal;
      $kodeMapel = $data['pkt']->kodeMapel;
      $data['sisah'] = $this->db->query("SELECT sum(bobotesaiSoal) AS JMLE FROM soal WHERE codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND kodeGuru='$kode' AND jenis_soal=2")->row();
      $data['guru'] = $this->db->query("SELECT * FROM mapel")->result();
      $this->load->view('guru/v_header');
      $this->load->view('guru/v_soal_edit_esai', $data);
      $this->load->view('guru/v_footer');
    }
  }
  function soal_update()
  {
    if (!empty($_FILES["image"]["name"]) || !empty($_FILES["audio"]["name"]) || !empty($_FILES["video"]["name"])) {

      $config['upload_path'] = './gambar/soal/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_filename']         = 128;
      $config['encrypt_name']         = true;
      $config['remove_spaces']        = true;
      $this->load->library('upload', $config, 'imageupload'); // Create custom object for cover upload
      $this->imageupload->initialize($config);
      $gambar = $this->imageupload->do_upload('image');
      $oldG =  $this->input->post('old_image');
      if($oldG != 0){
        unlink("./gambar/soal/$oldG");
      }

      $config['upload_path'] = './audio/';
      $config['allowed_types'] = 'mp3';
      $config['max_size'] = 0;
      $config['max_filename']  = 128;
      $config['encrypt_name']  = true;
      $config['remove_spaces'] = true;
      $this->load->library('upload', $config, 'audioupload');  // Create custom object for catalog upload
      $this->audioupload->initialize($config);
      $audio = $this->audioupload->do_upload('audio');
      $oldA = $this->input->post('old_audio'); 
      if($oldA != 0){  
       unlink("./audio/$oldA");
      }
      $config['upload_path'] = './video/';
      $config['allowed_types'] = 'mp4|mkv|avi|flv|wmv|mp3';
      $config['max_filename']         = 128;
      $config['encrypt_name']         = true;
      $config['remove_spaces']        = true;
      $this->load->library('upload', $config, 'videoupload');  // Create custom object for catalog upload
      $this->videoupload->initialize($config);
      $video = $this->videoupload->do_upload('video');
      $oldV = $this->input->post('old_video');
      if($oldV != 0){
        unlink("./video/$oldV");
      }
      // Check uploads success
      if ($gambar || $audio || $video) {
        $gambar = $this->imageupload->data('file_name');
        $audio = $this->audioupload->data('file_name');
        $video = $this->videoupload->data('file_name');
      } else {
        echo 'Gambar upload Error : ' . $this->imageupload->display_errors() . '<br/>';
        echo 'Audio upload Error : ' . $this->audioupload->display_errors() . '<br/>';
        echo 'Video upload Error : ' . $this->videoupload->display_errors() . '<br/>';
      }
    } else {
      $gambar = $this->input->post('old_image');
      if($gambar == 0){
        $gambar = '';
      }
      $audio = $this->input->post('old_audio');
      if($audio == 0){
        $audio = '';
      }
      $video = $this->input->post('old_video');
      if($video == 0){
        $video = '';
      }
    }
    $idPaketSoal = $this->input->post('idPaketSoal');
    $id = $this->input->post('id');
    $Tingkat = $this->input->post('Tingkat');
    $codeMapel = $this->input->post('codeMapel');
    $kodeGuru = $this->session->userdata('kode');
    $Nomor = $this->input->post('Nomor_soal');
    $jurusan = $this->input->post('jurusan');
    $bobot = $this->input->post('bobot') + 0;
    $jsoal = $this->input->post('jsoal');
    $soal = ($this->input->post('soal'));
    $opsi_a = $this->input->post('opsi_a');
    $opsi_b = $this->input->post('opsi_b');
    $opsi_c = $this->input->post('opsi_c');
    $opsi_d = $this->input->post('opsi_d');
    $opsi_e = $this->input->post('opsi_e');
    $kunci = $this->input->post('kunci');
    $where = array('id_soal' => $id);
    $data = array(
      'kodeMapel' => $codeMapel,
      'kodeGuru' => $kodeGuru,
      'Tingkatan' => $Tingkat,
      'Jurusan' => $jurusan,
      'Nomor_soal' => $Nomor,
      'gambar_soal' => $gambar,
      'audio_soal' => $audio,
      'video_soal' => $video,
      'soal' => $soal,
      'opsi_a' => $opsi_a,
      'opsi_b' => $opsi_b,
      'opsi_c' => $opsi_c,
      'opsi_d' => $opsi_d,
      'opsi_e' => $opsi_e,
      'kunci_jawab' => $kunci,
      'bobotesaiSoal' => $bobot,
      'jenis_soal' => $jsoal
    );
    $this->m_data->update_data($where, $data, 'soal');
    redirect(base_url() . 'guru/soal/' . $idPaketSoal);
  }

  function soal_hapus($id)
  {
    $uri4 = ($this->uri->segment(4));
    $where = array('id_soal' => $id);
    $delFile = $this->db->query("SELECT * FROM soal WHERE id_soal='$id'")->row();
    if ($delFile->gambar_soal || $delFile->audio_soal || $delFile->video_soal) {
      unlink("./gambar/soal/$delFile->gambar_soal");
      unlink("./audio/$delFile->audio_soal");
      unlink("./video/$delFile->video_soal");
    }

    $this->m_data->delete_data($where, 'soal');
    redirect(base_url() . 'guru/soal/' . $uri4);
  }

  function rekap()
  {

    $guru = $this->session->userdata('kode');
    $data['Jurusan'] = $this->db->query("SELECT * FROM jurusan")->result();
    $data['paket'] = $this->db->query("SELECT * FROM paketsoal WHERE kodeGuru = '$guru'")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_rekap', $data);
    $this->load->view('guru/v_footer');
  }
  // Rekap Nilai
  function nilaiRekap()
  {
    $uri3 = ($this->uri->segment(3));
    $kode = $this->session->userdata('kode');
    $data['nilai'] = $this->db->query("SELECT * FROM nilai AS N INNER JOIN siswa AS S ON N.nis=S.nis INNER JOIN kelas AS K ON N.kodeKelas=K.kodeKelas WHERE N.kodeGuru='$kode' AND N.codeSoal='$uri3' ORDER BY N.kodeKelas,N.nis ASC ")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_nilaiRekap', $data);
    $this->load->view('guru/v_footer');
  }
  // fungsi koreksi
  function koreksi()
  {
    $uri3 = ($this->uri->segment(3));
    $kode = $this->session->userdata('kode');
    $data['Kelas'] = $this->m_data->getKelasKoreksi($uri3);
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_koreksi', $data);
    $this->load->view('guru/v_footer');
  }
  function korek()
  {
    $uri3 = ($this->uri->segment(3));
    $uri4 = ($this->uri->segment(4));
    $kode = $this->session->userdata('kode');
    $data['siswa'] = $this->db->query("SELECT * FROM siswaujian AS SU INNER JOIN kelas AS K ON K.kodeKelas = SU.kodeKelas INNER JOIN siswa AS S ON SU.nis=S.nis INNER JOIN paketsoal AS PS ON SU.kodeGuru=PS.kodeGuru AND PS.codeSoal=SU.codeSoal WHERE SU.kodeGuru='$kode' AND SU.codeSoal='$uri3' AND SU.kodeKelas='$uri4'")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_korek', $data);
    $this->load->view('guru/v_footer');
  }
  function priksa()
  {
    $data['nis'] = $this->input->post('nis');
    $codeSoal = $this->input->post('codeSoal');
    $kodeMapel = $this->input->post('kodeMapel');
    $data['bobotesai'] = $this->input->post('bobotesai');
    $kode = $this->session->userdata('kode');
    $data['soal'] = $this->db->query("SELECT bobotesaiSoal,soal,Nomor_soal,jenis_soal,codeSoal,kodeMapel,kodeGuru FROM soal WHERE jenis_soal=2 AND codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND kodeGuru='$kode' ORDER BY Nomor_soal")->result();
    $data['paket'] = $this->db->query("SELECT * FROM paketsoal WHERE kodeMapel='$kodeMapel' AND codeSoal='$codeSoal' AND kodeGuru='$kode'")->row();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_priksa', $data);
    $this->load->view('guru/v_footer');
  }
  function esaiUajax()
  {
    $id = $this->input->post('id');
    $nilai = $this->input->post('nilai');
    $where = array('idjawab' => $id);
    $data = array(
      'nilai_esai' => $nilai
    );
    $this->m_data->update_data($where, $data, 'jawaban');
  }
  function esaiNilai()
  {
    $nis = $this->input->post('nis');
    $kodeMapel = $this->input->post('kodeMapel');
    $codeSoal = $this->input->post('codeSoal');
    $kodeGuru = $this->input->post('kodeGuru');
    $persenPG = $this->input->post('persenPG');
    $bobotesai = $this->input->post('bobotesai');
    $siswa = $this->db->query("SELECT kodeKelas FROM siswa WHERE nis=$nis")->row();
    $nilai = $this->db->query("SELECT * FROM nilai WHERE nis=$nis AND kodeMapel='$kodeMapel' AND codeSoal='$codeSoal' AND kodeGuru='$kodeGuru'")->row();
    $hasil = $this->db->query("SELECT SUM(nilai_esai) AS jml FROM jawaban WHERE kodeGuru='$kodeGuru' AND codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND nis=$nis AND jenis_soal=2")->row();
    $esai = ($hasil->jml / $bobotesai) * $nilai->persenEsai;
    $pg = ($nilai->nilai * $persenPG) / 100;
    $total = $pg + $esai;

    $where = array(
      'idnilai' => $nilai->idnilai
    );
    $data = array(
      'esai' => $hasil->jml,
      'totalnilai' => round($total)
    );
    $this->m_data->update_data($where, $data, 'nilai');
    redirect(base_url() . 'guru/korek/' . $codeSoal . '/' . $siswa->kodeKelas);
  }
  // Pengawas 
  function pengawasAjax($id){
    $pengawas = $this->db->query("SELECT * FROM pengawas WHERE pengawas1 = '$id'")->row();
    $codeSoal = explode(",", $pengawas->codeSoal);
    $data1 = $this->db->query("SELECT * FROM ruang_uji AS RU,siswaujian AS SU,kelas AS K,mapel AS M,siswa AS S WHERE SU.nis = S.nis AND SU.codesoal IN ('".implode("','", $codeSoal)."') AND SU.kodeKelas = K.kodeKelas AND SU.kodeMapel = M.kodeMapel AND RU.kodeKelas = K.kodeKelas AND RU.idRuang ='$pengawas->idRuang'")->result();
    $mydata = array();
    foreach ($data1 as $data) {
      $mydata[] = array(
          "ujian" => $data,
          "nilai" => $this->db->query("SELECT * FROM nilai WHERE nis=$data->nis AND codesoal IN ('".implode("','", $codeSoal)."') ")->num_rows()
      );
    }
    echo json_encode($mydata);
  }
  function pengawasUjian()
  {
    $id = $this->session->userdata('kode');
    $pengawas1 = $this->db->query("SELECT * FROM pengawas WHERE pengawas1 = '$id'");
    $pengawas2 = $this->db->query("SELECT * FROM pengawas WHERE pengawas2 = '$id'");

    if ($pengawas1->num_rows() > 0) {
      $pengawas = $pengawas1->row();
      $codeSoal = explode(",", $pengawas1->row()->codeSoal);
      $data['pawas'] = $pengawas1->row();
      $data['test'] = $this->db->query("SELECT * FROM ruang_uji AS RU,siswaujian AS SU,kelas AS K,mapel AS M,siswa AS S WHERE SU.nis = S.nis AND SU.codesoal IN ('".implode("','", $codeSoal)."') AND SU.kodeKelas = K.kodeKelas AND SU.kodeMapel = M.kodeMapel AND RU.kodeKelas = K.kodeKelas AND RU.idRuang ='$pengawas->idRuang' ")->result();
      $data['guru1'] = $this->db->query("SELECT * FROM guru WHERE kodeGuru = '$id'")->row();
      $data['waktu'] = $this->db->query("SELECT PS.tahunAjaran,SU.jamMulai,SU.batasMasuk FROM setujian AS SU,paketsoal AS PS WHERE SU.codeSoal = '$codeSoal[0]' AND SU.statusUjian='Y' AND SU.codeSoal=PS.codeSoal")->row();
      $data['Ruang'] = $this->db->query("SELECT * FROM ruang_uji AS RU,pengawas AS P WHERE P.idRuang=RU.idRuang AND P.pengawas1='$id'")->row();
      $kodeKelas = $this->db->query("SELECT RU.kodeKelas FROM ruang_uji AS RU,pengawas AS P WHERE P.idRuang=RU.idRuang AND P.pengawas1='$id'")->row();
      $data['jumlahSiswaTotal'] = $this->db->query("SELECT count(kodeKelas) AS kls FROM siswa WHERE kodeKelas='$kodeKelas->kodeKelas' AND status_siswa='Aktif' ")->row();
      if ($pengawas->pengawas2 != 0) {
        $data['guru2'] = $this->db->query("SELECT * FROM guru AS G,pengawas AS P WHERE G.kodeGuru = P.pengawas2 AND P.pengawas2 = $pengawas->pengawas2")->result();
      }
    } else if ($pengawas2->num_rows() > 0) {
      $pengawas2 = $pengawas2->row();
      $data['test'] = $this->db->query("SELECT * FROM ruang_uji AS RU,siswaujian AS SU,kelas AS K,mapel AS M,siswa AS S WHERE SU.nis = S.nis AND SU.kodeKelas = K.kodeKelas AND SU.codesoal='$pengawas->codeSoal' AND SU.kodeMapel = M.kodeMapel AND RU.kodeKelas = K.kodeKelas AND RU.idRuang = '$pengawas2->idRuang' ")->result();
      $data['guru2'] = $this->db->query("SELECT * FROM guru AS G,pengawas AS P WHERE G.kodeGuru = P.pengawas2 AND P.pengawas2 = $id")->result();
      $data['guru1'] = $this->db->query("SELECT * FROM guru AS G,pengawas AS P WHERE G.kodeGuru = P.pengawas1 AND P.pengawas1 = $pengawas2->pengawas1")->result();
    }
    $data['uji'] = $this->m_data->get_data('tes')->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_pengawasUjian', $data);
    $this->load->view('guru/v_footer');
  }
  function aksiKeluar($id)
  {
    $where = array('idSiswaUjian' => $id);
    $data = array('statusU' => 1);
    $i = $this->m_data->update_data($where, $data, 'siswaujian');
    echo json_encode($i);;
  }
  function restartSiswa($id)
  {
    $where = array('idSiswaUjian' => $id);
    $data = array('statusU' => 0);
    $i = $this->m_data->update_data($where, $data, 'siswaujian');
    echo json_encode($i);
  }
  function aksiBerita()
  {
    date_default_timezone_set("Asia/Jakarta");
    $ujian = $this->input->post('jenis_uji');
    $mapel = $this->input->post('mapel');
    $idpengawas = $this->input->post('idpengawas');
    $ruang = $this->input->post('ruang');
    $pengawas1 = $this->input->post('pengawas1');
    $pengawas2 = $this->input->post('pengawas2');
    $siswa = $this->input->post('siswa');
    $siswaH = $this->input->post('siswaH');
    $tsiswa = $this->input->post('tsiswa');
    $namaTH = $this->input->post('namaTH');
    $waktuM = $this->input->post('waktuM');
    $waktuA = $this->input->post('waktuA');
    $tahunP = $this->input->post('tahunP');
    $codeSoal = $this->input->post('codeSoal');
    $catatan = $this->input->post('catatan');
    $tgl = date("Y-m-d");
    if ($pengawas2 == Null) {
      $data = array(
        'idBerita' => $this->guidv4(),
        'jenisUjian' => $ujian,
        'idpengawas' => $idpengawas,
        'nama_mapel' => $mapel,
        'codeSoal' => $codeSoal,
        'pengawas1' => $pengawas1,
        'ruangUjian' => $ruang,
        'jumlahSiswa' => $siswa,
        'jumlahSiswaHadir' => $siswaH,
        'jumlahSiswaTidak' => $tsiswa,
        'ket_tidak_hadir' => $namaTH,
        'waktuMulai' => $waktuM,
        'waktuAkhir' => $waktuA,
        'tahunAjaran' => $tahunP,
        'catatan' => $catatan,
        'tglBerita' => $tgl
      );
    } else {
      $data = array(
        'idBerita' => $this->guidv4(),
        'jenisUjian' => $ujian,
        'idpengawas' => $idpengawas,
        'nama_mapel' => $mapel,
        'codeSoal' => $codeSoal,
        'pengawas1' => $pengawas1,
        'pengawas2' => $pengawas2,
        'ruangUjian' => $ruang,
        'jumlahSiswa' => $siswa,
        'jumlahSiswaHadir' => $siswaH,
        'jumlahSiswaTidak' => $tsiswa,
        'ket_tidak_hadir' => $namaTH,
        'waktuMulai' => $waktuM,
        'waktuAkhir' => $waktuA,
        'tahunAjaran' => $tahunP,
        'catatan' => $catatan,
        'tglBerita' => $tgl
      );
    }
    $this->m_data->input_data($data, 'beritaacara');
    redirect(base_url() . 'guru/pengawasUjian');
  }

  // Buku1
  function buku1()
  {
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_bukuSatu');
    $this->load->view('guru/v_footer');
  }
  function skl()
  {
    $id = $this->session->userdata('id');
    $data['grab'] = $this->db->query("SELECT * FROM guru,mapel,mengajar WHERE guru.id_guru = mengajar.id_guru AND mapel.id_mapel = mengajar.id_mapel AND guru.id_guru = $id")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_skl', $data);
    $this->load->view('guru/v_footer');
  }
  function vskl()
  {
    $id = $this->session->userdata('id');
    $mengajar = $this->input->post('idmengajar');
    $data['kodeMapel'] = $this->input->post('kodeMapel');
    $data['grab'] = $this->db->query("SELECT * FROM kompinti,mengajar,mapel WHERE kompinti.kodeMapel = mapel.kodeMapel AND kompinti.idmengajar = mengajar.idmengajar AND kompinti.idmengajar= $mengajar AND kompinti.kodeMapel='$data[kodeMapel]' AND kompinti.id_guru=$id")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_vskl', $data);
    $this->load->view('guru/v_footer');
  }
  function sklKomInti()
  {
    $data['kodeMapel'] = $this->input->post('kodeMapel');
    $data['idmengajar'] = $this->input->post('idmengajar');
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_inti', $data);
    $this->load->view('guru/v_footer');
  }
  function aksiSkl()
  {
    $kodeMapel = $this->input->post('kodeMapel');
    $id = $this->input->post('id');
    $idmengajar = $this->input->post('idmengajar');
    $ki1 = $this->input->post('ki1');
    $ki2 = $this->input->post('ki2');
    $ki3 = $this->input->post('ki3');
    $ki4 = $this->input->post('ki4');
    $analisa1 = $this->input->post('analisa1');
    $analisa2 = $this->input->post('analisa2');
    $tahun = $this->input->post('tahun');
    $date = date('Y-m-d');

    if ($kodeMapel === 'A008' || $kodeMapel === 'A006') {
      $data = array(
        'sikapSpiritual' => $ki1,
        'sikapSosial' => $ki2,
        'analisa1' => $analisa1,
        'pengetahuan' => $ki3,
        'keterampilan' => $ki4,
        'analisa2' => $analisa2,
        'id_guru' => $id,
        'idmengajar' => $idmengajar,
        'kodeMapel' => $kodeMapel,
        'tahunAjaran' => $tahun,
        'tglBuat' => $date
      );

      $this->m_data->input_data($data, 'kompinti');
    } else {
      $data = array(
        'sikapSpiritual' => ' ',
        'sikapSosial' => '',
        'analisa1' => ' ',
        'pengetahuan' => $ki3,
        'keterampilan' => $ki4,
        'analisa2' => $analisa2,
        'id_guru' => $id,
        'idmengajar' => $idmengajar,
        'kodeMapel' => $kodeMapel,
        'tahunAjaran' => $tahun,
        'tglBuat' => $date
      );
      $this->m_data->input_data($data, 'kompinti');
    }
    redirect(base_url() . 'guru/skl');
  }
  function ankd()
  {
    $data['kodeMapel'] = $this->input->post('kodeMapel');
    $data['idmengajar'] = $this->input->post('idmengajar');
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_ankd', $data);
    $this->load->view('guru/v_footer');
  }

  function kd12()
  {
  }
  function viewkd12()
  {
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_ansiskd1');
    $this->load->view('guru/v_footer');
  }
  function buatKode()
  {
    $id = $this->session->userdata('id');
    $data['kodeMapel'] = $this->input->post('kodeMapel');
    $mapel = $this->input->post('kodeMapel');
    $data['idmengajar'] = $this->input->post('idmengajar');
    $data['marger'] = $this->db->query("SELECT * FROM kodekd,mengajar,guru,mapel WHERE kodekd.id_guru = guru.id_guru AND mengajar.idmengajar = kodekd.idmengajar AND kodekd.kodeMapel = mapel.kodeMapel AND kodekd.id_guru = $id AND kodekd.idmengajar =  $data[idmengajar] AND kodekd.kodeMapel ='$mapel' ")->result();
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_Createnomor', $data);
    $this->load->view('guru/v_footer');
  }
  function aksiKode()
  {
    $id = $this->input->post('idguru');
    $kodeMapel = $this->input->post('kodeMapel');
    $idmengajar = $this->input->post('idmengajar');
    $angkaKD = $this->input->post('angkaKD');
    $tahun = $this->input->post('tahun');
    $date = date("Y-m-d");

    $data = array(
      'kodeKD' => $angkaKD,
      'id_guru' => $id,
      'idmengajar' => $idmengajar,
      'kodeMapel' => $kodeMapel,
      'tahunAjaran' => $tahun,
      'tglBuat' => $date
    );
    $this->m_data->input_data($data, 'kodekd');
    redirect(base_url() . 'guru/skl');
  }
  function kd34()
  {
  }
  // Buku 2
  function buku2()
  {
    $this->load->view('guru/v_header');
    $this->load->view('guru/v_bukuDua');
    $this->load->view('guru/v_footer');
  }
}
