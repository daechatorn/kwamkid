<?php
class addquestion extends CI_Controller{
	public function addquestion(){
		parent::__construct();

	}
	public function index(){
		$this->load->view("add/addquestionview");

	}

}
?>