<?php 

class Help extends CI_Model {

    function upload()
	{
		if (!empty($_FILES['image']['name'])) {
			$config['upload_path'] = 'assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|svg';
			$config['max_size'] = 2000;
			$config['file_name'] = md5($_FILES['image']['name'] . date("dmYHis"));

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$uploadFile = $this->upload->do_upload('image');
			if ($uploadFile) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
			}
			// else {
			// 	$this->session->set_flashdata('message', array('warning', $this->upload->display_errors()));
			// 	// redirect('company/addProgram', 'refresh'); 	 
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

	function getUserInfo($id){
		$data=$this->db->where("id",$id)->get("user")->row();
		return $data;
	}

	function getCustomerInfo($id){
		$data=$this->db->where("id",$id)->get("customer")->row();
		return $data;
	}
}   

?>