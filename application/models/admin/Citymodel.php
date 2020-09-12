<?php
class citymodel extends CI_Model{				
		
		
	function displaycity()
		{
			$this->db->select('city.*, location.*');
			$this->db->from('city');
      		$this->db->join('location', 'city.lcid = location.id');
			$this->db->order_by('ctid', 'DESC');	
			$query=$this->db->get();
				
			return $query->result();
		}

	function displaylocation()
		{
			$this->db->select();
			$this->db->order_by('id', 'DESC');	
			$query=$this->db->get('location');					
			return $query->result();
		}

	function insert_city($data)
		{
		$query = $this->db->insert('city', $data);
		}

	function delete($id){

		$this->db->query("delete  from city where ctid='".$id."'");
	}

	function edit($id){

		$this->db->select();
	    $this->db->where("ctid", $id);
		$query=$this->db->get('city');
							
		return $query->row();
	}
	function update($data){

		$id=$this->input->post('id', TRUE);
		$this->db->where('ctid', $id);
		$this->db->update('city', $data);
	}

	function updatestatus($data){
		$id=$this->input->post('id', TRUE);
		$this->db->where('ctid', $id);
		$this->db->update('city', $data);
	}



}