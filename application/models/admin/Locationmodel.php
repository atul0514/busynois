<?php
class locationmodel extends CI_Model{				
		
		
	function displaylocation()
		{
			$this->db->select();
			$this->db->order_by('id', 'DESC');	
			$query=$this->db->get('location');

							
			return $query->result();
		}

	function insert_location($data)
		{
		$query = $this->db->insert('location', $data);
		}

	function delete($id){

		$this->db->query("delete  from location where id='".$id."'");
	}

	function edit($id){

		$this->db->select();
	    $this->db->where("id", $id);
		$query=$this->db->get('location');
							
		return $query->row();
	}
	function update($data){

		$id=$this->input->post('id', TRUE);
		$this->db->where('id', $id);
		$this->db->update('location', $data);
	}

	function updatestatus($data){
		$id=$this->input->post('id', TRUE);
		$this->db->where('id', $id);
		$this->db->update('location', $data);
	}



}