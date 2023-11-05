<?php 

class User_model extends CI_Model {

    function uploadMultiple($name)
    {
       print_r(count(array_filter($_FILES[$name]['name'])));
        if (!empty($_FILES[$name]['name']) && count(array_filter($_FILES[$name]['name'])) > 0) {
           
            $filesCount = count($_FILES[$name]['name']); 
            $picture=[];
            for($i = 0; $i < $filesCount; $i++){ 
                $_FILES['file']['name']     = $_FILES[$name]['name'][$i]; 
                $_FILES['file']['type']     = $_FILES[$name]['type'][$i]; 
                $_FILES['file']['tmp_name'] = $_FILES[$name]['tmp_name'][$i]; 
                $_FILES['file']['error']     = $_FILES[$name]['error'][$i]; 
                $_FILES['file']['size']     = $_FILES[$name]['size'][$i]; 

                $config['upload_path'] = 'assets/uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|svg|pdf';
                $config['max_size'] = 5000;
                $config['file_name'] = md5($_FILES[$name]['name'][$i] . date("dmYHis"));
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $uploadFile = $this->upload->do_upload('file');
                print_r($uploadFile);
                if ($uploadFile) {
                    $uploadData = $this->upload->data();
                    $picture[$i] = $uploadData['file_name'];
                }
            } 
            // else {
            // $this->session->set_flashdata('message', array('warning', $this->upload->display_errors()));
            // redirect('company/addProgram', 'refresh'); 	 
            // 	return $this->upload->display_errors();
            // }
            return $picture;
        }
    }

    function permission_check(){
        if($this->session->userdata("user")){ 
            $user=$this->db->select(['id','role'])->where("id",$this->session->userdata("user")->id)->where("is_active",1)->get("users")->row();
            if($user){
                
                $this->session->unset_userdata('user');
                $this->session->set_userdata('user', $user);
            }else{
                $this->session->sess_destroy(); 
            }
        }
        $controller_name = $this->router->fetch_class();
        $method_name = $this->router->fetch_method(); 
        $user=$this->session->userdata("user"); 
        switch ($user->role) {
            case '1': 
                $admin_permission=[];
                if(in_array($method_name, $admin_permission)){ 
                    redirect(base_url("dashboard"));
                }else{
                }
                break;
            case '2': 
                $user_permission=[''];
                if(in_array($method_name, $user_permission)){ 
                    redirect(base_url("dashboard"));
                }else{
                    redirect(base_url("dashboard"));
                }

                break;
            case '3':
                 
                break;
            
            default:
                $common_permission=["login"];
                if(!in_array($method_name, $common_permission)){ 
                    redirect(base_url(""));
                }
                break;
        }
    }

    public function register_user($full_name, $email, $password) {
       
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        $data = array(
            'full_name' => $full_name,
            'email' => $email,
            'password' => $hashed_password
        );

       
        $this->db->insert('users', $data);

        return $this->db->affected_rows() > 0; 
    }

    public function login_user($email, $password) {
       
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();

           
            if (password_verify($password, $user->password)) {
                return $user->id; 
            }
        }

        return false; 
    }

    public function addLedgerGroup($data) {

        $this->db->insert('ledger_group', $data);
    }

    public function getActiveLedgerGroupMasters() {
        $this->db->select('id,name, type, created_by , updated_by , created_at,updated_at , is_default');
        $this->db->where('is_active', 1);
        $query = $this->db->get('ledger_group');
        return $query->result();
    }

    public function addLedger($data) {
        
        $this->db->insert('ledger', $data);
    }
    public function addProductcategory($data) {
        
        $this->db->insert('product_category', $data);
    }
    public function addProductgroup($data) {
        
        $this->db->insert('product_group', $data);
    }

    public function addProductmodel($data) {
        
        $this->db->insert('product_model', $data);
    }
    public function addProductitem($data) {
        
        $this->db->insert('product_item', $data);
    }

    public function addProductmodelcomplaint($data) {
        
        $this->db->insert('product_model_complaint', $data);
    }
    public function addProductbrand($data) {
        
        $this->db->insert('product_brand', $data);
    }
    public function addServicetype($data) {
        
        $this->db->insert('service_type', $data);
    }
    public function addEmployee($data) {
        
        $this->db->insert('employee', $data);
    }
    public function addOutwork($data) {
        
        $this->db->insert('outwork_vendor', $data);
    }
   

    

    public function getActiveLedgerGroups() {
       
        $this->db->select('id, name,type');
        $this->db->where('is_active', 1);
        $query = $this->db->get('ledger_group');
        return $query->result_array();
    }

    public function getActiveLedgerMasters() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('ledger');
        return $query->result_array();
    }
    public function getActiveProductcategory() {
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('product_category');
        return $query->result_array();
    }
   

    public function  getActiveProductgroups() {

    $this->db->select('product_group.*, product_category.name AS category_name');
    $this->db->where('product_group.is_active', true);
    $this->db->join('product_category', 'product_category.id = product_group.product_category_id', 'left');
    $query = $this->db->get('product_group');
    return $query->result_array();
        
    }


    public function  getActiveProductmodels() {
      
        $this->db->select('product_model.* , product_group.name AS group_name');
        $this->db->where('product_model.is_active', true); 
        $this->db->join('product_group','product_group.id = product_model.product_group_id', 'left');
        $query = $this->db->get('product_model');
        return $query->result_array();
    }
    public function  getActiveProductcomplaints() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('product_model_complaint');
        return $query->result_array();
    }
    public function  getActiveProductbrand() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('product_brand');
        return $query->result_array();
    }
    
    public function  getActiveServicetype() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('service_type');
        return $query->result_array();
    }
    public function getActiveEmployee() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('employee');
        return $query->result_array();
    }
    public function getActiveTechnician() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $this->db->where('designation', 'Technician'); 
        $query = $this->db->get('employee');
        return $query->result_array();
    }
    public function getActiveOutwork() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('outwork_vendor');
        return $query->result_array();
    }
    public function getJobcards() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('job');
        return $query->result_array();
    }
    public function getActiveProductitems() {
        $this->db->select('product_item.*, product_group.name AS group_name, product_category.name AS category_name, product_brand.name AS brand_name , product_model.name AS model_name');
        $this->db->where('product_item.is_active', true);
        $this->db->join('product_group', 'product_group.id = product_item.product_group_id', 'left');
        $this->db->join('product_category', 'product_category.id = product_item.product_category_id', 'left');
        $this->db->join('product_brand', 'product_brand.id = product_item.product_brand_id', 'left');
        $this->db->join('product_model', 'product_model.id = product_item.product_model_id', 'left');
        $query = $this->db->get('product_item');
        return $query->result_array();
    
    
    }
   

    public function get_full_name($user_id) {
        $this->db->select('name');
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->full_name;
        }

        return "N/A";
    }

    public function deleteLedger($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('ledger', $data);
    }
    public function deleteProductcategory($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_category', $data);
    }
    public function deleteProductgroup($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_group', $data);
    }
   
    public function deleteProductimage($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_images', $data);
    }
    public function deleteServicetype($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('service_type', $data);
    }
    public function deleteEmployee($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('employee', $data);
    }

    
    public function deleteOutwork($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('outwork_vendor', $data);
    }
    public function deleteProductmodel($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_model', $data);
    }
    public function deleteProductbrand($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_brand', $data);
    }
    public function deleteProductitem($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_item', $data);
    }
    public function deleteProductmodelcomplaint($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        $this->db->update('product_model_complaint', $data);
    }
    public function deleteLedgerGroup($id) {
        
        $data = array('is_active' => false);
        $this->db->where('id', $id);
        
        $this->db->update('ledger_group', $data);
    }

    public function getLedgerById($id) {
        
        $query = $this->db->get_where('ledger', array('id' => $id));

        return $query->row_array();
    }
    public function getLedgerGroupById($id) {
        
        $query = $this->db->get_where('ledger_group', array('id' => $id));

        return $query->row_array();
    }
    // public function getProductimageById($id) {
        
    //     $query = $this->db->get_where('product_images', array('product_id' => $id));

    //     return $query->row_array();
    // }

    public function getProductimageById($product_id) {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $this->db->where('is_active', 1);
        $query = $this->db->get('product_images');
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // No images found for the given product ID
        }
    }

    
    public function getEmployeeById($id) {
        
        $query = $this->db->get_where('employee', array('id' => $id));

        return $query->row_array();
    }

    public function updateLedger($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ledger', $data);
        return true;
    }
    public function updateProductcategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_category', $data);
        return true;
    }
    public function updateServicetype($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('service_type', $data);
        return true;
    }
    public function updateOutwork($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('outwork_vendor', $data);
        return true;
    }

    public function getProductcategoryById($id) {
        
        $query = $this->db->get_where('product_category', array('id' => $id));

        return $query->row_array();
    }
    public function getProductgroupById($id) {
        
        $query = $this->db->get_where('product_group', array('id' => $id));

        return $query->row_array();
    }
    public function getOutworkById($id) {
        
        $query = $this->db->get_where('outwork_vendor', array('id' => $id));

        return $query->row_array();
    }
    public function getProductmodelById($id) {
        
        $query = $this->db->get_where('product_model', array('id' => $id));

        return $query->row_array();
    }
    public function getProductmodelcomplaintById($id) {
        
        $query = $this->db->get_where('product_model_complaint', array('id' => $id));

        return $query->row_array();
    }
   
    public function getProductbrandById($id) {
        
        $query = $this->db->get_where('product_brand', array('id' => $id));

        return $query->row_array();
    }
    public function getServicetypeById($id) {
        
        $query = $this->db->get_where('service_type', array('id' => $id));

        return $query->row_array();
    }
    public function getProductitemById($id) {
        $this->db->select('product_item.*, product_group.name AS group_name, product_category.name AS category_name, product_brand.name AS brand_name, product_model.name AS model_name');
        $this->db->where('product_item.is_active', true);
        $this->db->join('product_group', 'product_group.id = product_item.product_group_id', 'left');
        $this->db->join('product_category', 'product_category.id = product_item.product_category_id', 'left');
        $this->db->join('product_brand', 'product_brand.id = product_item.product_brand_id', 'left');
        $this->db->join('product_model', 'product_model.id = product_item.product_model_id', 'left');
    
        // Specify the table alias for the 'id' column in the WHERE clause.
        $query = $this->db->get_where('product_item', array('product_item.id' => $id));
    
        return $query->row_array();
    }
    

    public function insertProductImage($product_id, $image_url) {

        $data = array(
            'product_id' => $product_id,
            'image_url' => $image_url
        );
        $this->db->insert('product_images', $data);
    }

    

    public function updateLedgerGroup($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ledger_group', $data);
        return true;
    }
    public function updateProductgroup($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_group', $data);
        return true;
    }
    public function updateProductmodel($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_model', $data);
        return true;
    }
    public function updateProductitem($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_item', $data);
        return true;
    }
    public function updateProductbrand($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_brand', $data);
        return true;
    }
    public function updateProductmodelcomplaint($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_model_complaint', $data);
        return true;
    }



public function getLedgerNameByContact($contactNumber) {
    
    $this->db->where('contact_no', $contactNumber);
    $query = $this->db->get('ledger');

    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->name;
    } else {
        return false;
    }
}

public function insert_job($data) {
    $this->db->insert('job', $data);
    return $this->db->insert_id();
}

public function insert_product($data) {
    $this->db->insert('product', $data);
    return $this->db->insert_id();
}

public function insert_group($data) {
    $this->db->insert('group', $data);
}

// public function getProductsByJobID($jobID) {
   
//     $this->db->where('jobID', $jobID);
//     $query = $this->db->get('product');
//     return $query->result();
// }

public function getProductsByJobID($jobID) {
    $this->db->select('product.*, product_model_complaint.name AS complaint_name, product_model.name AS product_model_name, service_type.name AS service_name , employee.name AS assigned');
    $this->db->from('product');
    $this->db->where('product.jobID', $jobID);
    $this->db->where('parent_id',0);
    $this->db->join('product_model_complaint', 'product_model_complaint.id = product.complaint', 'left');
    $this->db->join('product_model', 'product_model.id = product.products', 'left');
    $this->db->join('service_type', 'service_type.id = product.service', 'left');
    $this->db->join('employee', 'employee.id = product.assigned', 'left');
    $query = $this->db->get();
    return $query->result();
}

// public function getGroupsByJobID($jobID) {
   
//     $this->db->where('jobID', $jobID);
//     $query = $this->db->get('group');
//     return $query->result();
// }

public function getGroupsByJobID($jobID) {
    $this->db->select('product.*, product_model.name AS product_model_name, service_type.name AS service_name, employee.name AS assigned');
    $this->db->from('product');
    $this->db->where('product.jobID', $jobID);
    $this->db->where('parent_id !=',0 );
  
    $this->db->join('product_model', 'product_model.id = product.products', 'left');
    $this->db->join('service_type', 'service_type.id = product.service', 'left');
    $this->db->join('employee', 'employee.id = product.assigned', 'left');
    $query = $this->db->get();
    return $query->result();
}

public function deleteJobcard($id) {
        
    $data = array('is_active' => false);
    $this->db->where('id', $id);
    
    $this->db->update('job', $data);
}


public function updateStatus($id, $status)
{
    $data = array('job_id'=> $id,
    'name'=>$status );
    

    $this->db->insert('job_status', $data);
}


    
    
}




?>