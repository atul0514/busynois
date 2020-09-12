<?php
class jobsmodel extends CI_Model{				
		
		function fcity($postData)
    	{
	      $response = array();
	   
	      // Select record
	      $this->db->select();
	      $this->db->where('lcid', $postData['pid']);
	      $this->db->order_by("ctid", "desc");
	      $q = $this->db->get('city');
	      $response = $q->result_array();

	      return $response;
    	}


		function displayjobs()
		{
			$this->db->select();
	        $this->db->order_by("jid", "desc");
			$this->db->where("Jrole", "employer");
			$query=$this->db->get('jobs');
			return $query->result();
		}

		function displayresumes()
		{
			$this->db->select();
	        $this->db->order_by("jid", "desc");
			$this->db->where("Jrole", "job Seeker");
			$query=$this->db->get('jobs');
			return $query->result();
		}

		function displayjbtype()
		{
			$this->db->select();
			$this->db->order_by('jtid', 'DESC');	
			$query=$this->db->get('jobtype');
							
			return $query->result();
		}
		
		function displaylocation()
		{
			$this->db->select();
			$this->db->order_by('id', 'DESC');	
			$query=$this->db->get('location');

							
			return $query->result();
		}

		
		function displayjcat()
		{
			$this->db->select();
			$this->db->order_by('cid', 'DESC');	
			$query=$this->db->get('jcategory');

							
			return $query->result();
		}



		function insert($data)
		{
			$query = $this->db->insert('jobs', $data);
		}

	
}