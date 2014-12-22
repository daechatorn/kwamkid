<?php
class control extends CI_Controller{
	public function index(){
		echo "notlogin";
	}
	public function login(){

		if($this->input->post("bt")!=null){
			//$this->session->set_userdata(array("login_id"=>"01"));
			$data['getuserdata'] = $this->db->select("*")->from('usertable')->where("username",$this->input->post("username"))->where("password",$this->input->post("password"))->get()->row_array();
			if($data['getuserdata']!=null){
				$user = $data['getuserdata']['username']; //username
				$this->session->set_userdata(array("login_id"=>"$user"));
				redirect("dashboard");
				exit();
			}
			else{
				echo "<font color='red'>username or password falsed</font>";
				$this->load->view("dash/login");
			}
			
		}
		else{
			$this->load->view("dash/login");
		}
		
		
	}

	public function logout(){
		$this->session->unset_userdata("login_id");
		$this->load->view("dash/login");

	}

}
?>