<?php 
class editarticle extends CI_Controller{
	public function editarticle(){
		parent::__construct();
	}

	public function index(){
		$this->load->view("dash/headernavbar");

		$this->load->view("dash/article/editarticle");

	}

	public function search(){

		$searchval = $this->input->post("searchval");
		$result = $this->db->select("*")->from('article')->like('shorttopic',$searchval)->get()->result_array();
		echo json_encode($result);
	}

	public function getArticle(){
		$aID = $this->input->post("aID");
		$result = $this->db->select("*")->from('article')->where('articleID',$aID)->get()->result_array();
		echo json_encode($result);

	}

	public function edit(){
		$writer = $this->input->post("writer");
		$shorttopic = $this->input->post("shorttopic");
		$fulltopic = $this->input->post("fulltopic");
		$paragraph1 = $this->input->post("paragraph1");
		$paragraph2 = $this->input->post("paragraph2");
		$paragraph3 = $this->input->post("paragraph3");

		$aID = $this->input->post("aID");

		//print_r($writer.", ".$shorttopic.", ".$fulltopic.", ".$paragraph1.", ".$paragraph2.", ".$paragraph3);

		$data['getoldpathpicture'] = $this->db->select("*")->from('article')->where('articleID',$aID)->get()->row_array();
		$topicupload = $data['getoldpathpicture']['topicimage']; //old name of topic picture
		$para1upload = $data['getoldpathpicture']['paragraph1image']; //old name if para1 picture
		$para2upload = $data['getoldpathpicture']['paragraph2image']; //old name if para1 picture
		$para3upload = $data['getoldpathpicture']['paragraph3image']; //old name if para1 picture
		//print_r($topicupload.", ".$para1upload.", ".$para2upload.", ".$para3upload);

		
		$this->load->library("upload");
		
		$topicimage = $_FILES['topicimage']['name'];//get name of topic upload file
		$para1image = $_FILES['paragraph1image']['name'];//get name of para1 upload file
		$para2image = $_FILES['paragraph2image']['name'];//get name of para2 upload file
		$para3image = $_FILES['paragraph3image']['name'];//get name of para3 upload file
		//print_r($topicimage.", ".$para1image.", ".$para2image.", ".$para3image);

		//topic
		if($topicimage!="" && $para1image == "" && $para2image == "" && $para3image == ""){
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
			
		}
		//para1
		elseif ($topicimage=="" && $para1image != "" && $para2image == "" && $para3image == "") {
			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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
			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
		//para2
		elseif ($topicimage=="" && $para1image == "" && $para2image != "" && $para3image == "") {
			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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
			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
		//para3
		elseif ($topicimage=="" && $para1image == "" && $para2image == "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}
			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph3image' => $para3path,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
		elseif ($topicimage!="" && $para1image != "" && $para2image == "" && $para3image == "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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
			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 

		}
		elseif ($topicimage!="" && $para1image == "" && $para2image != "" && $para3image == "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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
			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 

		}
		elseif ($topicimage!="" && $para1image == "" && $para2image == "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}
			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
		elseif ($topicimage=="" && $para1image != "" && $para2image != "" && $para3image == "") {
			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
		elseif ($topicimage=="" && $para1image != "" && $para2image == "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
		elseif ($topicimage=="" && $para1image == "" && $para2image != "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 

		}
		elseif ($topicimage!="" && $para1image != "" && $para2image != "" && $para3image == "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 

		}
		elseif ($topicimage!="" && $para1image == "" && $para2image != "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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
			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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


			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 


		}
		elseif ($topicimage=="" && $para1image != "" && $para2image != "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 


		}
		elseif ($topicimage!="" && $para1image != "" && $para2image == "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 


		}
		elseif ($topicimage!="" && $para1image != "" && $para2image != "" && $para3image != "") {
			array_map('unlink', glob("images/article/".$topicimage));

			//upload profile
			$config['upload_path']= 'images/article/';
			$config['allowed_types'] = "jpg|gif|png";
			$config['max_size'] = 100000;
			$config['file_name'] = "article_topic_".$writer;

			
			$this->upload->initialize($config);

			$topicpath = "";
			if($this->upload->do_upload("topicimage")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para1image));

			//upload profile
			$config2['upload_path']= 'images/article/';
			$config2['allowed_types'] = "jpg|gif|png";
			$config2['max_size'] = 100000;
			$config2['file_name'] = "article_paragraph1_".$writer;

			
			$this->upload->initialize($config2);

			$para1path = "";
			if($this->upload->do_upload("paragraph1image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para2image));

			//upload profile
			$config3['upload_path']= 'images/article/';
			$config3['allowed_types'] = "jpg|gif|png";
			$config3['max_size'] = 100000;
			$config3['file_name'] = "article_paragraph2_".$writer;

			
			$this->upload->initialize($config3);

			$para2path = "";
			if($this->upload->do_upload("paragraph2image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

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

			array_map('unlink', glob("images/article/".$para3image));

			//upload profile
			$config4['upload_path']= 'images/article/';
			$config4['allowed_types'] = "jpg|gif|png";
			$config4['max_size'] = 100000;
			$config4['file_name'] = "article_paragraph3_".$writer;

			
			$this->upload->initialize($config4);

			$para3path = "";
			if($this->upload->do_upload("paragraph3image")){ //ถ้าอัพโปรไฟล์ไม่มีปัญหา

						$config3['image_library'] = 'gd2';
	                    $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	                    
	                    $config3['maintain_ratio'] = FALSE;
	                    $config3['width'] = 500;
	                    $config3['height'] = 300;
	                    $this->load->library('image_lib',$config4); 
	                    $this->image_lib->resize();


				$data = $this->upload->data();
				
				$para3path = $data['file_name'];

			}

			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'topicimage' => $topicpath,
               'writer' => $writer,
               'paragraph1image' => $para1path,
               'paragraph1' => $paragraph1,
               'paragraph2image' => $para2path,
               'paragraph2' => $paragraph2,
               'paragraph3image' => $para3path,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 


		}
		else{
			$data = array(
               'shorttopic' => $shorttopic,
               'fulltopic' => $fulltopic,
               'writer' => $writer,
               'paragraph1' => $paragraph1,
               'paragraph2' => $paragraph2,
               'paragraph3' => $paragraph3,
            );
            
			$this->db->where('articleID', $aID);
			$this->db->update('article', $data); 
		}
	}


	

}
?>