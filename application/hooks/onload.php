<?php
class onload{
	private $ci;

	public function __construct(){
		$this->ci =& get_instance(); //property  ci รับคุณสมับัติของ CI เข้ามา


	}

	public function check_login(){

		$controller = $this->ci->router->class;
		$method = $this->ci->router->method;

		if($this->ci->session->userdata('login_id')==null){
			//echo "login";
			if($method != "login"){
				redirect("control/login","refresh");
				exit();
			}
		}
		
	}

}

?>