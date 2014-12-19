<?php
class add extends CI_Controller{
	public function add(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index(){

		$data['tempval'] = $this->db->select("*")->from("template")->get()->result_array();


		$this->load->view("dash/headernavbar");

		$this->load->view("dash/add/addquestionview",$data);

	}
	public function addquestion(){
		

		$topic = $this->input->post("topic");
		$prefix = $this->input->post("prefix");
		$firstname = $this->input->post("firstname");
		$lastname = $this->input->post("lastname");
		$years = $this->input->post("years");
		$department = $this->input->post("dept");
		$faculty = $this->input->post("faculty");
		$position = $this->input->post("position");
		$university = $this->input->post("university");
		$maincontent = $this->input->post("maincontent");
		$hiddencontent = $this->input->post("hiddencontent");
		$conclusioncontent = $this->input->post("conclusioncontent");
		$tempID = $this->input->post("tempID");

		//upload background
		$config['upload_path']= 'images/';
		$config['allowed_types'] = "jpg|gif|png";
		$config['max_size'] = 100000;
		$config['file_name'] = $firstname.$lastname;

		$this->load->library("upload");
		$this->upload->initialize($config);

		$imagepath = "";		

		if($this->upload->do_upload("picture")){ //ถ้าไม่มีปัญหา

					$config['image_library'] = 'gd2';
                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 1500;
                    $config['height'] = 1000;
                    $this->load->library('image_lib',$config); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$imagepath = $data['file_name'];

		}
		else{
			print_r("Cann't background upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}

		//upload background
		$config2['upload_path']= 'images/profile/';
		$config2['allowed_types'] = "jpg|gif|png";
		$config2['max_size'] = 100000;
		$config2['file_name'] = "profile_".$firstname.$lastname;

		
		$this->upload->initialize($config2);

		$profilepath = "";		
		if($this->upload->do_upload("profile")){ //ถ้าไม่มีปัญหา

					$config['image_library'] = 'gd2';
                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 400;
                    $config['height'] = 400;
                    $this->load->library('image_lib',$config2); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$profilepath = $data['file_name'];

		}
		else{
			print_r("Cann't profile upload".$this->upload->display_errors()."<br>".$config2['upload_path']);
		}

		//keep path video
		$videopath = $this->input->post("videopath");


		$this->db->query("INSERT INTO question VALUES (null, '$topic', '$profilepath','$imagepath', '$prefix', '$firstname', '$lastname', '$years', '$department', '$faculty', '$position', '$university', '$maincontent', '$hiddencontent', '$conclusioncontent', '$videopath', $tempID);");
		

		
	}

}
?>