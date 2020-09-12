<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			
			$this->load->model('eventmodel');
			}
		
        public function index()
		{
			$this->load->model('usersmodel');
			$result['data']=$this->eventmodel->displayevents();
			$result['webdata']=$this->usersmodel->webdetails();
			$result['services']=$this->usersmodel->servicelist();

			$this->load->view('frontend/common/header',$result);
			$this->load->view('frontend/event', $result);
			$this->load->view('frontend/common/footer',$result); 
		}

		public function info(){

			$id = $this->input->get('eid', TRUE);
			
			$this->load->model('eventmodel');
			$this->load->model('usersmodel');

			$qdetails = $this->eventmodel->view_event($id);
			
			$webco['webdata']=$this->usersmodel->webdetails();
			$webco['services']=$this->usersmodel->servicelist();

			$result = array_merge($webco,['brow'=>$qdetails]);
		

			$this->load->view('frontend/common/header',$result);
			$this->load->view('frontend/event-details', $result);
			$this->load->view('frontend/common/footer', $result);
		
		
		}
}