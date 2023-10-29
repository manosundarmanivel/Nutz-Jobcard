<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    { 
        redirect(base_url("master/ledger_group_master_add")); 
    } 

    public function ledger_master_add()
    {
        $data['active_ledger_groups'] = $this->User_model->getActiveLedgerGroups();
        $class['classname'] = 'ledger_master_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_master_add', $data);
        $this->load->view("footer");
    }

    public function ledger_master_view()
    { 
         $data['ledger_masters'] = $this->User_model->getActiveLedgerMasters();
         $class['classname'] = 'ledger_master_view';
   
        $full_names = array();
        foreach ($data['ledger_masters'] as $ledger) {
            $full_names[] = $this->User_model->get_full_name($ledger['created_by']);
        }
        $data['full_names'] = $full_names;

        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_master_view', $data);
        $this->load->view("footer");
    }  

    public function ledger_group_master_add()
    {  
        $class['classname'] = 'ledger_group_master_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_group_master_add', $data);
        $this->load->view("footer");
    }

    public function ledger_group_master_view()
    { 
        $data['ledger_group_masters'] = $this->User_model->getActiveLedgerGroupMasters();
        $class['classname'] = 'ledger_group_master_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_group_master_view', $data);
        $this->load->view("footer");
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


            redirect('master/ledger_group_master_add');
        } else { 
            $class['classname'] = 'addledgergroup';
            $this->load->view("sidebar",$class);
            $this->load->view('master/ledger_group_master_add', $data);
            $this->load->view("footer");
        }
    }

    public function viewActiveLedgerGroupMasters()
    {
        $data['ledger_group_masters'] = $this->User_model->getActiveLedgerGroupMasters(); 
        $class['classname'] = 'viewActiveLedgerGroupMasters';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_group_master_view', $data);
        $this->load->view("footer");
    }

    public function viewActiveLedgerMasters()
    {
        $data['ledger_masters'] = $this->User_model->getActiveLedgerMasters(); 
        $class['classname'] = 'viewActiveLedgerMasters';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_master_view', $data);
        $this->load->view("footer");
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
