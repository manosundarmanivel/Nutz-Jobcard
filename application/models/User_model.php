<?php 

class User_model extends CI_Model {

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
       
        $this->db->select('id, name');
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
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('product_group');
        return $query->result_array();
    }
    public function  getActiveProductmodels() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
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
    public function getActiveOutwork() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('outwork_vendor');
        return $query->result_array();
    }
    public function  getActiveProductitems() {
      
        $this->db->select('*');
        $this->db->where('is_active', true); 
        $query = $this->db->get('product_item');
        return $query->result_array();
    }
   

    public function get_full_name($user_id) {
        $this->db->select('full_name');
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
        
        $query = $this->db->get_where('product_item', array('id' => $id));

        return $query->row_array();
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


    
    
}




?>