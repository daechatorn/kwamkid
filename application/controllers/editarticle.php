<?php 
class editarticle extends CI_Controller{
	public function editarticle(){
		parent::__construct();
	}

	public function index(){
		$this->load->view("dash/headernavbar");

		$this->load->view("dash/article/editarticle");

	}

}
?>