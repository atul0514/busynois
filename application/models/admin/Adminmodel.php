<?php
class adminmodel extends CI_Model{				
		
		

		function displaysubscriber()
		{
			$this->db->select();
	        $this->db->order_by("id", "desc");

			$query=$this->db->get('subscription');
							
			return $query->result();
		}

		function delete_subscriber()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from subscription where id='".$id."'");
			}

		function displayquery()
		{
			$this->db->select();
	        $this->db->order_by("contact_id", "desc");

			$query=$this->db->get('contactenquiry');
							
			return $query->result();
		}

		function delete_querry()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from contactenquiry where contact_id='".$id."'");
			}


		function webdetails(){
           $query=$this->db->query("select * from webinfo");
							
			return $query->result();
        }

        function updatewebinfo($data){
            
            $this->db->update('webinfo', $data);
        }

        

        function profiledetails(){
           $query=$this->db->query("select * from admin");
							
			return $query->result();
        }

        function updateprofileinfo($data){
            
            $this->db->update('admin', $data);
        }

        function displayjobresumes(){
           $query=$this->db->query("select * from jobapply");
							
			return $query->result();
        }

		function displaypost()
		{
			$this->db->select();
	        $this->db->order_by("pid", "desc");
			$this->db->order_by("limit", "10");
			$query=$this->db->get('posts');
							
			return $query->result();
		}
		
		
		function edit_about()
		{
		$q = $this->db->select()
					->where('page_id', 1)
					->get('about');
		return $q->row();
		}

		function updateabout($data)
		{
		$id =$this->input->post('id');

		$insert_data['aboutsec'] = $data['abtsection'];
		$insert_data['credentials'] = $data['credentials'];
		$insert_data['homecontent'] = $data['homeabout'];
		$insert_data['img_url'] = $data['banner_image'];
					
		$this->db->where('page_id',$id);
		return $this->db->update('about',$insert_data);
		}

}?>