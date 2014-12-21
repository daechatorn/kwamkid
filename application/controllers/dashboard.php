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
		
		
		$data['topic'] = $this->db->query("SELECT * FROM question ORDER By topic asc;")->result_array();


		$this->load->view("dash/overview/overview",$data);
	}

	public function delete(){

		$ar = $this->input->post("commentid");

		for($i=0;$i<sizeof($ar);$i++){
			$this->db->delete("comment",array("cID"=>$ar[$i]));
		}

		echo json_encode("Finished");
	}

	public function export(){
		//$this->load->view("export/pdfview");
		$this->load->database();


			$qID = $this->input->post("qID");
			$datefrom = $this->input->post("datefrom");
			$dateto = $this->input->post("dateto");
			$datecheck = "notchoose";
			$query = "";
			if($dateto != "" && $datefrom != ""){$datecheck="choose";}


			if($datecheck == "choose" && $qID == "notchoose"){
				$query = $this->db->query("SELECT detail, topic, c.firstname || ' ' || c.lastname as respondents, date, time   FROM comment c INNER JOIN question q ON c.qID = q.qID WHERE date >= '$datefrom' && date <= '$dateto'");
			}
			else if($datecheck == "notchoose" && $qID != "notchoose"){
				$query = $this->db->query("SELECT detail, topic, c.firstname || ' ' || c.lastname as respondents, date, time   FROM comment c INNER JOIN question q ON c.qID = q.qID WHERE c.qID = $qID");
			}
			else if($datecheck == "choose" && $qID != "notchoose"){
				$query = $this->db->query("SELECT detail, topic, c.firstname || ' ' || c.lastname as respondents, date, time   FROM comment c INNER JOIN question q ON c.qID = q.qID WHERE (date >= '$datefrom' && date <= '$dateto') and (c.qID = $qID)");
			}
			else{
				$query = $this->db->query("SELECT detail, topic, c.firstname || ' ' || c.lastname as respondents, date, time   FROM comment c INNER JOIN question q ON c.qID = q.qID");
			}

            


            $this->load->helper('csv');

            
            
            echo query_to_csv($query, TRUE, 'Report.csv');


            if($this->session->userdata('FailExport') == ""){
            	$this->session->set_userdata(array("FailExport"=>"Data Export not founded"));
            }
            
			exit();

			

	}

}
?>