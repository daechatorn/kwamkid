<?php
class addarticle extends CI_Controller{
	public function addarticle(){
		parent::__construct();

	}

	public function index(){
		$this->load->view("dash/headernavbar");

		$this->load->view("dash/article/addarticle");

	}


	public function add(){

		$shorttopic = $this->input->post("shorttopic");
		$fulltopic = $this->input->post("fulltopic");
		$topicimage = $this->input->post("topicimage");
		$writer = $this->input->post("writer");

		$paragraph1image = $this->input->post("paragraph1image");
		$paragraph1 = $this->input->post("paragraph1");

		$paragraph2image = $this->input->post("paragraph2image");
		$paragraph2 = $this->input->post("paragraph2");

		$paragraph3image = $this->input->post("paragraph3image");
		$paragraph3 = $this->input->post("paragraph3");		


		//upload topic image
		$config['upload_path']= 'images/article/';
		$config['allowed_types'] = "jpg|gif|png";
		$config['max_size'] = 100000;
		$config['file_name'] = "article_topic_".$writer;

		$this->load->library("upload");
		$this->upload->initialize($config);

		$topicpath = "";		

		if($this->upload->do_upload("topicimage")){ //ถ้าไม่มีปัญหา

					$config['image_library'] = 'gd2';
                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 300;
                    $config['height'] = 170;
                    $this->load->library('image_lib',$config); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$topicpath = $data['file_name'];

		}
		else{
			print_r("Cann't background upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}


		//upload para1 image
		$config2['upload_path']= 'images/article/';
		$config2['allowed_types'] = "jpg|gif|png";
		$config2['max_size'] = 100000;
		$config2['file_name'] = "article_paragraph1_".$writer;

		$this->load->library("upload");
		$this->upload->initialize($config2);

		$para1path = "";		

		if($this->upload->do_upload("paragraph1image")){ //ถ้าไม่มีปัญหา

					$config2['image_library'] = 'gd2';
                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    
                    $config2['maintain_ratio'] = FALSE;
                    $config2['width'] = 500;
                    $config2['height'] = 300;
                    $this->load->library('image_lib',$config2); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$para1path = $data['file_name'];

		}
		else{
			print_r("Cann't background upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}


		//upload para2 image
		$config3['upload_path']= 'images/article/';
		$config3['allowed_types'] = "jpg|gif|png";
		$config3['max_size'] = 100000;
		$config3['file_name'] = "article_paragraph2_".$writer;

		$this->load->library("upload");
		$this->upload->initialize($config3);

		$para2path = "";		

		if($this->upload->do_upload("paragraph2image")){ //ถ้าไม่มีปัญหา

					$config3['image_library'] = 'gd2';
                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    
                    $config3['maintain_ratio'] = FALSE;
                    $config3['width'] = 500;
                    $config3['height'] = 300;
                    $this->load->library('image_lib',$config3); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$para2path = $data['file_name'];

		}
		else{
			print_r("Cann't background upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}


		//upload para3 image
		$config4['upload_path']= 'images/article/';
		$config4['allowed_types'] = "jpg|gif|png";
		$config4['max_size'] = 100000;
		$config4['file_name'] = "article_paragraph3_".$writer;

		$this->load->library("upload");
		$this->upload->initialize($config4);

		$para3path = "";		

		if($this->upload->do_upload("paragraph3image")){ //ถ้าไม่มีปัญหา

					$config4['image_library'] = 'gd2';
                    $config4['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    
                    $config4['maintain_ratio'] = FALSE;
                    $config4['width'] = 500;
                    $config4['height'] = 300;
                    $this->load->library('image_lib',$config4); 
                    $this->image_lib->resize();


			$data = $this->upload->data();
			
			$para3path = $data['file_name'];

		}
		else{
			print_r("Cann't background upload".$this->upload->display_errors()."<br>".$config['upload_path']);
		}


		$this->db->query("INSERT INTO article VALUES (null, '$shorttopic', '$fulltopic', '$topicpath', '$writer', '$para1path', '$paragraph1', '$para2path', '$paragraph2', '$para3path', '$paragraph3'  )");

	
	}

}
?>