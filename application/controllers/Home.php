<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){

    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$this->form_validation->set_rules('username','Username','trim|required');
    	$this->form_validation->set_rules('password','Password','trim|required');

    	if($this->form_validation->run() != false){
    		$where = array('username'=>$username,'password'=>md5($password));

    		$data = $this->m_penjualan->edit_data($where,'user');
    		$d = $this->m_penjualan->edit_data($where,'user')->row();
    		$cek = $data->num_rows();
            //cek apakah terdapat user
    		if($cek > 0){
				$session = array('id' => $d->id_user, 'nama' => $d->nama_user, 'status' => 'login');
				$this->session->set_userdata($session);
				redirect(base_url().'admin');
			}else{
				$this->session->set_flashdata('alert', 'Login gagal! Username atau password salah.');
				redirect(base_url());
			}
		}else{
			$this->session->set_flashdata('alert', 'Anda Belum mengisi Username atau Password');
			$this->load->view('login');
    	}
    }
}
?>