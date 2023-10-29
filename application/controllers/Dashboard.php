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

        if ($this->session->userdata('user_id')) {

            redirect('dashboard/home');
        }

        $this->load->view('login');
    }

    public function register()
    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $full_name = $this->input->post('full_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');


            if ($this->User_model->register_user($full_name, $email, $password)) {

                redirect('dashboard/index');
            } else {

                $data['registration_error'] = 'Registration failed';
            }
        }


        $this->load->view('signup');
    }

    public function login()
    {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $email = $this->input->post('login_email');
            $password = $this->input->post('login_password');


            $user_id = $this->User_model->login_user($email, $password);

            if ($user_id) {

                $this->session->set_userdata('user_id', $user_id);

                redirect('dashboard/home');
            } else {

                $data['login_error'] = 'Login failed. Please check your email and password.';
            }
        }


        $this->load->view('login');
    }

    public function home()
    {
        $data['content_view'] = 'dashboard_home';
        $this->load->view('home', $data);
    }

    public function ledger_master_add()
    {
        $data['content_view'] = 'dashboard_ledger_master_add';

        $data['active_ledger_groups'] = $this->User_model->getActiveLedgerGroups();
        $this->load->view('home', $data);
    }

    public function ledger_master_view()
    {
        $data['content_view'] = 'dashboard_ledger_master_view';
    $data['ledger_masters'] = $this->User_model->getActiveLedgerMasters();

   
    $full_names = array();
    foreach ($data['ledger_masters'] as $ledger) {
        $full_names[] = $this->User_model->get_full_name($ledger['created_by']);
    }
    $data['full_names'] = $full_names;

    $this->load->view('home', $data);
    }

    

    public function ledger_group_master_add()
    {
        $data['content_view'] = 'dashboard_ledger_group_master_add';


        $this->load->view('home', $data);
    }

    public function ledger_group_master_view()
    {
        $data['content_view'] = 'dashboard_ledger_group_master_view';
        $data['ledger_group_masters'] = $this->User_model->getActiveLedgerGroupMasters();
        $this->load->view('home', $data);
    }


    public function addledgergroup()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $user_id = $this->session->userdata('user_id');
            $name = $this->input->post('name');
            $type = $this->input->post('type');


            $data = array(
                'name' => $name,
                'type' => $type,
                'is_active' => 1,
                'created_by' => $user_id,
                'created_at' => date('Y-m-d H:i:s'),
            );


            $this->User_model->addLedgerGroup($data);


            redirect('dashboard/ledger_group_master_add');
        } else {

            $this->load->view('ledger_group_master_add');
        }
    }

    public function viewActiveLedgerGroupMasters()
    {
        $data['ledger_group_masters'] = $this->User_model->getActiveLedgerGroupMasters();

        $this->load->view('dashboard_ledger_group_master_view', $data);
    }
    public function viewActiveLedgerMasters()
    {
        $data['ledger_masters'] = $this->User_model->getActiveLedgerMasters();

        $this->load->view('dashboard_ledger_master_view', $data);
    }


    public function addLedger()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $data = array(
                'name' => $this->input->post('customer_name'),
                'contact_no' => $this->input->post('customer_contact'),
                'ledger_group_id' => $this->input->post('customer_group'),
                'address' => $this->input->post('customer_address'),
                'email_id' => $this->input->post('customer_email'),
                'gst_no' => $this->input->post('customer_gst'),
                'pan_no' => $this->input->post('customer_pan'),
                'entry_type' => $this->input->post('entry_type'),
                'price_list' => $this->input->post('price_list'),
                'discount' => $this->input->post('add_less_percentage'),
                'is_active' => true,
                'created_by' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
            );


            $this->User_model->addLedger($data);


            redirect('dashboard/ledger_master_add');
        }
    }
}
