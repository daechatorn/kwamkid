<?php
class contentcomment extends CI_Controller{
	public function contentcomment(){
		parent::__construct();

	}
	public function index(){
		$this->load->view("contentcomment/commentview");

	}

}
?>