<?php

Class Teacher extends CI_Model {
		
	public function fetchall() {
		
		$this->db->select('a.id,a.name,b.name as designation,a.contact_num,a.emergency_num,a.email,a.nic,a.address,a.status');
		$this->db->from('sms_teachers AS a');
		$this->db->join('sms_designation AS b', 'a.designation = b.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function add($data){
		$this->db->insert('sms_teachers', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}
	
	public function update($data,$id){
		$this->db->where('id',$id);
		$this->db->update('sms_teachers',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('sms_teachers'); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function fetchbyid($id){
		$condition = "id=".$id;
		$this->db->select('*');
		$this->db->from('sms_teachers');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
}

?>