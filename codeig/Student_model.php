<?php
class Student_model extends CI_Model
{
	public function saveStud($data)
	{
		$this->db->insert("student",$data);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function getStud()
	{
		$res=$this->db->get("student");
		if($res->num_rows()>0)
		{
			return $res->result();
		}
		else
		{
			return false;
		}
	}
	public function getRecord($id)
	{
		$this->db->where("id",$id);
		$res=$this->db->get("student");
		if($res->num_rows()>0)
		{
			return $res->row();
		}
		else
		{
			return false;
		}
	}
	public function editstud($data,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("student",$data);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function trashstud($id)
	{
		$this->db->delete("student",array("id"=>$id));
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>