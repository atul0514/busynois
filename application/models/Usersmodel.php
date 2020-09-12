<?php
class Usersmodel extends CI_Model{

		

		function insertcontact($data){
            $this->db->insert('contactenquiry', $data);
        
        }
		

		function webdetails(){
           $query=$this->db->query("select * from webinfo");
							
			return $query->result();
        }

        

        function subscription($data){

        	$this->db->insert('subscription', $data);
        }
		
        function displaytestimonial()
		{
			$this->db->select();
	        $this->db->order_by("id", "desc");

			$query=$this->db->get('testimonials');
			return $query->result();
		}

		function displaypost()
		{
			$this->db->select();
	        $this->db->order_by("pid", "desc");
			$this->db->limit("10");
			$query=$this->db->get('posts');
							
			return $query->result();
		}

		function view($id)
		{

			$this->db->select();
			$this->db->where('slug',$id);
	        
			$query=$this->db->get('pages');
			return $query->row();
		}

		function page()
		{

			$this->db->select();
	        
			$query=$this->db->get('pages');
			return $query->result();
		}

		function catjobs($id)
		{

			$this->db->select('location.*, jobs.*');
			$this->db->from('location');
			$this->db->join('jobs', 'location.id = jobs.loc');
			$this->db->where("slug", "$id");
			$this->db->where("Jrole", "employer");
	        $this->db->order_by("jid", "desc");
			
			$query=$this->db->get();
			return $query->result();
		}

		function jobs()
		{

			$this->db->select('location.*, jobs.*');
			$this->db->from('location');
			$this->db->join('jobs', 'location.id = jobs.loc');
			$this->db->where("Jrole", "employer");
	        $this->db->order_by("jid", "desc");
			
			$query=$this->db->get();
			return $query->result();
		}

		function jobinfo($id){

			$this->db->select();
			$this->db->where('jslug',$id);
			$query=$this->db->get('jobs');
			return $query->row();
		}

		function catresumes ($id)
		{

			$this->db->select('location.*, jobs.*');
			$this->db->from('location');
			$this->db->join('jobs', 'location.id = jobs.loc');
			$this->db->where("slug", "$id");
			$this->db->where("Jrole", "job Seeker");
	        $this->db->order_by("jid", "desc");
			
			$query=$this->db->get();
			return $query->result();
		}

		function resumes()
		{

			$this->db->select('location.*, jobs.*');
			$this->db->from('location');
			$this->db->join('jobs', 'location.id = jobs.loc');
			$this->db->where("Jrole", "job Seeker");
	        $this->db->order_by("jid", "desc");
			
			$query=$this->db->get();
			return $query->result();
		}
}?>