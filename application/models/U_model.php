<?php
defined('BASEPATH') or exit('No direct script access allowed');
class U_model extends CI_Model
{

    function get_soal($codeSoal, $Tingkatan, $Jurusan, $JSoal, $Agama, $Nomor, $batas)
    {
        return $this->db->query("SELECT * FROM soal AS S INNER JOIN paketsoal AS PS ON S.codeSoal=PS.codeSoal INNER JOIN setujian AS SU ON SU.codeSoal=S.codeSoal WHERE SU.statusUjian='Y' AND SU.codeSoal='$codeSoal' AND (S.Tingkatan='$Tingkatan' OR S.Tingkatan='All') AND (PS.Jurusan='$Jurusan' OR PS.Jurusan = 'ALL') AND jenis_soal =$JSoal  AND (SU.jenis_ujian = 'PH' OR SU.jenis_ujian='PTS' OR SU.jenis_ujian = 'PAS' OR SU.jenis_ujian = 'PAT' OR SU.jenis_ujian = 'USBK' OR SU.jenis_ujian = 'TOBK' OR SU.jenis_ujian='TOEIC' OR SU.jenis_ujian='TOEFL') AND (PS.Agama = '$Agama' OR PS.Agama='ALL') ORDER BY S.Nomor_soal=$Nomor DESC LIMIT $batas")->row();
    }
}
