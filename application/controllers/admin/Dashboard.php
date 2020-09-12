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
			$result['data']=$this->adminmodel->displayquery();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/querieslist', $result);
			$this->load->view('admin/common/footer'); 
			}


		public function deletequery()
		{
		
		$this->adminmodel->delete_querry();
		
		
		redirect("admin/dashboard/contact_form_quries");
		}

		public function subscribers()
			{

			$data['title'] ="Subscriber List";
			$result['data']=$this->adminmodel->displaysubscriber();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/subscriberlist', $result);
			$this->load->view('admin/common/footer'); 
			}

		public function deletesubscriber()
		{
		
		$this->adminmodel->delete_subscriber();
		
		
		redirect("admin/dashboard/subscribers");
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
            $data['phone']= $this->input->post('phone');
            $data['webemail']= $this->input->post('webemail');
            $data['email']= $this->input->post('email');
            $data['webaddress']= $this->input->post('webaddress');
            $data['website']= $this->input->post('website');
            $data['footerabout']= $this->input->post('footertext', FALSE);
            $data['facebook']= $this->input->post('fb');
            $data['twitter']= $this->input->post('twitter');
            $data['youtube']= $this->input->post('youtube');
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

		public function about(){

			$data['title'] ="Website About Details";
			
			$qdetails = $this->adminmodel->edit_about();
			
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/aboutpage',['row'=>$qdetails]);
			$this->load->view('admin/common/footer');
		
		}

		public function update_about(){
			
			//get the form values
				$data['abtsection'] = $this->input->post('abtsection', TRUE);
				$data['credentials'] = $this->input->post('credentials', TRUE);
				$data['homeabout'] = $this->input->post('homeabout', TRUE);
				//file upload code 
				//set file upload settings 
				 if($_FILES[banner]['name']!="")
            {
				$config['upload_path']          = APPPATH. '../assets/uploads/profile';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Update About Details";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/aboutpage', $error);
					$this->load->view('admin/common/footer');
					
					}
				else
					{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['banner_image'] = $upload_data['file_name'];

					}
			}
				else
				{

					$data['banner_image'] = $this->input->post('bnold', TRUE);

				}


            $this->adminmodel->updateabout($data);
			
            return redirect('admin/dashboard/about'); 
        }



}
?>