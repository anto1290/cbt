<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class S_model extends CI_Model{
    public function getSiswa(){
        return $this->db->get('guru')->result_array();
    }
}