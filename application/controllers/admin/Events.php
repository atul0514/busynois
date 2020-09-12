<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			$this->load->model('admin/eventmodel','eventmodel');
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}
		
        public function index()
		{
			$data['title'] ="Events";
			$result['data']=$this->eventmodel->displayevents();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/eventlist', $result);
			$this->load->view('admin/common/footer'); 
		}

		public function delete()
		{
			$this->eventmodel->deleteevent();
		
		
			redirect("admin/events");
		}

		public function add_event(){

			$data['title'] ="Add New Event";

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/newevent');
			$this->load->view('admin/common/footer');
		}
	
		public function insert_event()
		{
			//validate the form data 

			$this->form_validation->set_rules('ename', 'Event Name', 'required');
			$this->form_validation->set_rules('edetails', 'Event Details', 'required');
			$this->form_validation->set_rules('edate', 'Event Date', 'required');
			$this->form_validation->set_rules('etime', 'Event Time', 'required');
			$this->form_validation->set_rules('etype', 'Event Type', 'required');
			$this->form_validation->set_rules('evenue', 'Event Venue', 'required');
			$this->form_validation->set_rules('ecity', 'Event City', 'required');

	        if ($this->form_validation->run() == FALSE){
				redirect('admin/events/add_event');
			}else{
				
				//get the form values
				$data['evname'] = $this->input->post('ename', TRUE);
				$data['evdetails'] = $this->input->post('edetails', FALSE);
				$data['edate'] = $this->input->post('edate', TRUE);
				$data['etime'] = $this->input->post('etime', TRUE);
				$data['etype'] = $this->input->post('etype', TRUE);
				$data['elocation'] = $this->input->post('evenue', TRUE);
				$data['evcity'] = $this->input->post('ecity', TRUE);

				//file upload code 
				//set file upload settings 
				$config['upload_path']          = APPPATH. '../assets/uploads/events';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Add Event";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/newevent', $error);
					$this->load->view('admin/common/footer');
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['banner_image'] = $upload_data['file_name'];

					//store pic data to the db
					$this->eventmodel->store_event($data);

					redirect($_SERVER['HTTP_REFERER']);
				}
					
			}
		}


		public function edit(){

			$data['title'] ="Update Event Details";
			$id = $this->input->get('eid', TRUE);
			
			$qdetails = $this->eventmodel->edit_event($id);
			
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/editevent',['row'=>$qdetails]);
			$this->load->view('admin/common/footer');
		
		}



		public function update()
		{
			
			//get the form values
				$data['evname'] = $this->input->post('ename', TRUE);
				$data['evdetails'] = $this->input->post('edetails', FALSE);
				$data['edate'] = $this->input->post('edate', TRUE);
				$data['etime'] = $this->input->post('etime', TRUE);
				$data['etype'] = $this->input->post('etype', TRUE);
				$data['elocation'] = $this->input->post('evenue', TRUE);
				$data['evcity'] = $this->input->post('ecity', TRUE);
				//file upload code 
				//set file upload settings 
				 if($_FILES[banner]['name']!="")
            {
				$config['upload_path']          = APPPATH. '../assets/uploads/events';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Upload Banners";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/editevent', $error);
					
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


            $this->eventmodel->update_event($data);
			
            redirect($_SERVER['HTTP_REFERER']);
        }
    
}