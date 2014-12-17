<?php
class testlogin extends CI_Controller{
	public function testlogin(){
		parent::__construct();

	}	
	public function index(){
		$this->load->view("loginview");

	}

}
?>