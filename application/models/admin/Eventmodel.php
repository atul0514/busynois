<?php
class eventmodel extends CI_Model{				
		
		

		function displayevents()
		{
			$this->db->select();
	        $this->db->order_by("eid", "desc");

			$query=$this->db->get('event');
			return $query->result();
		}

		function deleteevent()
			{
			$id =$_REQUEST['id'];
			$this->db->query("delete  from event where eid='".$id."'");
			}

			//save picture data to db
		function store_event($data){
		

		$insert_data['evname'] = $data['evname'];
		$insert_data['evdetails'] = $data['evdetails'];
		$insert_data['edate'] = $data['edate'];
		$insert_data['etime'] = $data['etime'];
		$insert_data['elocation'] = $data['elocation'];
		$insert_data['evcity'] = $data['evcity'];
		$insert_data['evimage'] = $data['banner_image'];

		$query = $this->db->insert('event', $insert_data);
	}

		function edit_event($id)
		{
		$q = $this->db->select()
					->where('eid',$id)
					->get('event');
		return $q->row();
		}
		
		
	function update_event($data)
		{
		$id =$this->input->post('id');

		$insert_data['evname'] = $data['evname'];
		$insert_data['evdetails'] = $data['evdetails'];
		$insert_data['edate'] = $data['edate'];
		$insert_data['etime'] = $data['etime'];
		$insert_data['elocation'] = $data['elocation'];
		$insert_data['evcity'] = $data['evcity'];
		$insert_data['evimage'] = $data['banner_image'];
					
		$this->db->where('eid',$id);
		return $this->db->update('event',$insert_data);
		}
	
}