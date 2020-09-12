<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() {
			parent::__construct();
			
			$this->load->model('jobsmodel');
			$this->load->model('usersmodel');
			}

	public function index(){

			$data['title'] ="Busynoi";

			$result['ldata']=$this->jobsmodel->displaylocation();
			$result['jbdata']=$this->jobsmodel->displayjbtype();
			$result['jcat']=$this->jobsmodel->displayjcat();

			$fresult['fdata']=$this->usersmodel->page();

                $this->load->view('frontend/common/header');
				$this->load->view('frontend/index',$result);
				$this->load->view('frontend/common/footer',$fresult);
				
		}

	public function contact(){

			$this->load->model('usersmodel');
			$result['webdata']=$this->usersmodel->webdetails();
			$result['services']=$this->usersmodel->servicelist();


			    $this->load->view('frontend/common/header',$result);
				$this->load->view('frontend/contact', $result);
				$this->load->view('frontend/common/footer',$result);
		}


	public function contactform()
			{
                
         	$this->load->model('usersmodel');

			$this->form_validation->set_rules('name', 'Your Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Your Mobile', 'trim|required|numeric|exact_length[10]');
			$this->form_validation->set_rules('message', 'Your Message', 'trim|required');
			
        
        If($this->form_validation->run() ==false){
            
            	return redirect('pages/contact');  
        }
        else
        {
            $data= array();
			$data['name']= $this->input->post('name');
            $data['email']= $this->input->post('email');
            $data['mobile']= $this->input->post('phone');
            $data['message']= $this->input->post('message');
            $data['created']= date('Y-m-d H:i:s');
            
            $this->usersmodel->insertcontact($data);
            $this->session->set_flashdata('sucess', 'Thank You to contact us. We will contact you soon.');
            return redirect('pages/contact');   		
		}
	}
		


	public function careers()
		{
				$this->load->model('usersmodel');
				$result['webdata']=$this->usersmodel->webdetails();
				$result['services']=$this->usersmodel->servicelist();

				$jresult['jobdata']=$this->usersmodel->displayjobs();

                $this->load->view('frontend/common/header', $result);
				$this->load->view('frontend/careers',$jresult);
				$this->load->view('frontend/common/footer');
				
		}
		
		
	public function subscribe()
			
			{
         	$this->load->model('usersmodel');

			$this->form_validation->set_rules('semail', 'Your Email','trim|required|valid_email');			
        
        	If($this->form_validation->run() ==false)
	        {
	            redirect($_SERVER['HTTP_REFERER']);  
	        }
	        else
	        {
            $data= array();
            $data['email']= $this->input->post('semail');

            $this->usersmodel->subscription($data);
            redirect($_SERVER['HTTP_REFERER']);
			}
		}


	public function jobform()
			{
                
         	$this->load->model('usersmodel');

			$this->form_validation->set_rules('name', 'Your Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Your Mobile', 'trim|required|numeric|exact_length[10]');
			$this->form_validation->set_rules('jobname', 'Job Profile', 'trim|required');
			
        
        If($this->form_validation->run() ==false){
            
            	redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
        	$slug = url_title($this->input->post('post_title'), 'dash', TRUE);

            $data= array();
			$data['name']= $this->input->post('name');
            $data['email']= $this->input->post('email');
            $data['mobile']= $this->input->post('phone');
            $data['job']= $this->input->post('jobname');
            $data['created']= date('Y-m-d H:i:s');


            $config['upload_path']          = APPPATH. '../assets/upload/resumes';
				$config['allowed_types']        = 'pdf|doc|docs';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('resume')){
					$error = array('error' => $this->upload->display_errors());

					redirect($_SERVER['HTTP_REFERER']);
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['banner_image'] = $upload_data['file_name'];

					//store pic data to the db
					$this->usersmodel->applyjob($data);
		            $this->session->set_flashdata('sucess', 'Thank You to contact us. We will contact you soon.');
		            redirect($_SERVER['HTTP_REFERER']);  

				} 
				
		}
	}
	public function page($id)
		{
			$id = $id=$this->uri->segment(3);
			$this->load->model('usersmodel');
			$qdetails = $this->usersmodel->view($id);

			$fresult['fdata']=$this->usersmodel->page();

			$this->load->view('frontend/common/header');
			$this->load->view('frontend/pages',['row'=>$qdetails]);
			$this->load->view('frontend/common/footer',$fresult);
		}

	public function jobs($id)
	{
			$id = $this->uri->segment(3);

			$result['ldata']=$this->jobsmodel->displaylocation();
			$result['jbdata']=$this->jobsmodel->displayjbtype();
			$result['jcat']=$this->jobsmodel->displayjcat();
 			$result['data']=$this->usersmodel->jobs($id);
			
			$fresult['fdata']=$this->usersmodel->page();

			$this->load->view('frontend/common/header');
			$this->load->view('frontend/jobs',$result);
			$this->load->view('frontend/common/footer',$fresult);
	}

	public function jobinfo($id)
	{
			$id = $this->uri->segment(3);

			$result['ldata']=$this->jobsmodel->displaylocation();
			$result['jbdata']=$this->jobsmodel->displayjbtype();
			$result['jcat']=$this->jobsmodel->displayjcat();
			$qdetails =$this->usersmodel->jobinfo($id);
			$fresult['fdata']=$this->usersmodel->page();

			$this->load->view('frontend/common/header');
			$this->load->view('frontend/jobinfo',['row'=>$qdetails]);
			$this->load->view('frontend/common/footer',$fresult);
	}

		public function resumes($id)
	{
			$id = $this->uri->segment(3);

			$result['ldata']=$this->jobsmodel->displaylocation();
			$result['jbdata']=$this->jobsmodel->displayjbtype();
			$result['jcat']=$this->jobsmodel->displayjcat();
 			$result['data']=$this->usersmodel->resumes($id);
			
			$fresult['fdata']=$this->usersmodel->page();

			$this->load->view('frontend/common/header');
			$this->load->view('frontend/jobs',$result);
			$this->load->view('frontend/common/footer',$fresult);
	}

	public function resumeinfo($id)
	{
			$id = $this->uri->segment(3);

			$result['ldata']=$this->jobsmodel->displaylocation();
			$result['jbdata']=$this->jobsmodel->displayjbtype();
			$result['jcat']=$this->jobsmodel->displayjcat();
			$qdetails =$this->usersmodel->jobinfo($id);
			$fresult['fdata']=$this->usersmodel->page();

			$this->load->view('frontend/common/header');
			$this->load->view('frontend/jobinfo',['row'=>$qdetails]);
			$this->load->view('frontend/common/footer',$fresult);
	}


}
?>
