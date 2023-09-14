<?php 

class Help extends CI_Model {

    function upload($name)
    {
        if (!empty($_FILES[$name]['name'])) {
            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg|pdf';
            $config['max_size'] = 5000;
            $config['file_name'] = md5($_FILES[$name]['name'] . date("dmYHis"));
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $uploadFile = $this->upload->do_upload($name);
            if ($uploadFile) {
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }
            // else {
            // $this->session->set_flashdata('message', array('warning', $this->upload->display_errors()));
            // redirect('company/addProgram', 'refresh'); 	 
            // 	return $this->upload->display_errors();
            // }
            return $picture;
        }
    }

    function uploadMultiple($name)
    {
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

    function checksession(){
        $userdata = $this->session->userdata('userdata');
        $data=$this->db->where('email', $userdata->email)->where('is_active', 1)->get('user')->row();
        if($data){
            $this->session->unset_userdata('userdata');
            $this->session->set_userdata('userdata', $data);
        }else{
            $this->session->sess_destroy();
            redirect(base_url(''));
        }
    }

    function formateDate($date){
        $dateString = $date;
        $dateTime = new DateTime($dateString);

        $formattedDate = $dateTime->format('j M Y');
        echo $formattedDate;
    }

	function getUserInfo($id){
		$data=$this->db->where("id",$id)->get("user")->row();
		return $data;
	}

	function getCustomerInfo($id){
		$data=$this->db->where("id",$id)->get("customer")->row();
		return $data;
	}

    function getCategory($id){
        $data=$this->db->where("id",$id)->get("category")->row();
        return $data;
    }
}   

?>