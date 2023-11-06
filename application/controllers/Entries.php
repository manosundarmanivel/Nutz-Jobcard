<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Entries extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        redirect(base_url("entries/outwork_send"));
    }
   
    public function outwork_send()
    {
        $data['open_jobcards'] = $this->User_model->getOpenJobFormNos();
        $data['outwork_vendors'] = $this->User_model->getActiveOutwork();
        $class['classname'] = 'outwork_send';
        $this->load->view("sidebar", $class);
        $this->load->view('entries/outwork_send', $data);
        $this->load->view("footer");
    }
    public function outwork_receive()
    {
        $data['open_jobcards'] = $this->User_model->getProcessJobFormNos();
        $data['outwork_vendors'] = $this->User_model->getActiveOutwork();
        $class['classname'] = 'outwork_receive';
        $this->load->view("sidebar", $class);
        $this->load->view('entries/outwork_receive', $data);
        $this->load->view("footer");
    }

    public function getJobCardDetails() {
        // Get the job card number from the POST data
        $jobCardNumber = $this->input->post('job_card_number');

    

        // Call the model to get job card details
        $jobCardDetails = $this->User_model->getJobCardDetails($jobCardNumber);
        $jobCardDetails2 = $this->User_model->getProductsByJobNO($jobCardNumber);

        if ($jobCardDetails) {
            $response = array('jobCardDetails' => $jobCardDetails ,'jobCardDetails2' => $jobCardDetails2 );
        } else {
            $response = array('jobCardDetails' => null, 'jobCardDetails2' => null);
        }

        // Send the response as JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function sendOutwork()
    {

        $vendor_id = $this->input->post('outwork_vendor_id');
        $job_id = $this->input->post('job_id');
        $job_no = $this->input->post('job_card_number');
       
        $data = array(
            'outwork_vendor_id' => $vendor_id, 
            'status'=>'process',
        );
        
        $this->User_model->updateStatus($job_id,STATUS_PROCESS);

        $this->User_model->updateOutworkvendorID($job_no,$data);
        redirect('entries/outwork_send');

    }

}