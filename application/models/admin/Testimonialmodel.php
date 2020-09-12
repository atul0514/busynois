<?php
class testimonialmodel extends CI_Model{				
		
		

		function displaytestimonial()
		{
			$this->db->select();
	        $this->db->order_by("id", "desc");

			$query=$this->db->get('testimonials');
			return $query->result();
		}

		function delettestimonial()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from testimonials where id='".$id."'");
			}

			//save picture data to db
		function store_testi_data($data){
		

		$insert_data['name'] = $data['name'];
		$insert_data['testimonial'] = $data['testimonial'];
		$insert_data['image'] = $data['banner_image'];

		$query = $this->db->insert('testimonials', $insert_data);
	}
	
		function edit_testi($id)
		{
		$q = $this->db->select()
					->where('id',$id)
					->get('testimonials');
		return $q->row();
		}

		function update_testi($data)
		{
		$id =$this->input->post('id');

		$insert_data['name'] = $data['name'];
		$insert_data['testimonial'] = $data['testimonial'];
		$insert_data['image'] = $data['banner_image'];
					
		$this->db->where('id',$id);
		return $this->db->update('testimonials',$insert_data);
		}


}