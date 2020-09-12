<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
		}
			$this->load->model('admin/citymodel','citymodel');
		}

	public function index()
	{

		$data['title']="City";

		$result['data']=$this->citymodel->displaycity();
		$result['lcdata']=$this->citymodel->displaylocation();

		$this->load->view('admin/common/header',$data);
		$this->load->view('admin/city',$result);
		$this->load->view('admin/common/footer');
	}

		public function insert()
	{
		$this->form_validation->set_rules('loc', 'country', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('lat', 'latitude', 'required');
		$this->form_validation->set_rules('lang', 'longitude', 'required');

		if ($this->form_validation->run() == FALSE){
				redirect('admin/city/');
			}else{

				$slug = url_title($this->input->post('city'), 'dash', TRUE);


				$data['lcid'] = $this->input->post('loc', TRUE);
				$data['ctame'] = $this->input->post('city', TRUE);
				$data['lat'] = $this->input->post('lat', TRUE);
				$data['lang'] = $this->input->post('lang', TRUE);
				$data['cslug'] = $slug;
				
				$this->citymodel->insert_city($data);
				return redirect('admin/city');
			}
	}

	public function update_status()
		{
			$data= array();
			$data['status'] =$this->input->post('status');
			
			$qdetails = $this->citymodel->updatestatus($data);

			return redirect($_SERVER['HTTP_REFERER']);	
		
		}

	public function edit($id)
	{
		$id=$this->uri->segment(4);

		$data['title']='Edit city';

		$qresult=$this->citymodel->edit($id);
		$result['data']=$this->citymodel->displaycity();
		$result['lcdata']=$this->citymodel->displaylocation();

		$pdata=array_merge($result, ['rows'=>$qresult]);

		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/updatecity', $pdata);
		$this->load->view('admin/common/footer');
	}

	public function update()
	{
		
		$this->form_validation->set_rules('loc', 'country', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('lat', 'latitude', 'required');
		$this->form_validation->set_rules('lang', 'longitude', 'required');


		if ($this->form_validation->run() == FALSE){
				return redirect($_SERVER['HTTP_REFERER']);	
			}else{
				$data['lcid'] = $this->input->post('loc', TRUE);
				$data['ctame'] = $this->input->post('city', TRUE);
				$data['lat'] = $this->input->post('lat', TRUE);
				$data['lang'] = $this->input->post('lang', TRUE);
				$this->citymodel->update($data);
				return redirect('admin/city');
			}
	}



	public function delete($id){
		$id=$this->uri->segment(4);

		$this->citymodel->delete($id);
		return redirect('admin/city');

	}
}