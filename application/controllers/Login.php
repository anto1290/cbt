<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == 'admin_login') {
            redirect(base_url() . 'admin');
        } else if ($this->session->userdata('status') == 'guru_login') {
            redirect(base_url() . 'guru');
        } else if ($this->session->userdata('status') == 'siswa_login') {
            redirect(base_url() . 'siswa');
        }
        $this->load->library('user_agent');
    }
    function macAddres()
    {
        //Cara mudah dan sederhana mendapatkan mac address  
        // Turn on output buffering  
        ob_start();
        //mendapatkan detail ipconfing menggunakan CMD  
        system('ipconfig /all');
        // mendapatkan output kedalam variable  
        $mycom = ob_get_contents();
        // membersihkan output buffer  
        ob_clean();
        $findme = "Physical";
        // mencari perangkat fisik | menemukan posisi text perangkat fisik  
        //Search the "Physical" | Find the position of Physical text  
        $pmac = strpos($mycom, $findme);
        // mendapatkan alamat peragkat fisik  
        $mac = substr($mycom, ($pmac + 36), 17);
        //menampilkan Mac Address
        return $mac;
    }
    public function index()
    {
        $data['mac'] = $this->macAddres();
        $data['browser'] = $this->agent->browser();
        // if ($this->agent->is_browser('Chrome')) {
        //     if (78 <= floatval($this->agent->version())) { } else {
        //         echo "<script>alert('Maaf Browser Anda Perlu Diupdate')</script>";
        //         die;
        //     }
        // } else {
        //     echo "<script>alert('Browser Anda Tidak Support')</script>";
        //     die;
        // }
        // if ($this->agent->is_mobile()) {
        //     if ($this->agent->is_browser('Chrome')) {
        //         if (78 <= floatval($this->agent->version())) { } else {
        //             echo "<script>alert('Maaf Browser Anda Perlu Diupdate')</script>";
        //             die;
        //         }
        //     } else {

        //         echo "<script>alert('Browser Anda Tidak Support')</script>";
        //         die;
        //     }
        // }
        $data['versi'] = "Version 1.1.10";
        $data['os'] = $this->agent->platform();
        $data['ip'] = $this->input->ip_address();
        $this->load->view('v_login', $data);
    }
    // validasi
    function login_aksi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sebagai = $this->input->post('sebagai');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() != false) {
            if ($sebagai == 'admin') {
                // cek user
                $cek = $this->db->query("SELECT * FROM admin WHERE username ='$username'")->num_rows();
                if ($cek > 0) {
                    $data = $this->db->query("SELECT * FROM admin WHERE username ='$username'")->row();
                    if (password_verify($password, $data->password)) {
                        $data_session = array(
                            'id' => $data->id,
                            'pic' => $data->picProfil,
                            'username' => $data->username,
                            'nama' => $data->nama,
                            'level' => $data->level,
                            'status' => 'admin_login'
                        );
                        $this->session->set_userdata($data_session);
                        redirect(base_url() . 'admin');
                    }
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
                redirect(base_url() . 'login?alert=gagal');
            } else if ($sebagai == 'guru') {
                // cek user
                $cek = $this->db->query("SELECT * FROM guru WHERE username ='$username' AND status='Aktif'")->num_rows();
                if ($cek > 0) {
                    $data = $this->db->query("SELECT * FROM guru WHERE username='$username' ")->row();
                    if (password_verify($password, $data->password)) {
                        $data_session = array(
                            'id' => $data->id_guru,
                            'kode' => $data->kodeGuru,
                            'jabatan_Tambahan' => $data->jabatan_Tambahan,
                            'username' => $data->username,
                            'namaLengkap' => $data->nama_lengkap,
                            'status' => 'guru_login'
                        );
                        $this->session->set_userdata($data_session);
                        redirect(base_url() . 'guru');
                    }
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
                redirect(base_url() . 'login?alert=gagal');
            } else if ($sebagai == 'siswa') {
                // cek user
                $cek = $this->db->query("SELECT * FROM siswa WHERE nis='$username'AND status_siswa='Aktif'")->num_rows();
                if ($cek > 0) {
                    $data = $this->db->query("SELECT * FROM siswa WHERE nis='$username' AND status_siswa='Aktif' ")->row();
                    if (password_verify($password, $data->password)) {
                        $data_session = array(
                            'idsiswa' => $data->idsiswa,
                            'nis' => $data->nis,
                            'nama_siswa' => $data->nama_siswa,
                            'Tingkatan' => $data->Tingkatan,
                            'Agama' => $data->Agama,
                            'kode' => $data->kodeKelas,
                            'idjurusan' => $data->idJurusan,
                            'status' => 'siswa_login'
                        );
                        $this->session->set_userdata($data_session);
                        redirect(base_url() . 'siswa');
                    }
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
                redirect(base_url() . 'login?alert=gagal');
            }
        }
    }
}
