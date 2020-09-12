<?php
class jobmodel extends CI_Model{				
		
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

		function insert($data)
		{
			$query = $this->db->insert('jobs', $data);
		}
		function displayjobs()
		{
			$this->db->select('jobs.*, jcategory.*,  jobtype.*, jcategory.*');
			$this->db->from('posts');
			$this->db->join('category', 'posts.cid = category.c_id');
			$this->db->where('slug',$id);
			
			$query=$this->db->get();
			return $query->row();




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

		function deletejobs($id)
		{
			$this->db->query("delete  from jobs where jid='".$id."'");
			}

		function edit_job($id)
		{
		$q = $this->db->select()
					->where('jid',$id)
					->get('jobs');
		return $q->row();
		}
		
		
		function update_job($data)
		{
		$id =$this->input->post('jid');
					
		$this->db->where('job_id',$id);
		return $this->db->update('jobs',$data);
		}

		function displayresume()
		{
			$this->db->select('jobs.*, jobapply.*');
			$this->db->from('jobapply');
			$this->db->join('jobs', 'jobs.job_id=jobapply.job');
	        $this->db->order_by("jid", "desc");

			$query=$this->db->get();
			return $query->result();
		}

		function delete_resume()
		{
			$id =$_REQUEST['jid'];
			$this->db->query("delete  from jobapply where jid='".$id."'");
			}

		function view_resume($id)
		{
		
		$q = $this->db->select()
					->where('jid',$id)
					->get('jobapply');
		return $q->row();
		}
}