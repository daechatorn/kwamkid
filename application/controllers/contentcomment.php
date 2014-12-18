<?php
class contentcomment extends CI_Controller{
	public function contentcomment(){
		parent::__construct();

	}
	public function index(){
		$data['temp'] = $this->db->select("boxColor")->from("template")->like("tempName","เหลือง")->get()->result();

		$this->load->view("contentcomment/commentview",$data);

	}

}
?>