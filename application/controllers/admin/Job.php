<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
		}
			$this->load->model('admin/Jobmodel','Jobmodel');
		}

	public function index()
	{

		$data['title']="Job";

		$result['data']=$this->Jobmodel->displayJob();

		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/Job',$result);
		$this->load->view('admin/common/footer');
	}

		public function insert()
	{
		$this->form_validation->set_rules('Job', 'Job', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/Job/');
			}else{
				$data['city'] = $this->input->post('Job', TRUE);

				//file upload code 
				//set file upload settings 
				$config['upload_path']          = APPPATH. '../assets/uploads/Job';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Upload Banners";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/add_post', $error);
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['limg'] = $upload_data['file_name'];

				
				$this->Jobmodel->insert_Job($data);
				return redirect('admin/Job');
			}
	}

}
	public function update_status()
		{

			$data= array();
			$data['status'] =$this->input->post('status');

			
			$qdetails = $this->Jobmodel->updatestatus($data);

			return redirect($_SERVER['HTTP_REFERER']);
		
		
		}

	public function edit($id)
	{
		$id=$this->uri->segment(4);

		$data['title']='Edit Job';

		$qresult=$this->Jobmodel->edit($id);
		$result['data']=$this->Jobmodel->displayJob();

		$pdata=array_merge($result, ['rows'=>$qresult]);

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/updateJob', $pdata);
		$this->load->view('admin/common/footer');
	}

	public function update()
	{
		
		$this->form_validation->set_rules('Job', 'Job', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/Job/');
			}else{
				$data['city'] = $this->input->post('Job', TRUE);
				$this->Jobmodel->update($data);
				return redirect('admin/Job');
			}
	}



	public function delete($id){
		$id=$this->uri->segment(4);

		$this->Jobmodel->delete($id);
		return redirect('admin/Job');

	}
}