<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobcategory extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
		}
			$this->load->model('admin/Jobcatmodel','Jobcatmodel');
		}

	public function index()
	{

		$data['title']="Job Role";

		$result['data']=$this->Jobcatmodel->displayjcat();

		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/jcategory',$result);
		$this->load->view('admin/common/footer');
	}

		public function insert()
	{
		$this->form_validation->set_rules('cat', 'Job Role', 'required');

		if ($this->form_validation->run() == FALSE){
				return redirect($_SERVER['HTTP_REFERER']);
			}else{
				$data['cname'] = $this->input->post('cat', TRUE);
				
				$this->Jobcatmodel->insert_jcat($data);
				return redirect($_SERVER['HTTP_REFERER']);
			}
	}

	public function update_status()
		{

			$data= array();
			$data['status'] =$this->input->post('status');

			
			$qdetails = $this->Jobcatmodel->updatestatus($data);

			return redirect($_SERVER['HTTP_REFERER']);
		
		
		}

	public function edit($id)
	{
		$id=$this->uri->segment(4);

		$data['title']='Edit Job Role';

		$qresult=$this->Jobcatmodel->edit($id);
		$result['data']=$this->Jobcatmodel->displayjcat();

		$pdata=array_merge($result, ['rows'=>$qresult]);

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/updatejcat', $pdata);
		$this->load->view('admin/common/footer');
	}

	public function update()
	{
		
		$this->form_validation->set_rules('cat', 'Job Role', 'required');

		if ($this->form_validation->run() == FALSE){
				return redirect('admin/jobcategory');
			}else{
				$data['cname'] = $this->input->post('cat', TRUE);
				$this->Jobcatmodel->update($data);
				return redirect('admin/jobcategory');
			}
	}



	public function delete($id){
		$id=$this->uri->segment(4);

		$this->Jobcatmodel->delete($id);
		return redirect('admin/jobcategory');
	}
}