<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
		}
			$this->load->model('admin/locationmodel','locationmodel');
		}

	public function index()
	{

		$data['title']="Location";

		$result['data']=$this->locationmodel->displaylocation();

		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/location',$result);
		$this->load->view('admin/common/footer');
	}

		public function insert()
	{
		$this->form_validation->set_rules('location', 'Location', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/location/');
			}else{

				$slug = url_title($this->input->post('location'), 'dash', TRUE);
				$data['loc'] = $this->input->post('location', TRUE);
				$data['slug'] = $slug;
				
				$this->locationmodel->insert_location($data);
				return redirect('admin/location');
			}
	}

	public function update_status()
		{

			$data= array();
			$data['status'] =$this->input->post('status');

			
			$qdetails = $this->locationmodel->updatestatus($data);

			return redirect($_SERVER['HTTP_REFERER']);
		
		
		}

	public function edit($id)
	{
		$id=$this->uri->segment(4);

		$data['title']='Edit Location';

		$qresult=$this->locationmodel->edit($id);
		$result['data']=$this->locationmodel->displaylocation();

		$pdata=array_merge($result, ['rows'=>$qresult]);

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/updatelocation', $pdata);
		$this->load->view('admin/common/footer');
	}

	public function update()
	{
		
		$this->form_validation->set_rules('location', 'Location', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/location/');
			}else{
				$data['loc'] = $this->input->post('location', TRUE);
				$this->locationmodel->update($data);
				return redirect('admin/location');
			}
	}



	public function delete($id){
		$id=$this->uri->segment(4);

		$this->locationmodel->delete($id);
		return redirect('admin/location');

	}
}