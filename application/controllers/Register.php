<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct(){
        parent ::__construct();
    }
    public function index(){
        $this->load->view('register.php');
    }
    private function guidv4()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    function register_aksi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $pass = password_hash($password,PASSWORD_DEFAULT);
        //masukan kedalam database
        $data = array(
            'id' => $guidv4,
            'username' => $username,
            'password' => $pass
        );
        $this->m_data->input_data($data,'admin');
        redirect(base_url().'login');
    }
}
