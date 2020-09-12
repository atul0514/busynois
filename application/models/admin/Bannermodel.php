<?php
class bannermodel extends CI_Model{				
		
		

		function displaybanner()
		{
			$this->db->select();
	        $this->db->order_by("slide_id", "desc");

			$query=$this->db->get('slider');				
			return $query->result();
		}

		function deletbanner()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from slider where slide_id='".$id."'");
			}

			//save picture data to db
		function store_pic_data($data){
		

		$insert_data['sname'] = $data['sname'];
		$insert_data['banner_image'] = $data['banner_image'];

		$query = $this->db->insert('slider', $insert_data);
	}
	
}