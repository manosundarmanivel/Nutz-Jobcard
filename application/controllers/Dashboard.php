<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
       $this->load->view("dashboard/home");
    } 

    public function login()
    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $email = $this->input->post('login_email');
            $password = $this->input->post('login_password');


            $user_id = $this->User_model->login_user($email, $password);

            if ($user_id) {

                $this->session->set_userdata('user_id', $user_id);

                redirect('dashboard');
            } else {

                $data['login_error'] = 'Login failed. Please check your email and password.';
            }
        }


        $this->load->view('login');
    }
}