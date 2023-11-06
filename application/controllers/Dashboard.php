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
    $class['classname'] = 'jobcard_employee_view';
       $this->load->view('sidebar' ,$class);
       $this->load->view("dashboard/home");
       $this->load->view('footer');

    } 

    public function login()
    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            


            $user = $this->User_model->login_user($username, $password);

            if ($user) {

                $this->session->set_userdata('user', $user);

                return redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('message', array('danger', 'Login failed. Please check your email and password.'));

                return redirect(base_url());
            }
        }

       
        $this->load->view('login');
        $this->load->view('footer');
    }
}