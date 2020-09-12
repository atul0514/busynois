<?php
class servicesmodel extends CI_Model{				

		function displayservice()
		{
			$this->db->select();
	        $this->db->order_by("sid", "desc");

			$query=$this->db->get('service');				
			return $query->result();
		}
		function viewservice()
		{
			$this->db->select();
	        $this->db->order_by("s_id", "desc");

			$query=$this->db->get('serviceindi');				
			return $query->result();
		}

		function delete()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from service where sid='".$id."'");
			}

		function deletindi()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from serviceindi where s_id='".$id."'");
			}

			//save data to db
	
		function insert_service($data){
		

			$insert_data['sname'] =$data['sname'];
			$insert_data['s_desc'] =$data['s_desc'];
			$insert_data['s_img'] = $data['banner_image'];
		

			$query = $this->db->insert('service', $insert_data);
		

	}
		function edit_service($id){

			$q = $this->db->select()
					->where('sid',$id)
					->get('service');
					
			return $q->row();		
		}
		function display_products($id){
	  		$this->db->select();
	  		$this->db->where("s_id", "$id");
	        $this->db->order_by("p_id", "desc");

			$query=$this->db->get('products');				
			return $query->result();
	}

	
		function updateservice($data){
		
		$id =$this->input->post('sid');

		$insert_data['sname'] =$data['sname'];
		$insert_data['s_desc'] =$data['s_desc'];
		$insert_data['s_img'] = $data['banner_image'];

		$this->db->where('sid',$id);
		
		return $this->db->update('service', $insert_data);
	}



	function insert_product($data){
		

			$insert_data['proname'] =$data['proname'];
			$insert_data['s_id'] =$data['sname'];
			$insert_data['prop_img'] = $data['pro_img'];
		

			$query = $this->db->insert('products', $insert_data);
		

	}

		function display_product(){
		

			$this->db->select('products.*, service.*');
			$this->db->from('products');
			$this->db->join('service', 'sid = products.s_id');
	        $this->db->order_by("p_id", "desc");
			
			$query=$this->db->get();
			return $query->result();
	}

		function delete_product()
			{
			$id =$_REQUEST['pid'];
			$this->db->query("delete  from products where p_id='".$id."'");
			}
}