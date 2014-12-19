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



}
?>