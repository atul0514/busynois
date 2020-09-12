<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}
		
            public function index()
			{
			$data['title'] ="Update Profile";
			$result['data']=$this->adminmodel->profiledetails();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/profile', $result);
			$this->load->view('admin/common/footer'); 
			}

		public function update(){
				
			$this->load->model('adminmodel');

            $data= array();
            $data['id']= 1;
            $data['name']= $this->input->post('adminname');
            $data['username']= $this->input->post('adminemail');
            $data['password']= $this->input->post('adminpass');

            
            $this->adminmodel->updateprofileinfo($data);
            $this->session->set_flashdata('update', 'ProfileInfo successfully updated...');
            return redirect('admin/dashboard/profile');   
				
		}
}
?>