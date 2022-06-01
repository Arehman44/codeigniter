<?php
class Student extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library("form_validation");
		$this->load->library("session");
		$this->load->database();
		$this->load->model("student_model");
	}
	public function index()
	{
		//define the validation rules
		
		$this->form_validation->set_rules("name","Name","required|trim");
		$this->form_validation->set_rules("rollno","Rollno","required|trim");
		$this->form_validation->set_rules("class","Class","required|trim");
		if($this->form_validation->run()==true)
		{
			//collect the data and pass the model
			$name=$this->input->post("name");
			$rollno=$this->input->post("rollno");
			$class=$this->input->post("class");
			
			$data=array(
			"name"=>$name,
			"rollno"=>$rollno,
			"class"=>$class
			);
			$status=$this->student_model->saveStud($data);
			if($status==true)
			{
				$this->session->set_tempdata("success","Student Added Succssfully Done",2);
				redirect(current_url());
			}
			else
			{
				$this->session->set_tempdata("error","Student Unable to add",2);
				redirect(current_url());
			}
			
		}
		$this->load->view("add_student");
	}
	public function showstud()
	{
		$data["stud"]=$this->student_model->getStud();
		$this->load->view("show_student",$data);
	}
	public function editstudent($id)
	{
		//first of all get the data
		$data["get"]=$this->student_model->getRecord($id);
		//////////////////////////////////////////////////
		
		//define the validation rules
		
		$this->form_validation->set_rules("name","Name","required|trim");
		$this->form_validation->set_rules("rollno","Rollno","required|trim");
		$this->form_validation->set_rules("class","Class","required|trim");
		if($this->form_validation->run()==true)
		{
			//collect the data and pass the model
			$name=$this->input->post("name");
			$rollno=$this->input->post("rollno");
			$class=$this->input->post("class");
			
			$data=array(
			"name"=>$name,
			"rollno"=>$rollno,
			"class"=>$class
			);
			$status=$this->student_model->editstud($data,$id);
			if($status==true)
			{
				$this->session->set_tempdata("success","Student Updated Succssfully Done",2);
				redirect(current_url());
			}
			else
			{
				$this->session->set_tempdata("error","Student Unable to Update",2);
				redirect(current_url());
			}
			
		}
		$this->load->view("edit_student",$data);
	}
	public function deletestudent($id)
	{
		$status=$this->student_model->trashstud($id);
		if($status==true)
		{
			$this->session->set_tempdata("success","Student Updated Succssfully Done",2);
			redirect(base_url()."student/showstud");	
		}
	}
}
?>