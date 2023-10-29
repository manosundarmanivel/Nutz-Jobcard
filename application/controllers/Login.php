<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct(); 
           if($this->session->userdata("userdata")){
                redirect(base_url("admin"));
           }
    }

	public function index()
	{
        if($this->input->post()){ 
            $data=$this->input->post();  
            $userdata=$this->db->where('email', $data['email'])->where('password', "Nu".crypt($data['password'],'tz'))->where('is_active',1)->get('user')->row();
            if($userdata){
                $this->session->unset_userdata('userdata');
                $this->session->set_userdata('userdata', $userdata);
                redirect(base_url('admin'));
            }else{
                $this->session->set_flashdata('message', array('warning', 'Invalid username or password'));
                redirect(base_url('login'));
            }
        }else{ 
            $this->load->view('Login');
        }
	} 
}
