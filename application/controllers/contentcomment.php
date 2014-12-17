<?php
class contentcomment extends CI_Controller{
	public function contentcomment(){
		parent::__construct();

	}
	public function index(){
		$temp = $this->db->select("boxColor")->from("template")->like("tempName","เหลือง")->get()->result_array();

		$this->load->view("contentcomment/commentview",$temp);

	}

}
?>