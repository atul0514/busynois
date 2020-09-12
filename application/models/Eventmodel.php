<?php
class eventmodel extends CI_Model{				
		
		

		function displayevents()
		{
			$this->db->select();
	        $this->db->order_by("eid", "desc");

			$query=$this->db->get('event');
			return $query->result();
		}

		function view_event($id)
		
		{

			$this->db->select();
			$this->db->where('eid',$id);
			$this->db->from('event');
	        
			
			$query=$this->db->get();
			return $query->row();

		}

	
}