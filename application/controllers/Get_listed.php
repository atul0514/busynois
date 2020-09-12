<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class get_listed extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			
			$this->load->model('jobsmodel');
			$this->load->model('usersmodel');
			}
		
        public function index(){

			$data['title'] ="Busynoi";

			$result['ldata']=$this->jobsmodel->displaylocation($data);
			$result['jbdata']=$this->jobsmodel->displayjbtype($data);
			$result['jcat']=$this->jobsmodel->displayjcat($data);

			$fresult['fdata']=$this->usersmodel->page();

                $this->load->view('frontend/common/header');
				$this->load->view('frontend/listing',$result);
				$this->load->view('frontend/common/footer',$fresult);
				
		}

		public function fetchcity() { 

       		  $postData = $this->input->post();
			  $data= $this->jobsmodel->fcity($postData);
			  echo json_encode($data);
   		}

		public function insert(){
			
		$this->form_validation->set_rules('name', 'Location', 'required');
		$this->form_validation->set_rules('email', 'Location', 'required');
		$this->form_validation->set_rules('Jobtitle', 'Location', 'required');
		$this->form_validation->set_rules('desc', 'Location', 'required');
		$this->form_validation->set_rules('comp', 'Location', 'required');
		$this->form_validation->set_rules('jtype', 'Location', 'required');
		$this->form_validation->set_rules('address', 'Location', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');


		if ($this->form_validation->run() == FALSE){
				redirect('get_listed');
			}else{

				$data['name'] = $this->input->post('name', TRUE);
				$data['email'] = $this->input->post('email', TRUE);
				$data['Jtitle'] = $this->input->post('Jobtitle', TRUE);
				$data['Details'] = $this->input->post('desc', TRUE);
				$data['comp'] = $this->input->post('comp', TRUE);
				$data['Jrole'] = $this->input->post('jtype', TRUE);
				$data['address'] = $this->input->post('address', TRUE);
				$data['loc'] = $this->input->post('location', TRUE);

				$config['upload_path']          = APPPATH. '../assets/uploads/Jobs';
				$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('jupload')){
					$error = array('error' => $this->upload->display_errors());

					redirect('get_listed');
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['jupload'] = $upload_data['file_name'];


				
				$this->jobsmodel->insert($data);
				return redirect('get_listed');
			}
		}
	}
}