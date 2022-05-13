<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('U_model', 'UM');
        // cek session
        if ($this->session->userdata('status') != "siswa_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }
    public function index()
    {
        $nis =  $this->session->userdata('nis');
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE nis = $nis")->row();
        $Tingkatan = $this->session->userdata('Tingkatan');
        $jurusan = $this->session->userdata('jurusan');
        if($data['siswa']->keuangan == 'ya'){
            $this->load->view('siswa/keuangan',$data);
        }else{
            $this->load->view('siswa/v_header');
            $this->load->view('siswa/v_ujian');
            // $this->load->view('siswa/v_index', $data);
            $this->load->view('siswa/v_footer');
        }
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
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login?alert=logout');
    }
    function logoutSelesai()
    {
        $this->session->sess_destroy();

        redirect(base_url() . 'login?alert=beres');
    }
    function ujian()
    {
        $Tingkatan = $this->session->userdata('Tingkatan');
        $jurusan = $this->session->userdata('jurusan');
        $this->load->view('siswa/v_header');
        $this->load->view('siswa/v_ujian');
        $this->load->view('siswa/v_footer');
    }
    function uji()
    {
        $Token = $this->input->post('Token');
        $siswa_id = $this->session->userdata('idsiswa');
        $nis = $this->session->userdata('nis');
        $Tingkatan = $this->session->userdata('Tingkatan');
        $Agama = $this->session->userdata('Agama');
        $d = $this->session->userdata('idjurusan');
        $j = $this->db->query("SELECT nama FROM jurusan WHERE idjurusan=$d")->row();
        $idkelas = $this->session->userdata('kode');
        $cek = $this->db->query("SELECT * FROM setujian WHERE Token='$Token' AND (tingkatan='$Tingkatan' OR tingkatan='ALL') AND statusUjian='Y' ")->num_rows();
        $cekT = $this->db->query("SELECT * FROM setujian WHERE Token='$Token' AND (tingkatan='$Tingkatan' OR tingkatan='ALL') AND statusUjian='Y' ")->row();
         $soalAgama = $this->db->query("SELECT * FROM paketsoal AS PS WHERE PS.codeSoal='$cekT->codeSoal' AND (PS.Agama='$Agama' OR PS.Agama='ALL')")->row();
        if ($cekT == null ||$soalAgama == null ) {
            redirect(base_url() . 'siswa/ujian?alert=tokenT');
            exit;
        }
        
        $datas = $this->db->query("SELECT * FROM setujian WHERE Token='$Token' AND (tingkatan='$Tingkatan' OR tingkatan='ALL') AND statusUjian='Y' ")->row();
        $ceku = $this->db->query("SELECT * FROM siswaujian WHERE Token='$Token' AND (tingkatan='$Tingkatan' OR tingkatan='ALL') AND nis=$nis")->num_rows();
        $max = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$cekT->codeSoal' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All') AND (PS.Jurusan='$j->nama' OR PS.Jurusan = 'ALL') AND jenis_soal =1  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK' OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
        $jwbUp = $this->db->query("SELECT * FROM jawaban WHERE nis=$nis AND codeSoal='$cekT->codeSoal' AND kodeMapel='$cekT->kodeMapel' AND kodeGuru='$cekT->kodeGuru'")->result();
        $cupT = $this->db->query("SELECT * FROM siswaujian WHERE codeSoal='$cekT->codeSoal' AND nis=$nis")->row();
        $nomor = array();
        $maxE = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$cekT->codeSoal' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All') AND (PS.Jurusan='$j->nama' OR PS.Jurusan = 'ALL') AND jenis_soal =2  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK'OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL' ) AND (PS.Agama = '$Agama' OR PS.Agama='ALL')")->num_rows();
        $nomorE = array();
        if ($datas->acak == "Y") {
            for ($i = 0; $i < $max; $i++) {
                $cem = mt_rand(1, $max);
                while (in_array($cem, $nomor)) {
                    $cem = mt_rand(1, $max);
                }
                $nomor[$i] = $cem;
            }
            for ($i = 0; $i < $maxE; $i++) {
                $cemE = mt_rand(1, $maxE);
                while (in_array($cemE, $nomorE)) {
                    $cemE = mt_rand(1, $maxE);
                }
                $nomorE[$i] = $cemE;
            }
        } else {
            for ($i = 0; $i < $max; $i++) {
                $cem = $i + 1;
                while (in_array($cem, $nomor)) {
                }
                $nomor[$i] = $cem;
            }
            for ($i = 0; $i < $maxE; $i++) {
                $cemE = $i + 1;
                while (in_array($cemE, $nomorE)) {
                }
                $nomorE[$i] = $cemE;
            }
        }
        $nomorImplode = implode(",", $nomor);
        $NomorEsay = implode(",", $nomorE);
        

        if ($ceku > 0) {
            $cekud = $this->db->query("SELECT * FROM siswaujian WHERE Token='$Token' AND statusU=1 AND nis=$nis")->num_rows();
            $sw = $this->db->query("SELECT * FROM siswaujian WHERE Token='$Token' AND nis=$nis")->row();
            if ($cekud > 0) {
                echo "<script>
                    alert('Hubungi Admin & Proktor Untuk Restart Akun');
                    document.location.href = 'ujian';
                    </script>";
            } else {
                $data = $this->db->query("SELECT * FROM setujian WHERE Token='$Token' AND statusUjian='Y' ")->row();
                $date = date("Y-m-d");
                date_default_timezone_set("Asia/Jakarta");
                $jam  = date("H:i:s");
                if ($date == $data->tglUjian && $jam >= $data->jamMulai && $jam <= $data->batasMasuk) {
                    $Tdata['Tok'] = $Token;
                    $Tdata['siswa'] = $this->session->userdata('nama_siswa');
                    $this->load->view('siswa/v_header');
                    $this->load->view('siswa/v_ujian_siap', $Tdata);
                    $this->load->view('siswa/v_footer');
                    $where = array(
                        'idSiswaUjian' => $sw->idSiswaUjian
                    );
                    $data = array(
                        'statusU' => 0,
                    );
                    $this->m_data->update_data($where, $data, 'siswaujian');
                } elseif ($date == $data->tglUjian && $jam == $data->batasMasuk) {
                    redirect(base_url() . 'siswa/ujian?alert=waktu');
                } else if ($date < $data->tglUjian && $jam < $data->batasMasuk ) {
                    redirect(base_url() . 'siswa/ujian?alert=blom');
                } else {
                    redirect(base_url() . 'siswa/ujian?alert=habis');
                }
            }
        } else {
            //cek Token
            if ($cupT != NULL) {
                $date = date("Y-m-d");
                date_default_timezone_set("Asia/Jakarta");
                $jam  = date("H:i:s");
                $Tdata['Tok'] = $Token;
                $Tdata['siswa'] = $this->session->userdata('nama_siswa');
                $this->load->view('siswa/v_header');
                $this->load->view('siswa/v_ujian_siap', $Tdata);
                $this->load->view('siswa/v_footer');
                $where = $cupT->idSiswaUjian;
                $data = array(
                    'Token' => $Token
                );
                $this->m_data->update_data($where, $data, 'siswaujian');
            }
            if ($cek > 0) {
                $data = $this->db->query("SELECT * FROM setujian WHERE Token='$Token' AND statusUjian='Y' ")->row();
                $date = date("Y-m-d");

                date_default_timezone_set("Asia/Jakarta");
                $jam  = date("H:i:s");
                if ($date == $data->tglUjian && $jam >= $data->jamMulai && $jam <= $data->batasMasuk) {
                    $Tdata['Tok'] = $Token;
                    $Tdata['siswa'] = $this->session->userdata('nama_siswa');
                    $this->load->view('siswa/v_header');
                    $this->load->view('siswa/v_ujian_siap', $Tdata);
                    $this->load->view('siswa/v_footer');
                    $data = array(
                        'idSiswaUjian' => $this->guidv4(),
                        'kodeKelas' => $idkelas,
                        'nis' => $nis,
                        'jenis_ujian' => $datas->jenis_ujian,
                        'codeSoal' => $datas->codeSoal,
                        'kodeMapel' => $datas->kodeMapel,
                        'jurusan' => $datas->jurusan,
                        'semester' => $datas->semester,
                        'tingkatan' => $datas->tingkatan,
                        'jumlahPG' => $datas->jumlahPG,
                        'jumlahEsai' => $datas->jumlahEsai,
                        'startPG' => $nomorImplode,
                        'startEssay' => $NomorEsay,
                        'Token' => $Token,
                        'statusU' => 0,
                        'lastmulai' => time(),
                        'kodeGuru' => $datas->kodeGuru
                    );
                    $this->m_data->input_data($data, 'siswaujian');
                } elseif ($date >= $data->tglUjian && $jam == $data->batasMasuk) {
                    redirect(base_url() . 'siswa/ujian?alert=waktu');
                } else if ($date < $data->tglUjian || $jam <= $data->jamMulai) {
                    redirect(base_url() . 'siswa/ujian?alert=blom');
                } else {
                    redirect(base_url() . 'siswa/ujian?alert=habis');
                }
            } else {
                redirect(base_url() . 'siswa/ujian?alert=tidak');
            }
        }
    }
    function pg()
    {
        date_default_timezone_set("Asia/Jakarta");
        $uri2 = ($this->uri->segment(2));
        $uri3 = ($this->uri->segment(3));
        $uri4 = ($this->uri->segment(4));
        $siswa = $this->session->userdata('nis');
        $waktulewat = $this->db->query("SELECT * FROM siswaujian WHERE nis='$siswa' AND codeSoal='$uri3'")->row();
        $_SESSION["waktu_start"] = $waktulewat->lastmulai;
        $_SESSION["Nomor_soal"] = $waktulewat->startPG;
        if (($_SESSION["waktu_start"]) != 0) {
            $lewat = time() - $_SESSION["waktu_start"];
        } else {
            $_SESSION["waktu_start"] = time();
            $where = array(
                'nis' => "$siswa",
                'codeSoal' => $uri3
            );
            $data = array(
                'lastmulai' => time()
            );
            $this->m_data->update_data($where, $data, 'siswaujian');
            $lewat = 0;
        }
        $Tingkatan = $this->session->userdata('Tingkatan');
        $d = $this->session->userdata('idjurusan');
        $jurusan = $this->db->query("SELECT nama FROM jurusan WHERE idjurusan=$d")->row();
        $jr = $this->db->query("SELECT nama FROM jurusan WHERE idjurusan=$d")->row();
        $j = $jurusan->nama;
        $data['Nama_kelas'] = $this->session->userdata('Nama_kelas');
        $Agama = $this->session->userdata('Agama');
        $data['mapel'] = $this->input->post('kodeMapel');
        $codeSoal = $uri3;
        $batas   = 1;
        $halaman = $uri4;
        if (empty($halaman)) {
            $posisi = 0;
            $halaman = 1;
        } else {
            $posisi = ($halaman - 1) * $batas;
        }


        $b = $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON  SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$uri3' AND S.Tingkatan='$Tingkatan'AND (PS.Jurusan='$j' OR PS.Jurusan = 'ALL') AND jenis_soal =1  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK' OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL')");


        $nomor = explode(",", $_SESSION["Nomor_soal"]);
        $posisiArray = count($nomor);
        $posisiHalaman = $posisi + 1;

        if (isset($_SESSION["Nomor_soal"])) {
            if ($posisiArray == $posisiHalaman) {
                $cekjawaban = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND Nomor_test=$posisiHalaman AND nis = $siswa AND jenis_soal='1'")->num_rows();
                if ($cekjawaban > 0) {
                    $n =  $nomor[$posisi];
                }
                $n =  $nomor[$posisi];
            }
        }
        $data['siswa'] = $siswa;
        $data['lewat'] = $lewat;
        $data['Tingkatan'] = $Tingkatan;
        $data['jr'] = $jr;
        $jawaban = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND Nomor_test=$posisiHalaman AND nis = $siswa AND jenis_soal='1'")->num_rows();
        $data['jurusan'] = $jr;
        $data['Nama_kelas'] = $this->session->userdata('Nama_kelas');
        $n = $nomor[$posisi];
        $ds = $this->db->query("SELECT statusU FROM siswaujian WHERE codeSoal='$uri3' AND nis='$siswa'")->row();
        if ($ds->statusU != 1) {
            $T = $this->session->userdata('Tingkatan');
            $data['s'] = $this->UM->get_soal($uri3, $T, $j, 1, $Agama, $n, $batas);
        } else {
            $this->session->sess_destroy();

            redirect(base_url() . 'login?alert=keluar');
        }
        $data['no'] = $posisi + 1;
        $this->load->view('siswa/v_headt', $data);
        if ($jawaban > 0) {
            $this->load->view('siswa/v_pgU', $data);
        } else {
            $this->load->view('siswa/v_pg', $data);
        }
        $this->load->view('siswa/v_footerPg');
        $this->load->view('siswa/v_footer');
    }
    // Batas PG

    function esay()
    {
        date_default_timezone_set("Asia/Jakarta");
        $uri2 = ($this->uri->segment(2));
        $uri3 = ($this->uri->segment(3));
        $uri4 = ($this->uri->segment(4));
        $siswa = $this->session->userdata('nis');
        $waktulewat = $this->db->query("SELECT * FROM siswaujian WHERE nis='$siswa' AND codeSoal='$uri3'")->row();
        $_SESSION["waktu_start"] = $waktulewat->lastmulai;
        $_SESSION["Nomor_soal"] = $waktulewat->startEssay;
        if (($_SESSION["waktu_start"]) != 0) {
            $lewat = time() - $_SESSION["waktu_start"];
        } else {
            $_SESSION["waktu_start"] = time();
            $where = array(
                'nis' => "$siswa",
                'codeSoal' => $uri3
            );
            $data = array(
                'lastmulai' => time()
            );
            $this->m_data->update_data($where, $data, 'siswaujian');
            $lewat = 0;
        }
        $Tingkatan = $this->session->userdata('Tingkatan');
        $d = $this->session->userdata('idjurusan');
        $jurusan = $this->db->query("SELECT nama FROM jurusan WHERE idjurusan=$d")->row();
        $jr = $this->db->query("SELECT nama FROM jurusan WHERE idjurusan=$d")->row();
        $j = $jurusan->nama;
        $data['Nama_kelas'] = $this->session->userdata('Nama_kelas');
        $Agama = $this->session->userdata('Agama');
        $data['mapel'] = $this->input->post('kodeMapel');
        $codeSoal = $uri3;
        $batas   = 1;
        $halaman = $uri4;
        if (empty($halaman)) {
            $posisi = 0;
            $halaman = 1;
        } else {
            $posisi = ($halaman - 1) * $batas;
        }
        $nomor = explode(",", $_SESSION["Nomor_soal"]);
        $posisiArray = count($nomor);
        $posisiHalaman = $posisi + 1;

        if (isset($_SESSION["Nomor_soal"])) {
            if ($posisiArray == $posisiHalaman) {
                $cekjawaban = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND Nomor_test=$posisiHalaman AND nis =$siswa AND jenis_soal=2")->num_rows();
                if ($cekjawaban > 0) {
                    $n =  $nomor[$posisi];
                }
                $n =  $nomor[$posisi];
            }
            // if ($posisiArray !== $max) {
            // do {
            //     $cem = mt_rand(1, $max);
            // } while (in_array($cem, $nomor));

            // $where = array(
            //     'nis' => $siswa,
            //     'codeSoal' => $uri3
            // );
            // $data = array(
            //     'startPG' => $_SESSION["Nomor_soal"] . "," . $cem
            // );
            // $this->m_data->update_data($where, $data, 'siswaujian');
            // }
        }
        $data['siswa'] = $siswa;
        $data['lewat'] = $lewat;
        $data['Tingkatan'] = $Tingkatan;
        $data['jr'] = $jr;
        $data['jurusan'] = $jr;
        $data['Nama_kelas'] = $this->session->userdata('Nama_kelas');
        $n = $nomor[$posisi];
        $jawaban = $this->db->query("SELECT * FROM jawaban WHERE codeSoal='$uri3' AND Nomor_test=$posisiHalaman AND nis = $siswa AND jenis_soal='2'")->num_rows();
        $ds = $this->db->query("SELECT statusU FROM siswaujian WHERE codeSoal='$uri3' AND nis=$siswa")->row();
        if ($ds->statusU != 1) {
            $T = $this->session->userdata('Tingkatan');
            $data['s'] = $this->UM->get_soal($uri3, $T, $j, 2, $Agama, $n, $batas);
        } else {
            $this->session->sess_destroy();

            redirect(base_url() . 'login?alert=keluar');
        }
        $data['no'] = $posisi + 1;
        $this->load->view('siswa/v_headt', $data);
        if ($jawaban > 0) {
            $this->load->view('siswa/v_esayUpdate', $data);
        } else {
            $this->load->view('siswa/v_esay', $data);
        }
        $this->load->view('siswa/v_footerEsay');
        $this->load->view('siswa/v_footer');
    }
    function cekKecurangan()
    {
        $nis = $this->session->userdata('nis');
        $codeSoal = $this->input->post('codeSoal');
        $kodeMapel = $this->input->post('kodeMapel');
        $d  = $this->db->query("SELECT idSiswaUjian FROM siswaujian WHERE codeSoal='$codeSoal'AND kodeMapel='$kodeMapel'AND nis=$nis")->row();
        $where = array(
            'idSiswaUjian' => $d->idSiswaUjian
        );
        $data = array(
            'statusU' => 1
        );
        $this->m_data->update_data($where, $data, 'siswaujian');
        echo json_encode($data);
        $this->session->sess_destroy();
    }
    function test_aksiA()
    {
        $kodeMapel = $this->input->post('kodeMapel');
        $codeSoal = $this->input->post('codeSoal');
        $Nomor_soal = $this->input->post('Nomor_soal');
        $Nomor_test = $this->input->post('halaman');
        $nis = $this->input->post('idsiswa');
        $id_guru = $this->input->post('id_guru');
        $jsoal = $this->input->post('jsoal');
        $ragu = $this->input->post('ragu') + 0;
        $halaman = $this->input->post('halaman') + 1;
        $jawaban = $this->input->post('jawaban');
        // cek dolo apakah sudah habis soalnya
        $dbJawab = $this->db->query("SELECT * FROM jawaban WHERE Nomor_soal=$Nomor_soal AND nis=$nis AND codeSoal='$codeSoal'")->row();
        if(!$dbJawab){
        $hari_ini = date("D");
        $tanggal_hari_ini = date("Y-m-d H:i:s");
        $data = array(
            'idjawab' => $this->guidv4(),
            'kodeMapel' => $kodeMapel,
            'codeSoal' => $codeSoal,
            'Nomor_soal' => $Nomor_soal,
            'Nomor_test' => $Nomor_test,
            'Ragu' => $ragu,
            'nis' => $nis,
            'kodeGuru' => $id_guru,
            'jenis_soal' => $jsoal,
            'jawaban' => $jawaban,
            'hari' => $hari_ini,
            'tanggal' => $tanggal_hari_ini
        );
        $this->m_data->input_data($data, 'jawaban');
        }else{
            $where = array('codeSoal' => $codeSoal,'nis'=>$nis,'Nomor_soal'=>$Nomor_soal);
            $data = array('jawaban'=>$jawaban,'Nomor_test'=>$Nomor_test,'Ragu'=>$ragu);
            $this->m_data->update_data($where, $data, 'jawaban');
        }
        echo json_encode($data);
    }
    function test_aksiE()
    {
        $kodeMapel = $this->input->post('kodeMapel');
        $codeSoal = $this->input->post('codeSoal');
        $Nomor_soal = $this->input->post('Nomor_soal');
        $Nomor_test = $this->input->post('halaman');
        $nis = $this->input->post('idsiswa');
        $id_guru = $this->input->post('id_guru');
        $jsoal = $this->input->post('jsoal');
        $ragu = $this->input->post('ragu') + 0;
        $halaman = $this->input->post('halaman') + 1;
        $jawaban = $this->input->post('jawaban');
        // cek dolo apakah sudah habis soalnya
        $hari_ini = date("D");
        $tanggal_hari_ini = date("Y-m-d H:i:s");
        $data = array(
            'idjawab' => $this->guidv4(),
            'kodeMapel' => $kodeMapel,
            'codeSoal' => $codeSoal,
            'Nomor_soal' => $Nomor_soal,
            'Nomor_test' => $Nomor_test,
            'Ragu' => $ragu,
            'nis' => $nis,
            'kodeGuru' => $id_guru,
            'jenis_soal' => $jsoal,
            'Jawaban_esai' => $jawaban,
            'hari' => $hari_ini,
            'tanggal' => $tanggal_hari_ini
        );
        $this->m_data->input_data($data, 'jawaban');
        echo json_encode($data);
    }
    function test_updateAPG()
    {
        $kodeMapel = $this->input->post('kodeMapel');
        $codeSoal = $this->input->post('codeSoal');
        $kodeGuru = $this->input->post('kodeGuru');
        $ragu = $this->input->post('ragu');
        $nis = $this->input->post('nis');
        $idjawab = $this->input->post('idjawab');
        $jawaban = $this->input->post('jawaban');
        $where = array('idjawab' => $idjawab);
        $data = array(
            'Ragu' => $ragu,
            'jawaban' => $jawaban
        );
        $this->m_data->update_data($where, $data, 'jawaban');
        echo json_encode($data);
    }
    function test_updateAEsay()
    {

        $ragu = $this->input->post('ragu');
        $idjawab = $this->input->post('idjawab');
        $jawaban = $this->input->post('jawaban');
        $where = array('idjawab' => $idjawab);
        $data = array(
            'Ragu' => $ragu,
            'Jawaban_esai' => $jawaban
        );
        $this->m_data->update_data($where, $data, 'jawaban');
        echo json_encode($data);
    }
    function test_updateAEsai()
    {
        $kodeMapel = $this->input->post('kodeMapel');
        $codeSoal = $this->input->post('codeSoal');
        $kodeGuru = $this->input->post('kodeGuru');
        $ragu = $this->input->post('ragu');
        $nis = $this->input->post('nis');
        $idjawab = $this->input->post('idjawab');
        $jawaban = $this->input->post('jawaban');
        $where = array('idjawab' => $idjawab);
        $data = array(
            'Ragu' => $ragu,
            'jawaban_esai' => $jawaban
        );
        $this->m_data->update_data($where, $data, 'jawaban');
        echo json_encode($data);
    }
    function nilai()
    {
        // $uri3 = $this->uri->segment(3);
        $cS = $this->input->post('codeSoal');
        $baypass = $this->db->query("SELECT * FROM paketsoal WHERE codeSoal='$cS'")->row();
        $botpg = $baypass->bobotpg;
        $kodeGuru = $baypass->kodeGuru;
        $botesai = $baypass->bobotesai;
        $per_pg = $baypass->persenPg;
        $per_esai = $baypass->persenEsai;
        $kodeMapel = $baypass->kodeMapel;
        $codeSoal = $baypass->codeSoal;
        $jen =  $this->db->query("SELECT jenis_ujian FROM setujian WHERE kodeGuru='$kodeGuru' AND kodeMapel='$kodeMapel' AND codeSoal='$codeSoal'")->row();
        $JUjian = $jen->jenis_ujian;
        $kode = $this->session->userdata('kode');
        $nis = $this->session->userdata('nis');
        $Tingkatan = $this->session->userdata('Tingkatan');
        $jurusan =  $this->session->userdata('idjurusan');
        $Agama = $this->session->userdata('Agama');
        $jumlah_soal = $this->db->query("SELECT * FROM soal WHERE kodeGuru='$kodeGuru' AND codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND jenis_soal=1")->num_rows();
        $jumlah_soal_esai = $this->db->query("SELECT * FROM soal WHERE kodeGuru='$kodeGuru' AND codeSoal='$codeSoal' AND kodeMapel='$kodeMapel' AND jenis_soal=2")->num_rows();
        $hasil = $this->db->query("SELECT COUNT(J.jawaban) AS jml FROM jawaban AS J,soal AS S WHERE J.codeSoal='$codeSoal' AND J.nis=$nis AND J.jawaban = S.kunci_jawab AND J.kodeGuru = S.kodeGuru AND J.codeSoal=S.codeSoal AND S.kodeMapel=J.kodeMapel AND J.Nomor_soal=S.Nomor_soal AND J.jenis_soal=1 AND J.kodeGuru='$kodeGuru'")->row();
        $dateNilai = date('Y-m-d');
        $cekTableNilai = $this->db->query("SELECT * FROM nilai WHERE nis='$nis' AND codeSoal='$cS' AND dateNilai='$dateNilai'")->num_rows();
        $nilaiUdahada = $this->db->query("SELECT * FROM nilai WHERE nis='$nis' AND codeSoal='$cS' AND dateNilai='$dateNilai'")->row();
        if ($cekTableNilai > 0) {
            $where = array(
                'idnilai' => $nilaiUdahada->idnilai,
                'nis' => $nis
            );
            if ($jumlah_soal_esai == 0) {
                $salah = $jumlah_soal - $hasil->jml;
                $nilai = $hasil->jml * $botpg;
                $data = array(
                    'kodeKelas' => $kode,
                    'jumlah_soal' => $jumlah_soal,
                    'benar' => $hasil->jml,
                    'salah' => $salah,
                    'nilai' => $nilai,
                    'persenPg' => $per_pg,
                    'persenEsai' => $per_esai,
                    'totalnilai' => $nilai,
                    'jenis_ujian' => $JUjian
                );
            } else {
                $salah = $jumlah_soal - $hasil->jml;
                $nilai = $hasil->jml * $botpg;
                $data = array(
                    'kodeKelas' => $kode,
                    'jumlah_soal' => $jumlah_soal,
                    'benar' => $hasil->jml,
                    'salah' => $salah,
                    'nilai' => $nilai,
                    'persenPg' => $per_pg,
                    'persenEsai' => $per_esai,
                    'jenis_ujian' => $JUjian
                );
            }
            $this->m_data->update_data($where, $data, 'nilai');
        } else {
            if ($jumlah_soal_esai == 0) {
                $salah = $jumlah_soal - $hasil->jml;
                $nilai = $hasil->jml * $botpg;
                $data = array(
                    'idnilai' => $this->guidv4(),
                    'codeSoal' => $codeSoal,
                    'kodeMapel' => $kodeMapel,
                    'nis' => $nis,
                    'kodeKelas' => $kode,
                    'jumlah_soal' => $jumlah_soal,
                    'benar' => $hasil->jml,
                    'salah' => $salah,
                    'nilai' => $nilai,
                    'persenPg' => $per_pg,
                    'persenEsai' => $per_esai,
                    'totalnilai' => $nilai,
                    'jenis_ujian' => $JUjian,
                    'idJurusan' => $jurusan,
                    'tingkatan' => $Tingkatan,
                    'kodeGuru' => $kodeGuru
                );
            } else {
                $salah = $jumlah_soal - $hasil->jml;
                $nilai = $hasil->jml * $botpg;
                $data = array(
                    'idnilai' => $this->guidv4(),
                    'codeSoal' => $codeSoal,
                    'kodeMapel' => $kodeMapel,
                    'nis' => $nis,
                    'kodeKelas' => $kode,
                    'jumlah_soal' => $jumlah_soal,
                    'benar' => $hasil->jml,
                    'salah' => $salah,
                    'nilai' => $nilai,
                    'persenPg' => $per_pg,
                    'persenEsai' => $per_esai,
                    'jenis_ujian' => $JUjian,
                    'idJurusan' => $jurusan,
                    'tingkatan' => $Tingkatan,
                    'kodeGuru' => $kodeGuru
                );
            }
            $this->m_data->input_data($data, 'nilai');
        }

        json_decode($data);
        // redirect($this->session->sess_destroy());
    }
    // Update Profil Siswa
    function updateProfil(){
        $nis =  $this->session->userdata('nis');
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE nis = $nis")->row();
        $this->load->view('siswa/v_header');
        $this->load->view('siswa/v_updateProfil',$data);
        $this->load->view('siswa/v_footer');
    }
    function updateData(){
        $nis =  $this->session->userdata('nis');
        $nama = $this->input->post('fname');
        $tempatLahir = $this->input->post('tempatLahir');
        $tanggalLahir = $this->input->post('tanggalLahir');
        $nomorHp = $this->input->post('nomorHp');
        $where = array('nis' => $nis);
        $data = array(
            'nama_siswa' => $nama,
            'tempatLahir' => $tempatLahir,
            'tanggalLahir' => $tanggalLahir,
            'hp_siswa' => $nomorHp
        );
        $this->m_data->update_data($where, $data, 'siswa');
        redirect(base_url('siswa/index'));
    }
}
