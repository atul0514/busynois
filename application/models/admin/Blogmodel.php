<?php
class blogmodel extends CI_Model{				
		
		

		function displaypost()
		{
			$this->db->select('posts.*, category.*');
			$this->db->from('posts');
			$this->db->join('category', 'posts.cid = category.c_id');
	        $this->db->order_by("pid", "desc");
			
			$query=$this->db->get();
			return $query->result();
		}

		function deletposts()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from posts where pid='".$id."'");
			}

			//save picture data to db
		function slug_count($slug){
		   $this->db->select('count(*) as slugcount');
		   $this->db->from('posts');
		   $this->db->where('slug', $slug);
		   $query = $this->db->get();
		   return $query->row(0)->slugcount;
		}


		function insert_post($data){
		
				$insert_data['p_title'] =$data['p_title'];
				$insert_data['cid'] =$data['cid'];
				$insert_data['slug'] =$data['slug'];
				$insert_data['p_description'] =$data['p_description'];
				$insert_data['p_img'] = $data['banner_image'];
				$insert_data['p_meta_title'] =$data['p_meta-title'];
				$insert_data['p_meta_desc'] =$data['p_meta-desc'];
				$insert_data['p_meta_keywords'] =$data['p_meta-keywords'];
				

		$query = $this->db->insert('posts', $insert_data);
	}

	function edit_post($id)
		{

		$this->db->select('posts.*, category.*');
			$this->db->from('posts');
			$this->db->join('category', 'posts.cid = category.c_id');
			$this->db->where('pid',$id);
	        
			
			$query=$this->db->get();
			return $query->row();
		}
		
		
	function update_post($data)
		{
		$id =$this->input->post('id');

		$insert_data['p_title'] =$data['p_title'];
		$insert_data['cid'] =$data['cid'];
		$insert_data['p_description'] =$data['p_description'];
		$insert_data['p_img'] = $data['banner_image'];
		$insert_data['p_meta_title'] =$data['p_meta-title'];
		$insert_data['p_meta_desc'] =$data['p_meta-desc'];
		$insert_data['p_meta_keywords'] =$data['p_meta-keywords'];
					
		$this->db->where('pid',$id);
		return $this->db->update('posts',$insert_data);
		}


		function displaycat()
		{
			$this->db->select();
	        $this->db->order_by("c_id", "desc");

			$query=$this->db->get('category');
							
			return $query->result();
		}

		function deletecat()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from category where c_id='".$id."'");
			}


		function insert_cat($data)
		{
			$query = $this->db->insert('category', $data);
		}

		function edit_cat($id)
		{

			$this->db->select();
			$this->db->from('category');
			$this->db->where('c_id',$id);
	        
			
			$query=$this->db->get();
			return $query->row();
		}

		function update_cat($data)
		{
			$id =$this->input->post('cid');
					
		$this->db->where('c_id',$id);
		return $this->db->update('category',$data);
		}
		
	
}