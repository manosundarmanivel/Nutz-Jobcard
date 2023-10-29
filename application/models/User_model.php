<?php 

class User_model extends CI_Model {

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
        $this->db->select('name, type, created_by , updated_by , created_at,updated_at');
        $this->db->where('is_active', 1);
        $query = $this->db->get('ledger_group');
        return $query->result();
    }

    public function addLedger($data) {
        
        $this->db->insert('ledger', $data);
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


    
    
}




?>