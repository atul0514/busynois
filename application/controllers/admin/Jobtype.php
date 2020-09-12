<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobtype extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
		}
			$this->load->model('admin/Jobtypemodel','Jobtypemodel');
		}

	public function index()
	{

		$data['title']="Job type";

		$result['data']=$this->Jobtypemodel->displayjob();

		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/jtype',$result);
		$this->load->view('admin/common/footer');
	}

		public function insert()
	{
		$this->form_validation->set_rules('job', 'job type', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/jobtype/');
			}else{
				$data['jtname'] = $this->input->post('job', TRUE);

				
				$this->Jobtypemodel->insert_job($data);
				return redirect($_SERVER['HTTP_REFERER']);
			}
	}

	public function update_status()
		{

			$data= array();
			$data['status'] =$this->input->post('status');

			
			$qdetails = $this->Jobtypemodel->updatestatus($data);

			return redirect($_SERVER['HTTP_REFERER']);
		
		
		}

	public function edit($id)
	{
		$id=$this->uri->segment(4);

		$data['title']='Edit Job Type';

		$qresult=$this->Jobtypemodel->edit($id);
		$result['data']=$this->Jobtypemodel->displayjob();

		$pdata=array_merge($result, ['rows'=>$qresult]);

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/updatejtype', $pdata);
		$this->load->view('admin/common/footer');
	}

	public function update()
	{
		
		$this->form_validation->set_rules('job', 'job type', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/jobtype/');
			}else{
				$data['jtname'] = $this->input->post('job', TRUE);

				
				$this->Jobtypemodel->update($data);
				return redirect('admin/jobtype');
			}
	}



	public function delete($id){
		$id=$this->uri->segment(4);

		$this->Jobtypemodel->delete($id);
		return redirect('admin/jobtype');

	}
}