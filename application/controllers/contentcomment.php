<?php
class contentcomment extends CI_Controller{
	public function contentcomment(){
		parent::__construct();

	}
	public function index(){
		$qID = 48;//$this->input->post("qID");
		//$data['temp'] = $this->db->select("boxColor")->from("template")->like("tempName","เหลือง")->get()->result();
		$data['contentvalue'] = $this->db->select("*")->from('question')->join('template','question.tempID = template.tempID')->where('qID',$qID)->get()->result();

		$this->load->view("contentcomment/commentview",$data);

	}

	

}
?>