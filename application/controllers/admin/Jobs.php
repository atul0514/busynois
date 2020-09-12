<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			$this->load->model('admin/jobmodel','jobmodel');
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}
		
		public function add()
		{
			$data['title'] ="Post New Job";

			$this->load->model('jobsmodel');
			$result['ldata']=$this->jobsmodel->displaylocation($data);
			$result['jbdata']=$this->jobsmodel->displayjbtype($data);
			$result['jcat']=$this->jobsmodel->displayjcat($data);
            
            $this->load->view('admin/common/header',$data);
			$this->load->view('admin/joblisting',$result);
			$this->load->view('admin/common/footer'); 
        
		}

		public function fetchcity() 
		{ 

       		  $postData = $this->input->post();
			  $data= $this->jobmodel->fcity($postData);
			  echo json_encode($data);
   		}

   		public function insert()
   		{
			
		$this->form_validation->set_rules('name', 'Location', 'required');
		$this->form_validation->set_rules('email', 'Location', 'required');
		$this->form_validation->set_rules('Jobtitle', 'Location', 'required');
		$this->form_validation->set_rules('desc', 'Location', 'required');
		$this->form_validation->set_rules('comp', 'Location', 'required');
		$this->form_validation->set_rules('jtype', 'Location', 'required');
		$this->form_validation->set_rules('address', 'Location', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');


		if ($this->form_validation->run() == FALSE){
				redirect('add');
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

					redirect('add');
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['jupload'] = $upload_data['file_name'];


				
				$this->jobmodel->insert($data);
				return redirect('admin/jobs');
			}
		}
	}


		public function index()
		{
		$data['title'] ="All Jobs";
		$result['data']=$this->jobmodel->displayjobs();

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/joblist',$result);
		$this->load->view('admin/common/footer');
		}

		public function resumes()
		{
		$data['title'] ="All Resumes";
		$result['data']=$this->jobmodel->displayresumes();

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/joblist',$result);
		$this->load->view('admin/common/footer');
		}

		public function delete($id){
		$id=$this->uri->segment(4);
		$this->jobmodel->deletejobs($id);
		redirect("admin/Jobs");
		}
		
		public function edit($id){
			$id=$this->uri->segment(4);
			$data['title'] ="Update Jobs";
			
			$qdetails = $this->jobmodel->edit_job($id);
			$this->load->model('jobsmodel');
			$result['ldata']=$this->jobsmodel->displaylocation($data);
			$result['jbdata']=$this->jobsmodel->displayjbtype($data);
			$result['jcat']=$this->jobsmodel->displayjcat($data);
			
			$cdata = array_merge($result,['erow'=>$qdetails]);
			
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/editjob',$cdata);
			$this->load->view('admin/common/footer');
		
		}



		public function update(){
			
			$data= array();

			$data['jtitle']= $this->input->post('jname');
            $data['description']= $this->input->post('jobdes', FALSE);
            $data['skills']= $this->input->post('jskills');
            $data['qualification']= $this->input->post('jqual');
            $data['experience']= $this->input->post('jexpr');
            $data['salary']= $this->input->post('jsal');


            $this->jobmodel->update_job($data);
			
            return redirect('admin/jobs'); 
        }



        public function resumelist()
		{
		$data['title'] ="Recieved Jobs Applications";
		$result['data']=$this->jobmodel->displayresume();

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/resumelist',$result);
		$this->load->view('admin/common/footer');
		}

		public function deleteresume(){

		$this->jobmodel->delete_resume();
		redirect("admin/jobs/resume");
		}
		
		public function viewresume(){

			$data['title'] ="Job Application Details";
			$id = $this->input->get('jid', TRUE);
			
			$qdetails = $this->jobmodel->view_resume($id);
			
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/resumedetails',['row'=>$qdetails]);
			$this->load->view('admin/common/footer');
		
		}
		
		
}
?>