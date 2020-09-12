<?php
class Jobtypemodel extends CI_Model{				
		
		
	function displayjob()
		{
			$this->db->select();
			$this->db->order_by('jtid', 'DESC');	
			$query=$this->db->get('jobtype');
							
			return $query->result();
		}

	function insert_job($data)
		{
		$query = $this->db->insert('jobtype', $data);
		}

	function delete($id){

		$this->db->query("delete  from jobtype where jtid='".$id."'");
	}

	function edit($id){

		$this->db->select();
	    $this->db->where("jtid", $id);
		$query=$this->db->get('jobtype');
							
		return $query->row();
	}
	function update($data){

		$id=$this->input->post('id', TRUE);
		$this->db->where('jtid', $id);
		$this->db->update('jobtype', $data);
	}

	function updatestatus($data){
		$id=$this->input->post('id', TRUE);
		$this->db->where('jtid', $id);
		$this->db->update('jobtype', $data);
	}



}