<?php
class pagesmodel extends CI_Model{				
		
		

		function display()
		{
			$this->db->select();
	        $this->db->order_by("pid", "desc");
			
			$query=$this->db->get('pages');
			return $query->result();
		}

		function delete($id)
			{
			
			$this->db->query("delete  from pages where pid='".$id."'");
			}

		function slug_count($slug){
		   $this->db->select('count(*) as slugcount');
		   $this->db->from('pagess');
		   $this->db->where('slug', $slug);
		   $query = $this->db->get();
		   return $query->row(0)->slugcount;
		}


		function insert($data){
		
				$insert_data['p_title'] =$data['p_title'];
				$insert_data['slug'] =$data['slug'];
				$insert_data['p_description'] =$data['p_description'];
				$insert_data['banner_image'] = $data['banner_image'];
				$insert_data['p_meta_title'] =$data['p_meta-title'];
				$insert_data['p_meta_desc'] =$data['p_meta-desc'];
				$insert_data['p_meta_keywords'] =$data['p_meta-keywords'];
				
		$query = $this->db->insert('pages', $insert_data);
	}

	function edit($id)
		{

			$this->db->select();
			$this->db->where('pid',$id);
	        
			$query=$this->db->get('pages');
			return $query->row();
		}
		
		
	function update($data)
		{
		$id =$this->input->post('id');

		$insert_data['p_title'] =$data['p_title'];
		$insert_data['p_description'] =$data['p_description'];
		$insert_data['banner_image'] = $data['banner_image'];
		$insert_data['p_meta_title'] =$data['p_meta-title'];
		$insert_data['p_meta_desc'] =$data['p_meta-desc'];
		$insert_data['p_meta_keywords'] =$data['p_meta-keywords'];
					
		$this->db->where('pid',$id);
		return $this->db->update('pages',$insert_data);
		}
	}