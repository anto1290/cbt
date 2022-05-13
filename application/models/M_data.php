<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

    // Fugnsi CRUD
    // megambil table dari database
    function get_data($table)
    {
        return $this->db->get($table);
    }

    // fungsi input database
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // fungsi edit
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    // Fungsi Update data
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // fungsi delte
    function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }

    function upload_excel($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        //$config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    function insert_multiple($data)
    {
        $this->db->insert_batch('soal', $data);
    }
    function insert_multi($data, $table)
    {
        $this->db->insert_batch($table, $data);
    }
    // Pagnation Siswa
    function data($number, $offset)
    {
        return $query = $this->db->get('siswa', $number, $offset)->result();
    }
    // Info Lokasi
    function province()
    {
        $query = $this->db->query("SELECT * FROM inf_lokasi WHERE lokasi_kabupatenkota = 00 ORDER BY lokasi_nama ASC")->result();
        return $query;
    }
    function Kota($nama)
    {
        $id = $this->db->query("SELECT lokasi_propinsi FROM inf_lokasi WHERE lokasi_nama='$nama'")->row();
        $query = $this->db->query("SELECT * FROM inf_lokasi WHERE lokasi_propinsi = $id->lokasi_propinsi AND lokasi_kecamatan=00 ORDER BY lokasi_nama ASC");
        return  $query;
    }
    function Kecamatan($nama)
    {
        $id = $this->db->query("SELECT lokasi_propinsi,lokasi_kabupatenkota FROM inf_lokasi WHERE lokasi_nama='$nama'")->row();
        $query = $this->db->query("SELECT * FROM inf_lokasi WHERE lokasi_propinsi = $id->lokasi_propinsi AND lokasi_kabupatenkota=$id->lokasi_kabupatenkota AND lokasi_kelurahan=0000 ORDER BY lokasi_nama ASC");
        return  $query;
    }
    // Ujian Kartu
    function kartu()
    {
        $query = $this->db->query("SELECT * FROM kelas AS KS,ruang_uji AS RU WHERE KS.kodeKelas=RU.kodeKelas")->result();
        return $query;
    }
    function cetakKartu($uri)
    {
        $query = $this->db->query("SELECT * FROM kelas AS KS,ruang_uji AS RU,siswa AS S WHERE RU.idRuang='$uri' AND KS.kodeKelas=RU.kodeKelas AND RU.kodeKelas=S.kodeKelas AND S.status_siswa='aktif'");
        return $query;
    }

    function previewSoal($kodeGuru,$codeSoal,$kodeMapel,$nomorSoal,$jenis_soal){
          return $this->db->query("SELECT * FROM soal WHERE kodeMapel='$kodeMapel' AND kodeGuru='$kodeGuru' AND codeSoal='$codeSoal' AND jenis_soal=$jenis_soal ORDER BY Nomor_soal=$nomorSoal DESC LIMIT 1")->row();
    }
    function getKelasKoreksi($uri3) {
        $T =  $this->db->query("SELECT Tingkatan FROM paketsoal WHERE codeSoal='$uri3'")->row();
        if($T->Tingkatan === 'ALL'){
            return $this->db->query("SELECT * FROM kelas")->result();
        }else{
            return $this->db->query("SELECT * FROM kelas WHERE Tingkatan_Kelas='$T->Tingkatan'")->result();
        }
    }
}
