<?php
class add extends CI_Controller{
	public function add(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index(){
		/*temp color*/
		$data['temp'] = $this->db->get("template")->result();

		$this->load->view("add/addquestionview",$data);

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

		//upload images
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
                    $config['width'] = 1300;
                    $config['height'] = 1300;
                    $this->load->library('image_lib',$config); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$imagepath = $data['full_path'];

		}
		else{
			print_r("Cann't upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}



		$this->db->query("INSERT INTO question VALUES (null, '$topic', '$imagepath', '$prefix', '$firstname', '$lastname', '$years', '$department', '$faculty', '$position', '$university', '$maincontent', '$hiddencontent', '$conclusioncontent', 2);");
		

		
	}

}
?>