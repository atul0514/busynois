<?php
class blogmodel extends CI_Model{				
		
		function post_count()
		{
			return $this->db->count_all("posts");
		}

		function displaypost($limit, $start)
		{
			$this->db->select();
	        $this->db->order_by("pid", "desc");
	        $this->db->limit($limit, $start);
			$query=$this->db->get('posts');
							
			return $query->result();
		}

		function recentpost()
		{
			$this->db->select();
	        $this->db->order_by("pid", "desc");
	        $this->db->limit(5);

			$query=$this->db->get('posts');
							
			return $query->result();
		}
		
		function view_post($id)		
		{			
			$this->db->select('posts.*, category.*');
			$this->db->from('posts');
			$this->db->join('category', 'posts.cid = category.c_id');
			$this->db->where('slug',$id);
	        
			
			$query=$this->db->get();
			return $query->row();
		}

		function categorypost($limit, $start)
		{
			$id = $id=$this->uri->segment(3);

			$this->db->select();
			$this->db->where("cname", $id);
	        $this->db->order_by("pid", "desc");
	        $this->db->limit($limit, $start);
			$query=$this->db->get('posts');
							
			return $query->result();
		}

		function catpost_count()
		{	
			$id = $id=$this->uri->segment(3);
			$this->db->select();
	        $this->db->where("cname", $id);
			$query=$this->db->get('posts');
							
			return $query->num_rows();
		}


		function displaycategory()
		{
			
			$this->db->select();
	        $this->db->order_by("c_id", "desc");
			$query=$this->db->get('category');
							
			return $query->result();
		}

}