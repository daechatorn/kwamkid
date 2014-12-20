<?php
class editquestion extends CI_Controller{
	public function editquestion(){
		parent::__construct();
	}
	public function index(){
		$data['tempval'] = $this->db->select("*")->from("template")->get()->result_array();

		$this->load->view("dash/headernavbar");

		$this->load->view("dash/edit/editquestion",$data);
	}

	public function searchbytopic(){
		$searchval = $this->input->post("searchval");
		$result = $this->db->select("*")->from('question')->join('template','question.tempID = template.tempID')->like('topic',$searchval)->get()->result_array();
		echo json_encode($result);
	}

	public function getQuestion(){
		$qID = $this->input->post("qID");
		$result = $this->db->select("*")->from('question')->join('template','question.tempID = template.tempID')->where('qID',$qID)->get()->result_array();
		echo json_encode($result);
	}

	public function edit(){

		$qID = $this->input->post("qID");
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
		$videopath = $this->input->post("videopath");
		$tempID = $this->input->post("tempID");

		$data['getoldpathpicture'] = $this->db->select("*")->from('question')->where('qID',$qID)->get()->row_array();
		$profileupload = $data['getoldpathpicture']['profileupload']; //old name of profile picture
		$imageupload = $data['getoldpathpicture']['imageupload']; //old name if bg picture

		$this->load->library("upload");
		
		$newprofile = $_FILES['profile']['name'];//get name of profile upload file
		$newbg = $_FILES['picture']['name'];//get name of profile upload file

		if($newprofile != "" && $newbg == ""){ //มีโปรไฟล์ ไม่มี บีจี
			
			array_map('unlink', glob("images/profile/".$profileupload)); //ลบรูปโปรไฟล์เก่าทิ้ง

			//upload profile
			$config['upload_path']= 'images/profile/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "profile_".$firstname.$lastname;

			
			$this->upload->initialize($config);

			$profilepath = "";
			if($this->upload->do_upload("profile")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config['image_library'] = 'gd2';
	                    $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config['maintain_ratio'] = FALSE;
	                    $config['width'] = 400;
	                    $config['height'] = 400;
	                    $this->load->library('image_lib',$config); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$profilepath = $data['file_name'];

			}

			$data = array(
               'topic' => $topic,
               'profileupload' => $profilepath,
               'prefix' => $prefix,
               'firstname' => $firstname,
               'lastname' => $lastname,
               'years' => $years,
               'department' => $department,
               'faculty' => $faculty,
               'position' => $position,
               'university' => $university,
               'maincontent' => $maincontent,
               'hiddencontent' => $hiddencontent,
               'conclusioncontent' => $conclusioncontent,
               'videopath' => $videopath,
               'tempID' => $tempID,
            );
            
			$this->db->where('qID', $qID);
			$this->db->update('question', $data); 
			
	
			print_r($profilepath);


		}

		else if($newprofile == "" && $newbg != ""){ //มีบีจี ไม่มีโปรไฟล์
			
			array_map('unlink', glob("images/".$imageupload)); //ลบรูปBGเก่าทิ้ง

			//upload BG
			$config['upload_path']= 'images/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = $firstname.$lastname;

			
			$this->upload->initialize($config);

			$imagepath = "";
			if($this->upload->do_upload("picture")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			$data = array(
               'topic' => $topic,
               'imageupload' => $imagepath,
               'prefix' => $prefix,
               'firstname' => $firstname,
               'lastname' => $lastname,
               'years' => $years,
               'department' => $department,
               'faculty' => $faculty,
               'position' => $position,
               'university' => $university,
               'maincontent' => $maincontent,
               'hiddencontent' => $hiddencontent,
               'conclusioncontent' => $conclusioncontent,
               'videopath' => $videopath,
               'tempID' => $tempID,
            );
            
			$this->db->where('qID', $qID);
			$this->db->update('question', $data); 
			
	
			print_r($imagepath);


		}

		else if($newprofile != "" && $newbg != ""){ //มีบีจี มีโปรไฟล์
			array_map('unlink', glob("images/profile/".$profileupload)); //del old profile
			array_map('unlink', glob("images/".$imageupload)); //ลบรูปBGเก่าทิ้ง

			//upload BG
			$config['upload_path']= 'images/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = $firstname.$lastname;

			
			$this->upload->initialize($config);

			$imagepath = "";
			if($this->upload->do_upload("picture")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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


			//upload profile
			$config2['upload_path']= 'images/profile/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "profile_".$firstname.$lastname;

			
			$this->upload->initialize($config2);

			$profilepath = "";
			if($this->upload->do_upload("profile")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config2['image_library'] = 'gd2';
	                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config2['maintain_ratio'] = FALSE;
	                    $config2['width'] = 400;
	                    $config2['height'] = 400;
	                    $this->load->library('image_lib',$config2); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$profilepath = $data['file_name'];

			}

			$data = array(
               'topic' => $topic,
               'profileupload' => $profileupload, 
               'imageupload' => $imagepath,
               'prefix' => $prefix,
               'firstname' => $firstname,
               'lastname' => $lastname,
               'years' => $years,
               'department' => $department,
               'faculty' => $faculty,
               'position' => $position,
               'university' => $university,
               'maincontent' => $maincontent,
               'hiddencontent' => $hiddencontent,
               'conclusioncontent' => $conclusioncontent,
               'videopath' => $videopath,
               'tempID' => $tempID,
            );
            
			$this->db->where('qID', $qID);
			$this->db->update('question', $data); 
			
	
			print_r($imagepath.", ".$profilepath);


		}







		else{//ไม่มีรูป
			$data = array(
               'topic' => $topic,
               'prefix' => $prefix,
               'firstname' => $firstname,
               'lastname' => $lastname,
               'years' => $years,
               'department' => $department,
               'faculty' => $faculty,
               'position' => $position,
               'university' => $university,
               'maincontent' => $maincontent,
               'hiddencontent' => $hiddencontent,
               'conclusioncontent' => $conclusioncontent,
               'videopath' => $videopath,
               'tempID' => $tempID,
            );
            
			$this->db->where('qID', $qID);
			$this->db->update('question', $data); 

			print_r("ไม่มีรูป");
		}
		
		//print_r($_FILES['profile']['name']);
		
		//array_map('unlink', glob("images/profile/test.JPG")); //ลบรูปเก่า
		
		
	}




	


}
?>