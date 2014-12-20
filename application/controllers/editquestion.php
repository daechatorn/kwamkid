<?php
class editquestion extends CI_Controller{
	public function editquestion(){
		parent::__construct();
	}
	public function index(){
		$data['tempval'] = $this->db->select("*")->from("template")->get()->result_array();

		$this->load->view("dash/headernavbar");

		$this->load->view("dash/edit/editquestion",$data);
	}

	public function searchbytopic(){
		$searchval = $this->input->post("searchval");
		$result = $this->db->select("*")->from('question')->join('template','question.tempID = template.tempID')->like('topic',$searchval)->get()->result_array();
		echo json_encode($result);
	}

	public function getQuestion(){
		$qID = $this->input->post("qID");
		$result = $this->db->select("*")->from('question')->join('template','question.tempID = template.tempID')->where('qID',$qID)->get()->result_array();
		echo json_encode($result);
	}

	public function edit(){
		$qID = $this->input->post("qID");
		$topic = $this->input->post("topic");
		$prefix = $this->input->post("prefix");
		$firstname = $this->input->post("firstname");
		$lastname = $this->input->post("lastname");
		$years = $this->input->post("years");
		$department = $this->input->post("dept");
		$faculty = $this->input->post("faculty");
		$position = $this->input->post("position");
		$university = $this->input->post("university");
		$maincontent = $this->input->post("maincontent");
		$hiddencontent = $this->input->post("hiddencontent");
		$conclusioncontent = $this->input->post("conclusioncontent");
		$videopath = $this->input->post("videopath");
		$tempID = $this->input->post("tempID");

		$data = array(
               'topic' => $topic,
               'prefix' => $prefix,
               'firstname' => $firstname,
               'lastname' => $lastname,
               'years' => $years,
               'department' => $department,
               'faculty' => $faculty,
               'position' => $position,
               'university' => $university,
               'maincontent' => $maincontent,
               'hiddencontent' => $hiddencontent,
               'conclusioncontent' => $conclusioncontent,
               'videopath' => $videopath,
               'tempID' => $tempID,
            );
		$this->db->where('qID', $qID);
		$this->db->update('question', $data); 

	}


}
?>