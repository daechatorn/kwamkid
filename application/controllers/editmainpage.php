<?php
class editmainpage extends CI_Controller{
	public function editmainpage(){
		parent::__construct();
	}
	public function index(){

		$this->load->view("dash/headernavbar");
		$data['path'] = $this->db->select("partbg")->from('main')->get()->row_array();

		$this->load->view("dash/edit/editmainpage",$data);
	}
	public function edit(){

		$data['getoldpathpicture'] = $this->db->select("*")->from('main')->get()->row_array();
		$bgupload = $data['getoldpathpicture']['partbg']; //old name of topic picture
		//print_r($bgupload);

		$this->load->library("upload");
		
		$centerimage = $_FILES['centerbg']['name'];
		
		if($centerimage != ""){
			array_map('unlink', glob("images/background/".$bgupload));

			//upload profile
			$config['upload_path']= 'images/background/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "centerbg";

			
			$this->upload->initialize($config);

			$path = "";
			if($this->upload->do_upload("centerbg")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config['image_library'] = 'gd2';
	                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config['maintain_ratio'] = FALSE;
	                    $config['width'] = 1000;
	                    $config['height'] = 600;
	                    $this->load->library('image_lib',$config); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$path = $data['file_name'];

			}

			$data = array(
               'partbg' => $path,
            );
            
			$this->db->update('main', $data);

		}
		redirect("editmainpage");
		exit();

	}

}

?>