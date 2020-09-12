<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			$this->load->model('admin/adminmodel','adminmodel');
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}
		
		public function index()
			{
			$data['title'] ="Dashboard";

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/common/footer'); 
			}

		public function contact_form_quries()
			{

			$data['title'] ="Contact Form Queries";
			$result['data']=$this->adminmodel->displaycontact();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/querieslist', $result);
			$this->load->view('admin/common/footer'); 
			}

		public function deletecontact()
		{
		
		$this->adminmodel->deletcontactquerry();
		
		
		redirect("admin/dashboard/contact_form_quries");
		}

		public function Resumes()
			{

			$data['title'] ="Applied Jobs";
			$result['data']=$this->adminmodel->displayjobresumes();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/resumelist', $result);
			$this->load->view('admin/common/footer'); 
			}

		public function websiteinfo()
			{
			$data['title'] ="Update Website Informations";
			$result['data']=$this->adminmodel->webdetails();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/websetting', $result);
			$this->load->view('admin/common/footer'); 
			}

			public function updatewebsiteinfo(){
				
			$this->load->model('adminmodel');

            $data= array();
			$data['webtitle']= $this->input->post('title',$data);
            $data['webphone']= $this->input->post('webphone');
            $data['webemail']= $this->input->post('webemail');
            $data['webaddress']= $this->input->post('webaddress');
            $data['facebook']= $this->input->post('fb');
            $data['instagram']= $this->input->post('insta');
            $data['twitter']= $this->input->post('twitter');
            $data['linkedin']= $this->input->post('linkedin');

            
            $this->adminmodel->updatewebinfo($data);
            $this->session->set_flashdata('update', 'Website Info successfully updated...');
            return redirect('admin/dashboard/websiteinfo');   
				
		}

		public function profile()
			{
			$data['title'] ="Update Profile";
			$result['data']=$this->adminmodel->profiledetails();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/profile', $result);
			$this->load->view('admin/common/footer'); 
			}

		public function updateprofile(){
				
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