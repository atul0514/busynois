<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			$this->load->model('admin/testimonialmodel','testimonialmodel');
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}
		
        public function index()
		{
			$data['title'] ="Testimonials";
			$result['data']=$this->testimonialmodel->displaytestimonial();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/testimoniallist', $result);
			$this->load->view('admin/common/footer'); 
		}

		public function delete()
		{
			$this->testimonialmodel->delettestimonial();
		
		
			redirect("admin/testimonials");
		}

		public function add_testimonial(){

			$data['title'] ="Add New Testimonial";

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/newtestimonial');
			$this->load->view('admin/common/footer');
		}
	
		public function insert_testimonial(){
			//validate the form data 

			$this->form_validation->set_rules('tname', 'Client Name', 'required');
			$this->form_validation->set_rules('testi', 'Testimonial', 'required');

	        if ($this->form_validation->run() == FALSE){
				$this->load->view('upload_form');
			}else{
				
				//get the form values
				$data['name'] = $this->input->post('tname', TRUE);
				$data['testimonial'] = $this->input->post('testi', FALSE);

				//file upload code 
				//set file upload settings 
				$config['upload_path']          = APPPATH. '../assets/uploads/testimonial';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Add Testimonial";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/newtestimonial', $error);
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['banner_image'] = $upload_data['file_name'];

					//store pic data to the db
					$this->testimonialmodel->store_testi_data($data);

					redirect('admin/testimonials');
				}
					$this->load->view('admin/common/footer');
			}
		}

		public function edit(){

			$data['title'] ="Update Testimonial Details";
			$id = $this->input->get('id', TRUE);
			
			$qdetails = $this->testimonialmodel->edit_testi($id);
			
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/edittestimonial',['row'=>$qdetails]);
			$this->load->view('admin/common/footer');
		
		}

		public function update(){
			
			//get the form values
				$data['name'] = $this->input->post('tname', TRUE);
				$data['testimonial'] = $this->input->post('testi', FALSE);
				//file upload code 
				//set file upload settings 
				 if($_FILES[banner]['name']!="")
            {
				$config['upload_path']          = APPPATH. '../assets/uploads/testimonial';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Update Testimonial Details";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/edittestimonial', $error);
					
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


            $this->testimonialmodel->update_testi($data);
			
            redirect($_SERVER['HTTP_REFERER']);
        }

}