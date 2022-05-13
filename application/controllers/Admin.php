<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != 'admin_login') {
            redirect(base_url() . 'login?alert=belum_login');
        }
        $this->load->library('pagination');
        
    }
    function level(){
        return $this->session->userdata('level');
    }
    function index()
    {
        
        if($this->level() === 'Super' || $this->level() === 'Admin'){
        $this->load->view('admin/header');
        $this->load->view('admin/v_index');
        $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Keuangan'){
        $this->load->view('admKeuangan/header');
        $this->load->view('admKeuangan/v_index');
        $this->load->view('admKeuangan/v_footer');
        }else if($this->level()  === 'Ketua Ujian'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_index');
            $this->load->view('ketua/v_footer');
        }else if($this->level()  === 'Helpdesk'){
            $this->load->view('helpdesk/header');
            $this->load->view('helpdesk/v_index');
            $this->load->view('helpdesk/v_footer');
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
    function ganti_password()
    {
        
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
        $this->load->view('admin/header');
        $this->load->view('admin/v_ganti_password');
        $this->load->view('admin/v_footer');
         }else if($this->level()  === 'Keuangan'){
        $this->load->view('admKeuangan/header');
        $this->load->view('admKeuangan/v_ganti_password');
        $this->load->view('admKeuangan/v_footer');
        }else if($this->level()  === 'Ketua Ujian'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_ganti_password');
            $this->load->view('ketua/v_footer');
        }else if($this->level()  === 'Helpdesk'){
            $this->load->view('helpdesk/header');
            $this->load->view('helpdesk/v_ganti_password');
            $this->load->view('helpdesk/v_footer');
        }
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
            $this->m_data->update_data($where, $data, 'admin');
            redirect(base_url() . 'admin/ganti_password/?alert=sukses');
        } else {
            
            if($this->level()  === 'Super' || $this->level() === 'Admin'){
                $this->load->view('admin/header');
                $this->load->view('admin/v_ganti_password');
                $this->load->view('admin/v_footer');
            }else if($this->level()  === 'Keuangan'){
                $this->load->view('admKeuangan/header');
                $this->load->view('admKeuangan/v_ganti_password');
                $this->load->view('admKeuangan/v_footer');
            }else if($this->level()  === 'Ketua Ujian'){
                $this->load->view('ketua/header');
                $this->load->view('ketua/v_ganti_password');
                $this->load->view('ketua/v_footer');
            }else if($this->level()  === 'Helpdesk'){
                $this->load->view('helpdesk/header');
                $this->load->view('helpdesk/v_ganti_password');
                $this->load->view('helpdesk/v_footer');
            }
        }
    }
    // info sekolah

    function info_sekolah()
    {
        $data['info'] = $this->db->query("SELECT * FROM infosekolah")->row();
        $data['provinsi'] = $this->m_data->province();
        $this->load->view('admin/header');
        $this->load->view('admin/v_infoSekolah', $data);
        $this->load->view('admin/v_footer');
    }
    function get_kota()
    {
        $nama = $this->input->post('nama', true);
        $data = $this->m_data->Kota($nama)->result();
        echo json_encode($data);
    }
    function get_kecamatan()
    {
        $nama = $this->input->post('nama', true);
        $data = $this->m_data->Kecamatan($nama)->result();
        echo json_encode($data);
    }
    function print()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/v_print');
        $this->load->view('admin/v_footer');
    }
    function berita_acara()
    {
        $data['berita'] = $this->m_data->get_data('beritaacara')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_berita_acara', $data);
        $this->load->view('admin/v_footer');
    }
    function tambah_berita()
    {
        $data['guru'] = $this->db->query("SELECT * FROM guru")->result();
        $data['tes'] = $this->db->query("SELECT * FROM tes")->result();
        $data['mapel'] = $this->db->query("SELECT * FROM mapel")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_tambahBerita', $data);
        $this->load->view('admin/v_footer');
    }
    function aksi_berita()
    {
        date_default_timezone_set("Asia/Jakarta");
        $idBerita = $this->db->query("SELECT * FROM beritaacara ORDER BY idBerita DESC")->row();
        $ujian = $this->input->post('ujian');
        $Nama_mapel = $this->input->post('mapel');
        $pengawas1 = $this->input->post('pengawas1');
        $pengawas2 = $this->input->post('pengawas2');
        $ruang = $this->input->post('ruang');
        $jumlahSiswa = $this->input->post('jSiswa');
        $jumlahHadir = $this->input->post('jSiswaHadir');
        $jumlahTidakH = $this->input->post('jSiswaTHadir');
        $waktuStart = $this->input->post('Mulai');
        $waktuFinish = $this->input->post('selesai');
        $tglUjian = $this->input->post('tglUjian');
        
        $data = array(
            'idBerita' => $this->guidv4(),
            'jenisUjian' => $ujian,
            'nama_mapel'=> $Nama_mapel,
            'pengawas1' => $pengawas1,
            'pengawas2' => $pengawas2,
            'ruangUjian' => $ruang,
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahSiswaHadir' => $jumlahHadir,
            'jumlahSiswaTidak' => $jumlahTidakH,
            'waktuMulai' => $waktuStart,
            'waktuAkhir' => $waktuFinish,
            'tglBerita' => $tglUjian
        );
        $this->m_data->input_data($data, 'beritaacara');
        redirect(base_url() . 'admin/berita_acara');
    }
    function cetak_acara()
    {
        // $this->load->library('cetak');
        $uri3 = ($this->uri->segment(3));

        $data['berita'] = $this->db->query("SELECT * FROM beritaacara WHERE idberita = $uri3 ")->row();
        // $this->cetak->setPaper('A4', 'potrait');
        // $this->cetak->filename = "Berita Acara.pdf";
        // $this->cetak->load_view('admin/cetak_acara',$data);
    }
    // Kartu Siswa
    


    function kartuUjian()
    {
        $data['uji'] = $this->m_data->kartu();
        $this->load->view('admin/header');
        $this->load->view('admin/v_kartuUjian', $data);
        $this->load->view('admin/v_footer');
    }
    function readyCetak()
    {
        $uri = ($this->uri->segment(3));
        $data['siswa'] = $this->m_data->cetakKartu($uri)->result();
        $data['total'] = $this->m_data->cetakKartu($uri)->num_rows();
        $this->load->view('admin/v_cetakKartu', $data);
    }
    function info()
    {
        $namaSekolah = $this->input->post('namaSekolah');
        $NPSN = $this->input->post('NPSN');
        $NSS = $this->input->post('NSS');
        $Alamat = $this->input->post('Alamat');
        $kodePost = $this->input->post('kodePos');
        $Telp = $this->input->post('Telp');
        $kelurahan = $this->input->post('kelurahan');
        $Kecamatan = $this->input->post('Kecamatan');
        $Kota = $this->input->post('Kota');
        $Provinsi = $this->input->post('Provinsi');
        $Website = $this->input->post('Website');
        $Email = $this->input->post('Email');
        $where = array('NPSN' => $NPSN);
        $data = array(
            'namaSekolah' => $namaSekolah,
            'NSS' => $NSS,
            'Alamat' => $Alamat,
            'kodePos' => $kodePost,
            'Telp' => $Telp,
            'Kelurahan' => $kelurahan,
            'Kecamatan' => $Kecamatan,
            'Kota' => $Kota,
            'Provinsi' => $Provinsi,
            'Website' => $Website,
            'Email' => $Email
        );
        $this->m_data->update_data($where, $data, 'infosekolah');
        redirect(base_url() . 'admin/info_sekolah');
    }
    // CRUD MENGAJAR
    function mengajar()
    {
        $data['mengajar'] = $this->db->query("SELECT nama_lengkap,Nama_mapel,tingkatan,jumlahJam FROM guru,mapel,mengajar WHERE guru.kodeGuru = mengajar.kodeGuru AND mapel.kodeMapel = mengajar.kodeMapel")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_mengajar', $data);
        $this->load->view('admin/v_footer');
    }
    function createMengajar()
    {
        $data['guru'] = $this->db->query("SELECT * FROM guru ORDER BY nama_lengkap ASC")->result();
        $data['mapel'] = $this->db->query("SELECT * FROM mapel ORDER BY Nama_mapel ASC")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_buat_mengajar', $data);
        $this->load->view('admin/v_footer');
    }
    function mengajarAksi()
    {
        $idguru = $this->input->post('idguru');
        $mapel = $this->input->post('mapel');
        $tingkat = $this->input->post('tingkat');
        $jam = $this->input->post('jam');

        $data = array(
            'idmengajar' => $this->guidv4(),
            'kodeGuru' => $idguru,
            'kodeMapel' => $mapel,
            'tingkatan' => $tingkat,
            'jumlahJam' => $jam
        );
        $this->m_data->input_data($data, 'mengajar');
        redirect(base_url() . 'admin/mengajar');
    }
    // CRUD KELAS
    function kelas()
    {
        $data['kelas'] = $this->m_data->get_data('kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_kelas', $data);
        $this->load->view('admin/v_footer');
    }
    function kelas_tambah()
    {
        $data['jurusan'] = $this->m_data->get_data('jurusan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_tambah_kelas', $data);
        $this->load->view('admin/v_footer');
    }
    function kelas_aksi()
    {
        $Tingkatan_Kelas = $this->input->post('Tingkatan_Kelas');
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $Jurusan = $this->input->post('Jurusan');

        $data = array(
            'idkelas' => $this->guidv4(),
            'kodeKelas' => $kode,
            'Tingkatan_Kelas' => $Tingkatan_Kelas,
            'Nama_kelas' => $nama,
            'Jurusan' => $Jurusan
        );
        $this->m_data->input_data($data, 'kelas');
        redirect(base_url() . 'admin/kelas');
    }
    function kelas_edit($id)
    {
        $where = array('idkelas' => $id);

        $data['kelas'] = $this->m_data->edit_data($where, 'kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_edit_kelas', $data);
        $this->load->view('admin/v_footer');
    }
    function kelas_update()
    {
        $id = $this->input->post('id');
        $Tingkatan_Kelas = $this->input->post('Tingkatan_Kelas');
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $Jurusan = $this->input->post('Jurusan');

        $where = array('idkelas' => $id);
        $data = array(
            'kodeKelas' => $kode,
            'Tingkatan_Kelas' => $Tingkatan_Kelas,
            'Nama_kelas' => $nama,
            'Jurusan' => $Jurusan
        );

        $this->m_data->update_data($where, $data, 'kelas');
        redirect(base_url() . 'admin/kelas');
    }
    function kelas_hapus($id)
    {
        $where = array('idkelas' => $id);
        $this->m_data->delete_data($where, 'kelas');
        redirect(base_url() . 'admin/kelas');
    }
    // CRUD AKHIR KELAS
    // CRUD MAPEL
    function mapel()
    {
        $data['mapel'] = $this->db->query("SELECT * FROM mapel ORDER BY kodeMapel ASC")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_mapel', $data);
        $this->load->view('admin/v_footer');
    }
    function mapel_tambah()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/v_tambah_mapel');
        $this->load->view('admin/v_footer');
    }
    function mapel_aksi()
    {
        $nama = $this->input->post('nama');
        $mapel = $this->db->query("SELECT * FROM mapel")->num_rows();
        $kelompok = $this->input->post('kelompok');
        $jurusan = $this->input->post('jurusan');
        $nomorMapel = $mapel + 1;
        if ($kelompok == "A") {
            $kode = "$kelompok" . "0" . "$nomorMapel";
        } else if ($kelompok == "B") {
            $kode = "$kelompok" . "0" . "$nomorMapel";
        } else {
            $kode = "$kelompok" . "$nomorMapel";
        }

        $data = array(
            'id_mapel' => $this->guidv4(),
            'kodeMapel' => $kode,
            'Nama_mapel' => $nama,
            'kelompok' => $kelompok,
            'jurusan' => $jurusan,
        );

        $this->m_data->input_data($data, 'mapel');
        redirect(base_url() . 'admin/mapel');
    }
    function mapel_edit($id)
    {
        $where = array('id_mapel' => $id);
        $data['mapel'] = $this->m_data->edit_data($where, 'mapel')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_edit_mapel', $data);
        $this->load->view('admin/v_footer');
    }
    function mapel_update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kelompok = $this->input->post('kelompok');
        $jurusan = $this->input->post('jurusan');
        $checkboxes = $this->input->post('check_list');
        // $Tingkatan = implode(",",$checkboxes);

        $where = array('id_mapel' => $id);
        $data = array(
            'Nama_mapel' => $nama,
            'kelompok' => $kelompok,
            'jurusan' => $jurusan
        );

        $this->m_data->update_data($where, $data, 'mapel');
        redirect(base_url() . 'admin/mapel');
    }
    function mapel_hapus($id)
    {
        $where = array('id_mapel' => $id);
        $this->m_data->delete_data($where, 'mapel');
        redirect(base_url() . 'admin/mapel');
    }
    // Akhir CRUD mapel
    // CRUD GURU
    function guru()
    {
        $data['guru'] = $this->m_data->get_data('guru')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_guru', $data);
        $this->load->view('admin/v_footer');
    }
    function guru_tambah()
    {
        $data['jabatan'] = $this->m_data->get_data('jabatan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_tambah_guru', $data);
        $this->load->view('admin/v_footer');
    }
    function guru_aksi()
    {
        $Tugas = $this->input->post('Tugas');
        $username = $this->input->post('username');
        $kode = $this->input->post('kode');
        $password = $this->input->post('password');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $tempat = $this->input->post('tempat');
        $date = date_create($this->input->post('tanggal'));
        $guruLahir = date_format($date, "Y-m-d");
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'id_guru' => $this->guidv4(),
            'kodeGuru' => $kode,
            'jabatan_Tambahan' => $Tugas,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nip' => $nip,
            'nama_lengkap' => $nama,
            'hp' => $hp,
            'TempatLahir' => $tempat,
            'TanggalLahir' => $guruLahir,
            'alamat' => $alamat,
            'status' => "Aktif"
        );
        $this->m_data->input_data($data, 'guru');
        redirect(base_url() . 'admin/guru');
    }
    function guru_edit($id)
    {
        $where = array('id_guru' => $id);
        $data['jabatan'] = $this->m_data->get_data('jabatan')->result();
        $data['guru'] = $this->m_data->edit_data($where, 'guru')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_edit_guru', $data);
        $this->load->view('admin/v_footer');
    }
    function guru_update()
    {
        $id = $this->input->post('id');
        $Tugas = $this->input->post('Tugas');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $tempat = $this->input->post('tempat');
        $date = date_create($this->input->post('tanggal'));
        $guruLahir = date_format($date, "Y-m-d");
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $where = array('id_guru' => $id);
        // Cek apakah password di isi atau tidak
        if ($password == "") {
            $data = array(
                'jabatan_Tambahan' => $Tugas,
                'username' => $username,
                'nip' => $nip,
                'nama_lengkap' => $nama,
                'hp' => $hp,
                'TempatLahir' => $tempat,
                'TanggalLahir' => $guruLahir,
                'alamat' => $alamat,
                'status' => $status

            );
            // update ke database
            $this->m_data->update_data($where, $data, 'guru');
        } else {
            $data = array(
                'jabatan_Tambahan' => $Tugas,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nip' => $nip,
                'nama_lengkap' => $nama,
                'hp' => $hp,
                'alamat' => $alamat,
                'status' => $status

            );
            // update ke database
            $this->m_data->update_data($where, $data, 'guru');
        }
        redirect(base_url() . 'admin/guru');
    }
    function guru_hapus($id)
    {
        $where = array('id_guru' => $id);
        $this->m_data->delete_data($where, 'guru');
        redirect(base_url() . 'admin/guru');
    }
    // Akhir CRUD Guru
    // Jurusan
    function jurusan()
    {
        $data['jurusan'] = $this->m_data->get_data('jurusan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_jurusan', $data);
        $this->load->view('admin/v_footer');
    }
    function jurusanT()
    {
    }
    // CRUD SISWA

    function siswaUpload()
    {

        $this->load->view('admin/v_siswaUpload');
    }
    function siswa()
    {

        
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_siswa');
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Keuangan'){
            $this->load->view('admKeuangan/header');
            $this->load->view('admKeuangan/v_siswa');
            $this->load->view('admKeuangan/v_footer');
        }
    }
    function siswaView()
    {
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE status_siswa = 'Aktif' ORDER BY kodeKelas,nama_siswa ASC")->result();
        
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_siswaView', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Keuangan'){
            $this->load->view('admKeuangan/header');
            $this->load->view('admKeuangan/v_siswaView',$data);
            $this->load->view('admKeuangan/v_footer');
        }
    }
    function siswa_tambah()
    {
        $data['kelas'] = $this->m_data->get_data('kelas')->result();
        $data['jurusan'] = $this->m_data->get_data('jurusan')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_tambah_siswa', $data);
        $this->load->view('admin/v_footer');
    }
    function siswa_aksi()
    {
        $kelas = $this->input->post('kelas');
        $nis = $this->input->post('nis');
        $foto = $this->input->post('nis') . '.jpg';
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $JKelamin = $this->input->post('JKelamin');
        $tempatLahir = $this->input->post('tempatLahir');
        $tgl = date_create($this->input->post('tanggalLahir'));
        $lahir = date_format($tgl, "Y-m-d");
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $jurusan = $this->input->post('jurusan');
        $Tingkatan = $this->input->post('Tingkatan');
        $Agama = $this->input->post('Agama');
        $data = array(
            'idsiswa' => $this->guidv4(),
            'kodeKelas' => $kelas,
            'nis' => $nis,
            'fotoSiswa' => $foto,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama_siswa' => $nama,
            'JenisKelamin' => $JKelamin,
            'tempatLahir' => $tempatLahir,
            'tanggalLahir' => $lahir,
            'hp_siswa' => $hp,
            'alamat_siswa' => $alamat,
            'idjurusan' => $jurusan,
            'Tingkatan' => $Tingkatan,
            'Agama' => $Agama,
            'status_siswa' => "Aktif"
        );
        $this->m_data->input_data($data, 'siswa');
        redirect(base_url() . 'admin/siswa');
    }
    function edit_data()
    {
        
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $data['siswa'] = $this->m_data->get_data('siswa')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/v_editView', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Keuangan'){
            $data['siswa'] = $this->m_data->get_data('siswa')->result();
            $this->load->view('admKeuangan/header');
            $this->load->view('admKeuangan/v_editView', $data);
            $this->load->view('admKeuangan/v_footer');
        }
    }
    // aktifasi dari keuangan ngehe
    function siswaKeuangan(){
        $nis = $this->input->post('nis');
        $check = $this->input->post('checkeds');
        $where = array('nis'=>$nis);
        $data = array('keuangan'=>$check);
        $this->m_data->update_data($where, $data, 'siswa');
        redirect(base_url('admin/edit_data'));
    }
    // Aktifasi siswa
    function siswaAktifkan(){
        $nis = $this->input->post('nis');
        $check = $this->input->post('aktif');
        $where = array('nis'=>$nis);
        $data = array('status_siswa'=>$check);
        $this->m_data->update_data($where, $data, 'siswa');
    }
    function siswa_edit($id)
    {
        $where = array('idsiswa' => $id);
        $data['kelas'] = $this->m_data->get_data('kelas')->result();
        $data['jurusan'] = $this->m_data->get_data('jurusan')->result();
        $data['siswa'] = $this->m_data->edit_data($where, 'siswa')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_edit_siswa', $data);
        $this->load->view('admin/v_footer');
    }
    function siswa_resign()
    {
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE status_siswa = 'Tidak Aktif'")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_siswaResign', $data);
        $this->load->view('admin/v_footer');
    }
    function siswa_update()
    {
        $id = $this->input->post('id');
        $foto = $this->input->post('nis') . '.jpg';
        $kelas = $this->input->post('kelas');
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $JKelamin = $this->input->post('JKelamin');
        $tempatLahir = $this->input->post('tempatLahir');
        $tgl = date_create($this->input->post('tanggalLahir'));
        $lahir = date_format($tgl, "Y-m-d");
        $hp = $this->input->post('hp');
        $alamat = $this->input->post('alamat');
        $jurusan = $this->input->post('jurusan');
        $Tingkatan = $this->input->post('Tingkatan');
        $Agama = $this->input->post('Agama');
        $status = $this->input->post('status');
        $where = array('idsiswa' => $id);
        // Cek apakah password di isi atau tidak
        if ($password == "") {
            $data = array(
                'kodeKelas' => $kelas,
                'nis' => $nis,
                'fotoSiswa' => $foto,
                'nama_siswa' => $nama,
                'hp_siswa' => $hp,
                'tempatLahir' => $tempatLahir,
                'tanggalLahir' => $lahir,
                'JenisKelamin' => $JKelamin,
                'alamat_siswa' => $alamat,
                'idJurusan' => $jurusan,
                'Tingkatan' => $Tingkatan,
                'Agama' => $Agama,
                'status_siswa' => $status

            );
            // update ke database
            $this->m_data->update_data($where, $data, 'siswa');
        } else {
            $data = array(
                'kodeKelas' => $kelas,
                'nis' => $nis,
                'fotoSiswa' => $foto,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama_siswa' => $nama,
                'hp_siswa' => $hp,
                'JenisKelamin' => $JKelamin,
                'tempatLahir' => $tempatLahir,
                'tanggalLahir' => $lahir,
                'alamat_siswa' => $alamat,
                'idJurusan' => $jurusan,
                'Tingkatan' => $Tingkatan,
                'Agama' => $Agama,
                'status_siswa' => $status

            );
            // update ke database
            $this->m_data->update_data($where, $data, 'siswa');
        }
        redirect(base_url() . 'admin/siswa');
    }
    // setting Exam
    function bersihUjian()
    {
        $this->db->query("DELETE FROM setujian WHERE statusUjian = 'N'");
        redirect(base_url('admin/non'));
    }
    function settingExam()
    {
        
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_settingExam');
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk' ){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_settingExam');
            $this->load->view('ketua/v_footer');
        }
        
    }
    // set Ruangan
    function ruang()
    {
        $data['ruang'] = $this->db->query("SELECT * FROM kelas AS ks,ruang_uji AS RU WHERE RU.kodeKelas = ks.kodeKelas ORDER BY ks.Tingkatan_Kelas ASC")->result();
        $data['kelas'] = $this->db->query("SELECT * FROM kelas")->result();
       
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_ruang', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_ruang', $data);
            $this->load->view('ketua/v_footer');
        }
    }
    function ruangaski()
    {
        $kodeKelas = $this->input->post('kelas');
        $nama = $this->input->post('namaR');

        $cek = $this->db->query("SELECT * FROM ruang_uji WHERE kodeKelas = '$kodeKelas'")->num_rows();
        if ($cek > 0) {
            redirect(base_url() . 'admin/ruang?alert=gagal');
        } else {
            $data = array(
                'idRuang' => $this->guidv4(),
                'nama_ruang' => $nama,
                'kodeKelas' => $kodeKelas
            );

            $this->m_data->input_data($data, 'ruang_uji');
            redirect(base_url() . 'admin/ruang');
        }
    }
    function hapusRuang($id)
    {
        $where = array('idRuang' => $id);
        $this->m_data->delete_data($where, 'ruang_uji');
        redirect(base_url('admin/ruang'));
    }
    // Set pengawas
    function pengawas()
    {
        $data['pengawas'] = $this->db->query("SELECT * FROM guru AS g,pengawas AS p,mapel AS m,ruang_uji AS ru WHERE g.kodeGuru = p.pengawas1 AND p.kodeMapel = m.kodeMapel AND p.idRuang = ru.idRuang")->result();
        $data['gur'] = $this->m_data->get_data('guru')->result();
        $data['paket'] = $this->db->query("SELECT codeSoal FROM paketsoal WHERE status='Y' ORDER BY codeSoal ASC")->result();
        $data['mapel'] = $this->m_data->get_data('mapel')->result();
        $data['ruang'] = $this->m_data->get_data('ruang_uji')->result();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
        $this->load->view('admin/header');
        $this->load->view('admin/v_pengawas', $data);
        $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_pengawas', $data);
            $this->load->view('ketua/v_footer');
        }
    }
    function aksipengawas()
    {
        $pengawas1 = $this->input->post('pengawas1');
        $pengawas2 = $this->input->post('pengawas2');
        $mapel = $this->input->post('mapel');
        $codeSoal = implode(",", $this->input->post('codeSoal'));
        $ruang = $this->input->post('ruang');
        $data = array(
            'idpengawas' => $this->guidv4(),
            'pengawas1' => $pengawas1,
            'pengawas2' => $pengawas2,
            'kodeMapel' => $mapel,
            'codeSoal' => $codeSoal,
            'idRuang' => $ruang
        );
        $this->m_data->input_data($data, 'pengawas');
        $this->db->query("UPDATE guru SET pengawas ='Aktif' WHERE kodeGuru = '$pengawas1' ");
        if ($pengawas2 != 0) {
            $this->db->query("UPDATE guru SET pengawas ='Aktif' WHERE kodeGuru = '$pengawas2'");
        }
        redirect(base_url() . 'admin/pengawas');
    }
    function hapusPengawas($id)
    {
        $where = array('idpengawas' => $id);
        $pengawas = $this->db->query("SELECT * FROM pengawas WHERE idpengawas = '$id'")->row();
        $this->db->query("UPDATE guru SET pengawas ='Tidak Aktif' WHERE kodeGuru = '$pengawas->pengawas1'");
        if ($pengawas->pengawas2 != 0) {
            $this->db->query("UPDATE guru SET pengawas ='Tidak Aktif' WHERE kodeGuru = '$pengawas->pengawas2'");
        }
        $this->m_data->delete_data($where, 'pengawas');
        redirect(base_url() . 'admin/pengawas');
    }
    // set Ujian
    function setUjian()
    {
        $data['paket'] = $this->db->query("SELECT * FROM paketsoal WHERE status='Y'")->result();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_setUjian', $data);
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_setUjian', $data);
        }
    }

    function run_key($length = 5)
    {

        $chars = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        );

        shuffle($chars);

        $num_chars = count($chars) - 1;
        $token = '';

        for ($i = 0; $i < $length; $i++) { // <-- $num_chars instead of $len
            $token .= $chars[mt_rand(0, $num_chars)];
        }

        return $token;
    }
    function set()
    {
        $uri3 = ($this->uri->segment(3));
        $data['Token'] = $this->run_key();
        $data['tes'] = $this->m_data->get_data('tes')->result();
        $data['paket'] = $this->db->query("SELECT * FROM paketsoal WHERE idPaketSoal='$uri3'")->row();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_set', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_set', $data);
            $this->load->view('ketua/v_footer');
        }
    }
    function setUji()
    {
        $jenUjian = $this->input->post('jenUjian');
        $codeSoal = $this->input->post('codeSoal');
        $kodeMapel = $this->input->post('kodeMapel');
        $jurusan = $this->input->post('jurusan');
        $semester = $this->input->post('semester');
        $Tingkatan = $this->input->post('Tingkatan');
        $jumPG = $this->input->post('jumPG');
        $acak = $this->input->post('acak');
        $jumEsai = $this->input->post('jumEsai');
        $Token = $this->input->post('Token');
        $Tanggal = date_create($this->input->post('tgl'));
        $tglUji = date_format($Tanggal, "Y-m-d");
        $jamM = date_format($Tanggal, "H:i");
        $Durasi = $this->input->post('Durasi');
        $batasMasuk = $this->input->post('Tutup');
        $kodeGuru = $this->input->post('kodeGuru');
        $status = "Y";

        $data = array(
            'idSetUji' => $this->guidv4(),
            'jenis_ujian' => $jenUjian,
            'codeSoal' => $codeSoal,
            'kodeMapel' => $kodeMapel,
            'semester' => $semester,
            'jurusan' => $jurusan,
            'tingkatan' => $Tingkatan,
            'jumlahPG' => $jumPG,
            'jumlahEsai' => $jumEsai,
            'Token' => $Token,
            'tglUjian' => $tglUji,
            'jamMulai' => $jamM,
            'batasMasuk' => $batasMasuk,
            'lamaUjian' => $Durasi,
            'kodeGuru' => $kodeGuru,
            'statusUjian' => $status,
            'acak' => $acak
        );
        $this->m_data->input_data($data, 'setujian');
        redirect(base_url() . 'admin/berjalan');
    }
    function berjalan()
    {
        $data['set'] = $this->db->query("SELECT * FROM setujian WHERE statusUjian ='Y' ")->result();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_berjalan', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_berjalan', $data);
            $this->load->view('ketua/v_footer');
        }

    }
    function nonAktif()
    {
        $uri3 = ($this->uri->segment(3));
        $SJ = "N";
        $where = array('idSetUji' => $uri3);
        $data = array(
            'statusUjian' =>  $SJ
        );
        $this->m_data->update_data($where, $data, 'setujian');
        redirect(base_url() . 'admin/non');
    }
    function non()
    {
        $data['set'] = $this->db->query("SELECT * FROM setujian WHERE statusUjian ='N' ")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/v_non', $data);
        $this->load->view('admin/v_footer');
    }
    function paketoff()
    {
        $uri3 = ($this->uri->segment(3));
        $where = array('idPaketSoal' => $uri3);
        $data = array(
            'status' => 'N'
        );
        $this->m_data->update_data($where, $data, 'paketsoal');
        redirect(base_url() . 'admin/setUjian');
    }
    function paketnon()
    {
        $data['set'] = $this->db->query("SELECT * FROM paketsoal WHERE status='N'")->result();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_sebelum', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_sebelum', $data);
            $this->load->view('ketua/v_footer');
        }
       
    }
    function hapusUjian($id)
    {
        $where = array('idSetUji' => $id);
        $this->m_data->delete_data($where, 'setujian');
        redirect(base_url() . 'admin/sebelumHapus');
    }
    function ubahUjian()
    {
        $uri3 = ($this->uri->segment(3));
        $data['Token'] = $this->run_key();
        $data['tes'] = $this->m_data->get_data('tes')->result();
        $data['paket'] = $this->db->query("SELECT * FROM setujian WHERE idSetUji=$uri3")->row();
         if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_ubahUji', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_ubahUji', $data);
            $this->load->view('ketua/v_footer');
        }
       
    }
    function ubahUji()
    {
        $idU = $this->input->post('idU');
        $jenUjian = $this->input->post('jenUjian');
        $semester = $this->input->post('semester');
        $Token = $this->input->post('Token');
        $Tanggal = date_create($this->input->post('tgl'));
        $tglUji = date_format($Tanggal, "Y-m-d");
        $jamM = date_format($Tanggal, "H:i");
        $Durasi = $this->input->post('Durasi');
        $batasMasuk = $this->input->post('Tutup');
        $idGuru = $this->input->post('idGuru');
        $status = "Y";

        $where = array('idSetUji' => $idU);
        $data = array(
            'jenis_ujian' => $jenUjian,
            'semester' => $semester,
            'Token' => $Token,
            'tglUjian' => $tglUji,
            'jamMulai' => $jamM,
            'batasMasuk' => $batasMasuk,
            'lamaUjian' => $Durasi,
            'idGuru' => $idGuru,
            'statusUjian' => $status
        );
        $this->m_data->update_data($where, $data, 'setujian');
        redirect(base_url() . 'admin/berjalan');
    }
    // Reset Siswa
    function resSiswa()
    {
        $uri3 = ($this->uri->segment(3));
        $data['sisU'] = $this->db->query("SELECT * FROM siswaujian AS SW,setujian AS SU WHERE SW.codeSoal=SU.codeSoal AND SU.idSetUji='$uri3'")->result();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_resSiswa', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_resSiswa', $data);
            $this->load->view('ketua/v_footer');
        }
        
    }
    function cekJawaban(){
        $uri3 = ($this->uri->segment(3));
        $data['sisU'] = $this->db->query("SELECT * FROM siswaujian AS SW,setujian AS SU WHERE SW.codeSoal=SU.codeSoal AND SU.idSetUji='$uri3'")->result();
        if($this->level()  === 'Super' || $this->level() === 'Admin'){
            $this->load->view('admin/header');
            $this->load->view('admin/v_jawaban', $data);
            $this->load->view('admin/v_footer');
        }else if($this->level()  === 'Ketua Ujian' || $this->level() === 'Helpdesk'){
            $this->load->view('ketua/header');
            $this->load->view('ketua/v_jawaban', $data);
            $this->load->view('ketua/v_footer');
        }
        
    }
    function selesai()
    {
        $cS = $this->input->post('codeSoal');
        $nomorSiswa = $this->input->post('nis');
        $siswa = $this->db->query("SELECT * FROM siswa WHERE nis=$nomorSiswa")->row();
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
        $kode = $siswa->kodeKelas;
        $nis = $siswa->nis;
        $Tingkatan = $siswa->Tingkatan;
        $jurusan =  $siswa->idJurusan;
        $Agama = $siswa->Agama;
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
    }
    function hapusdariSoal(){
        $id = $this->input->post('id');
        $cS = $this->input->post('codeSoal');
        $nomorSiswa = $this->input->post('nis');
        $where = array('idSiswaUjian' => $id);
        $this->db->query("DELETE FROM `jawaban` WHERE `codeSoal`='$cS' AND`nis`=$nomorSiswa");
        $data =  $this->m_data->delete_data($where,'siswaujian');
        echo json_encode($data);
    }
    function ress()
    {
        $id = $this->input->get('id');
        $stat = $this->input->get('stat');
        $where = array('idSiswaUjian' => $id);
        $data = array('statusU' => $stat);
        $this->m_data->update_data($where, $data, 'siswaujian');
        echo json_encode($data);
    }
    // phpinfo
    function phpinfo()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/v_phpinfo');
        $this->load->view('admin/v_footer');
    }
    // Delete CI_SESSION
    function delci(){
        $this->db->query("DELETE FROM `ci_sessions`");
        redirect(base_url());
    }
}
