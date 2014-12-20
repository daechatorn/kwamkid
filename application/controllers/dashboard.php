<?php 
class dashboard extends CI_Controller{
	public function dashboard(){
		parent::__construct();
	}

	public function index(){

		$this->load->view("dash/headernavbar");
		

	
		//pagination
			$config['base_url'] = base_url()."index.php/dashboard/index";
			$config['per_page'] = 5;
			//count_all(); -> count data in table
			$counttable = $this->db->count_all('comment');
			$config['total_rows'] = $counttable;


			

			//out side
			$config['full_tag_open'] = "<ul class='pagination'>";
				
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';

   				$config['last_tag_open'] = '<li>';
   				$config['last_tag_close'] = '</li>';

				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';

				//current page
				$config['cur_tag_open'] = "<li class='active'><a>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				
				//another page
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";

				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';

			$config['full_tag_close'] = "</ul";

			$this->pagination->initialize($config);


		$data['comment'] = $this->db->select('*')->from('question')->join('comment','question.qID = comment.qID')->limit($config['per_page'],end($this->uri->segments))->get()->result_array();
		
	


		$this->load->view("dash/overview/overview",$data);
	}

	public function delete(){

		$ar = $this->input->post("commentid");

		for($i=0;$i<sizeof($ar);$i++){
			$this->db->delete("comment",array("cID"=>$ar[$i]));
		}

		echo json_encode("Finished");
	}

}
?>