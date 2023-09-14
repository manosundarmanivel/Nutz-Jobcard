<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct(); 
           $this->Help->checksession();
    }

	public function index()
	{ 
        $date=new DateTime();
        $date=$date->format('Y-m-d');  
        $threeDaysBefore=date('Y-m-d', strtotime('-3 days', strtotime($date))); 
        $data["active_user"]=$this->db->where("is_active",true)->get("user")->num_rows();
        $data["inactive_user"]=$this->db->where("is_active",false)->get("user")->num_rows();
        $data["active_customer"]=$this->db->where("is_active",false)->get("customer")->num_rows();
        $data["inactive_customer"]=$this->db->where("is_active",false)->get("customer")->num_rows();
        $data["reminders"] = $this->db->select("
        *,
        CASE
            WHEN remedy_1_date >= '$threeDaysBefore' AND remedy_1_date <= '$date' THEN 'remedy_1'
            WHEN remedy_2_date >= '$threeDaysBefore' AND remedy_2_date <= '$date' THEN 'remedy_2'
            WHEN remedy_3_date >= '$threeDaysBefore' AND remedy_3_date <= '$date' THEN 'remedy_3'
        END AS remedy
        ")
        ->where("is_active", true)
        ->group_start()
            ->group_start()
                ->where("remedy_1_date >=", date('Y-m-d', strtotime('-3 days', strtotime($date))))
                ->where("remedy_1_date <=", $date)
            ->group_end()
            ->or_group_start()
                ->where("remedy_2_date >=", date('Y-m-d', strtotime('-3 days', strtotime($date))))
                ->where("remedy_2_date <=", $date)
            ->group_end()
            ->or_group_start()
                ->where("remedy_3_date >=", date('Y-m-d', strtotime('-3 days', strtotime($date))))
                ->where("remedy_3_date <=", $date)
            ->group_end()
        ->group_end()
        ->get("remedy")
        ->result(); 
        $this->load->view("admin/sidebar");
		$this->load->view("admin/index",$data); 
	}

    public function addUser(){ 
        if($this->input->post()){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[50]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', array('danger', validation_errors()));
            }else{
                $post=$this->input->post();
                $exist_user=$this->db->where("email",$post["email"])->where("is_active",true)->get("user")->row();
                if($exist_user){
                    $this->session->set_flashdata('message', array('danger', "User Already Exists"));
                    return redirect(base_url("admin/addUser")); 
                }
                $user["first_name"]=$post["first_name"];
                $user["last_name"]=$post["last_name"];
                $user["email"]=$post["email"];
                $user["password"]="Nu".crypt($post["password"],'tz');
                $user["created_by"]=$this->session->userdata("userdata")->id;
                $this->db->insert("user",$user);
                $this->session->set_flashdata('message', array('success', "User Created Successfully"));
                return redirect(base_url("admin/addUser"));
            }
        }
        $data['users']=$this->db->where("id !=",$this->session->userdata("userdata")->id)->where("is_active",1)->get("user")->result();
        $this->load->view("admin/sidebar");
		$this->load->view("admin/addUser",$data); 
    }

    public function addCustomer($id=null){ 
        if($this->input->post()){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[50]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'max_length[50]'); 
            $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|max_length[15]'); 
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required|max_length[50]'); 
            $this->form_validation->set_rules('birth_time', 'Birth Time', 'required|max_length[50]'); 
            $this->form_validation->set_rules('place_of_birth', 'Place Of Birth', 'required|max_length[50]');  
            $this->form_validation->set_rules('address', 'Address', 'required|max_length[50]');  
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', array('danger', validation_errors()));
            }else{
                $post=$this->input->post();
                $customer["first_name"]=$post["first_name"];
                $customer["last_name"]=$post["last_name"];
                $customer["mobile_no"]=$post["mobile_no"]; 
                $customer["dob"]=$post["dob"]; 
                $customer["place_of_birth"]=$post["place_of_birth"]; 
                $customer["referred_by"]=$post["referred_by"]; 
                if($this->Help->uploadMultiple('jataka')){ 
                    $customer["jataka"]=json_encode($this->Help->uploadMultiple('jataka'));  
                } 
                $customer["birth_time"]=$post["birth_time"]; 
                // $customer["appointment_date"]=$post["appointment_date"]; 
                $customer["address"]=$post["address"]; 
                if($id){ 
                    $customer["updated_by"]=$this->session->userdata("userdata")->id;
                    $this->db->where("id",$id)->update("customer",$customer);
                    $this->session->set_flashdata('message', array('success', "Customer Updated Successfully"));
                }else{ 
                    $customer["created_by"]=$this->session->userdata("userdata")->id;
                    $this->db->insert("customer",$customer);
                    $this->session->set_flashdata('message', array('success', "Customer Created Successfully"));
                }
                return redirect(base_url("admin/addCustomer"));
            }
        }
        if($id){
            $data["update"]=$this->db->where("is_active",true)->where("id",$id)->get("customer")->row();
        } 
        $data["customers"]=$this->db->where("is_active",true)->get("customer")->result();
        $this->load->view("admin/sidebar");
		$this->load->view("admin/addCustomer",$data); 
    }

    public function addAppointment(){
        if($this->input->post()){
            $this->form_validation->set_rules('customer_id', 'Customer Id', 'required|max_length[50]');
            $this->form_validation->set_rules('priority', 'Priority', 'required|max_length[50]');    
            $this->form_validation->set_rules('type', 'Type', 'required|max_length[50]');  
            $this->form_validation->set_rules('appointment_type', 'Appointment Type', 'required|max_length[50]');  
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', array('danger', validation_errors()));
            }else{
                $post=$this->input->post();
                $appointment["customer_id"]=$post["customer_id"];
                $appointment["priority"]=$post["priority"]; 
                $appointment["type"]=$post["type"];  
                $appointment["appointment_type"]=$post["appointment_type"];  
                $appointment["appointment_date"]=$post["appointment_date"]; 
                $appointment["created_by"]=$this->session->userdata("userdata")->id;
                $this->db->insert("appointment",$appointment);
                $this->session->set_flashdata('message', array('success', "Customer Created Successfully")); 
                return redirect(base_url("admin/addAppointment"));
            } 
        }
        $data["appointments"]=$this->db->where("is_active",true)->get("appointment")->result();
        $data["customers"]=$this->db->where("is_active",true)->get("customer")->result();
        $this->load->view("admin/sidebar");
		$this->load->view("admin/addAppointment",$data); 
    }

    public function addRemedy(){ 
        if($this->input->post()){ 
            $this->form_validation->set_rules('customer_id', 'Customer Id', 'required|max_length[50]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', array('danger', validation_errors()));
            }else{ 
                $post=$this->input->post();
                $categoryItems = $this->input->post('category_items');
                $user=$this->Help->getCustomerInfo($post["customer_id"]);
                // $remedy_exits=$this->db->where("is_active",true)->where("customer_id",$post["customer_id"])->get("remedy")->row();
                // if(isset($remedy_exits)){
                //     $this->session->set_flashdata('message', array('danger', "Customer alreay Have Remedy"));
                //     return redirect(base_url("admin/addRemedy"));
                // }
                $user_name=""; 
                if($user){
                    if($user->first_name){
                        $user_name="$user_name $user->first_name";
                    } 
                    if($user->last_name){
                        $user_name="$user_name $user->last_name"; 
                    }
                }
                $currentDate = new DateTime();
                $remedy_1_date=$currentDate->format('Y-m-d');
                $remedy_2_date=$currentDate->modify('+31 day')->format('Y-m-d');
                $remedy_3_date=$currentDate->modify('+31 day')->format('Y-m-d');
                $remedy["customer_id"]=$post["customer_id"];
                $remedy["remedy"]=json_encode($categoryItems); 
                $remedy["remedy_1_date"]=$remedy_1_date;  
                $remedy["remedy_2_date"]=$remedy_2_date;  
                $remedy["remedy_3_date"]=$remedy_3_date;  
                $remedy["customer_name"]="$user_name";  
                $remedy["created_by"]=$this->session->userdata("userdata")->id;
                $this->db->insert("remedy",$remedy);
                $this->session->set_flashdata('message', array('success', "Remedy Created Successfully"));
                return redirect(base_url("admin/addRemedy"));
            }
        }
        $data["categories"]=$this->db->where("is_active",true)->get("category")->result();
        $data["customers"]=$this->db->where("is_active",true)->get("customer")->result();
        $this->load->view("admin/sidebar");
		$this->load->view("admin/addRemedy",$data); 
    }

    public function deleteUser($id){ 
        if($id){
            $user=$this->db->where("id",$id)->update("user",["is_active"=>0]);
            if($user){ 
                $this->session->set_flashdata('message', array('success', "User deleted succesfully")); 
            }else{
                $this->session->set_flashdata('message', array('danger', "Something went wrong")); 
            }
            return redirect("admin/addUser");
        }else{
            $this->session->set_flashdata('message', array('danger', "User Id Not Found"));
            redirect(base_url("admin/addUser"));
        }
    } 

    public function deleteCustomer($id){ 
        if($id){
            $customer=$this->db->where("id",$id)->update("customer",["is_active"=>0]);
            if($customer){ 
                $this->session->set_flashdata('message', array('success', "Customer deleted succesfully")); 
            }else{
                $this->session->set_flashdata('message', array('danger', "Something went wrong")); 
            }
            return redirect("admin/addCustomer");
        }else{
            $this->session->set_flashdata('message', array('danger', "Customer Id Not Found"));
            redirect(base_url("admin/addCustomer"));
        }
    } 
    
    public function viewRemedy($id,$remedy_id=null){
        $data["remedies"]=$this->db->where("is_active",true)->where("id",$remedy_id)->where("customer_id",$id)->get("remedy")->result();
        $data["customer"]=$this->Help->getCustomerInfo($id);
        $this->load->view("admin/sidebar");
        $this->load->view("admin/viewRemedy",$data);
    }

    public function addCategory(){
        if($this->input->post()){
            $this->form_validation->set_rules('category', 'Category', 'required|max_length[50]');  
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', array('danger', validation_errors()));
            }else{
                $post=$this->input->post();
                $category["name"]=$post["category"];
                if($post["items"]){
                    $items=explode(",",$post["items"]);
                }else{
                    $items=[];
                }
                $category["items"]=json_encode($items);
                $category["created_by"]=$this->session->userdata("userdata")->id;
                $this->db->insert("category",$category);
                $this->session->set_flashdata('message', array('success', "Category Created Successfully"));
                return redirect(base_url("admin/addCategory"));
            }
        }
        $data["categories"]=$this->db->where("is_active",true)->get("category")->result();
        $this->load->view("admin/sidebar");
        $this->load->view("admin/addCategory",$data);
    }

    public function deleteCategory($id){
        if($id){
            $category=$this->db->where("id",$id)->update("category",["is_active"=>0]);
            if($category){ 
                $this->session->set_flashdata('message', array('success', "Category deleted succesfully")); 
            }else{
                $this->session->set_flashdata('message', array('danger', "Something went wrong")); 
            }
            return redirect("admin/addCategory");
        }else{
            $this->session->set_flashdata('message', array('danger', "Category Id Not Found"));
            redirect(base_url("admin/addCategory"));
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url(''));
    }

}
