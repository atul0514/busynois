<?php
class Jobcatmodel extends CI_Model{				
		
		
	function displayjcat()
		{
			$this->db->select();
			$this->db->order_by('cid', 'DESC');	
			$query=$this->db->get('jcategory');

							
			return $query->result();
		}

	function insert_jcat($data)
		{
		$query = $this->db->insert('jcategory', $data);
		}

	function delete($id){

		$this->db->query("delete  from jcategory where cid='".$id."'");
	}

	function edit($id){

		$this->db->select();
	    $this->db->where("cid", $id);
		$query=$this->db->get('jcategory');
							
		return $query->row();
	}
	function update($data){

		$id=$this->input->post('id', TRUE);
		$this->db->where('cid', $id);
		$this->db->update('jcategory', $data);
	}

	function updatestatus($data){
		$id=$this->input->post('id', TRUE);
		$this->db->where('cid', $id);
		$this->db->update('jcategory', $data);
	}



}