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

    public function employee_workready_entry()
    { 
        $data['spares'] = $this->User_model->getProductItemsByCategoryName();
        $class['classname'] = 'employee_workready_entry';
        $this->load->view("sidebar", $class);
        $this->load->view('entries/employee_workready_entry',$data);
        $this->load->view("footer");
    }   

    public function getJobCardDetails()
    {

        $product_id = $this->input->post('product_id'); 
        $jobCardDetails = $this->db
            ->select([
                "job.customerName",
                "job.contact",
                "job.formno",
                "job.warrantyStatus",
                "job.billNo",
                "job.remarks",
                "p.jobcardNo", 
                "e.name AS employee_name",
                "p.problem_stated",
                "p.customer_charges",
                "p.id",
                "p.jobID",
                "pc.name AS complaint_name",
                "pm.name AS model_name",
                "st.name AS service_name",
                "e.name AS assigned_name",
                "cb.name AS created_by_name",
            ])
            ->from('product as p')
            ->where("p.id", $product_id)
            ->join('job', 'job.id = p.jobID', 'left')
            ->join('product_model_complaint as pc', 'pc.id = p.complaint', 'left')
            ->join('product_model as pm', 'pm.id = p.products', 'left')
            ->join('service_type as st', 'st.id = p.service', 'left')
            ->join('employee as e', 'e.id = p.assigned', 'left')
            ->join('employee as cb', 'cb.id = job.createdBy', 'left')
            ->get()
            ->result();
        echo json_encode($jobCardDetails);
    }

    public function getJobCardProducts()
    {
        $searchTerm = $this->input->get('q');
        $page = $this->input->get('page');
        $vendor_id = $this->input->get('vendor_id');
        $user_id = $this->input->get('user_id');
        if (!$page) {
            $page = 1;
        }
        $limit = 10;
        $offset = 0;

        if ($page == 1) {
            $limit = 10;
        } else {
            $offset = ($page - 1) * $limit;
        }
        $query = $this->db->select(['id', 'jobcardNo'])->like('jobcardNo', $searchTerm)->limit($limit, $offset);
        if ($vendor_id) {
            $query = $query->where("outwork_vendor_id", $vendor_id);
        }
        if ($user_id) {
            $query = $query->where("assigned", $user_id);
        }
        $results['items'] = $query->get('product')->result_array();
        $count_query = $this->db->like('jobcardNo', $searchTerm);
        if ($vendor_id) {
            $count_query->where("outwork_vendor_id", $vendor_id);
        }
        $results['total_count'] = $count_query->get('product')->num_rows();

        echo json_encode($results);
    }

    public function sendOutwork()
    {
        $vendor_id = $this->input->post('outwork_vendor_id');
        $job_id = $this->input->post('job_id');
        $job_no = $this->input->post('jobcardNo');
        $data = array(
            'outwork_vendor_id' => $vendor_id,
            'status' => 'process',
        );
        $this->User_model->updateStatus($job_id, STATUS_PROCESS); 
        $this->User_model->updateOutworkvendorID($job_no, $data);
        redirect('entries/outwork_send');
    }

    public function receiveOutwork()
    { 
        $job_id = $this->input->post('job_id'); 
        $outwork_vendor_charges = $this->input->post('outwork_vendor_charges');
        $customer_charges = $this->input->post('customer_charges'); 
        $this->User_model->updateStatus($job_id, STATUS_COMPLETED);
        $result = $this->User_model->updateCharges($job_id, $outwork_vendor_charges, $customer_charges); 
        if ($result) {
            redirect('entries/outwork_receive');
        } else {
            print_r($outwork_vendor_charges);
        }
    }

    public function saveSpares() {
        $jsonString = $this->input->post('sparesJSON');
        $inputData = json_decode($jsonString, true);
        $job_id = $inputData['job_id'];
        $product_id = $inputData['product_id'];
        $laborCharges = $inputData['laborCharges'];
        $outworkCharges = $inputData['outworkCharges'];
        $grandTotalCharges = $inputData['totalCharges'];
        $spareList = $inputData['spare'];
        $this->User_model->saveJob($product_id, $laborCharges, $outworkCharges, $grandTotalCharges);
        $this->User_model->updateStatus($product_id,STATUS_JOBCARD_COMPLETED);
        foreach ($spareList as $spare) {
            $this->User_model->saveSpare($job_id, $product_id, $spare['name'], $spare['amount']);
        }
       echo json_encode(array('success' => true, 'message' => 'Entry completed successfully'));
    }
}
