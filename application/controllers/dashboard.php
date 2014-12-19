<?php 
class dashboard extends CI_Controller{
	public function dashboard(){
		parent::__construct();
	}

	public function index(){

		$this->load->view("dash/headernavbar");
		
		$this->load->view("dash/overview/overview");
	}

}
?>