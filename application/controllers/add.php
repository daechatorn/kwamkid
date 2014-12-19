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
		/*
			$datainsert = array(
					'qID' => null,
					'topic' => "$topic",
					'imageupload' => "$file_data",
					'prefix' => "$prefix",
					'firstname' => "$firstname",
					'lastname' => "$lastname",
					'years' => "$years",
					'department' => "$department",
					'faculty' => "$faculty",
					'position' => "$position",
					'univeristy' => "$univeristy",
					'maincontent' => "$maincontent",
					'hiddencontent' => "$hiddencontent",
					'conclusioncontent' => "$conclusioncontent",
					'tempID' => 1
			);
			
			$this->db->insert('question', $datainsert);
		

		$topic = $this->input->post("topic");
		$prefix = $this->input->post("prefix");
		$firstname = $this->input->post("firstname");
		$lastname = $this->input->post("lastname");
		$years = $this->input->post("years");
		$department = $this->input->post("department");
		$faculty = $this->input->post("faculty");
		$position = $this->input->post("position");
		$university = $this->input->post("university");
		$maincontent = $this->input->post("maincontent");
		$hiddencontent = $this->input->post("hiddencontent");
		$conclusioncontent = $this->input->post("conclusioncontent");
		$tempID = $this->input->post("tempID");
*/
		//$firstname = "testname";
		//$topic = $this->input->post("topic");

		//upload images
		$config['upload_path']= './images/';
		$config['allowed_types'] = "jpg|gif|png";
		$config['max_size'] = 100000;
		$config['max_height'] = 2000;
		$config['max_width'] = 2000;

		$this->load->library("upload", $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload("picture")){ //ถ้าไม่มีปัญหา
			$data = $this->upload->data();
			print_r($data);

		}
		else{
			print_r("Cann't upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}

/*
		$file_data = $this->upload->data();
		$imagepath = $file_data['full_path'];
*/


		//$this->db->query("INSERT INTO question VALUES (null, '$topic', '$imagepath', 'prefix', '$firstname', 'lastname', 'years', 'department', 'faculty', 'position', 'university', 'maincontent', 'hiddencontent', 'conclusioncontent', 2);");
		

		
	}

}
?>