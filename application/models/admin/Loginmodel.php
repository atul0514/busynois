<?php
class loginmodel extends CI_Model{


public function __construct()
    {
        parent::__construct();
    }

	public function validateuser($username,$password)
	{	
		$query=$this->db->where(['username'=>$username,'password'=>$password])
						->get('admin');
							
			$login= $query->row();
			
			return $login;
			
	}
	

}