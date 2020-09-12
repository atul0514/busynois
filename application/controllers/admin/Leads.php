<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Leads extends CI_Controller {
		
		public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('id')) {
			return redirect('login');
		}
			$this->load->model('admin/adminmodel','adminmodel');
		}
		public function logout(){
		$this->session->unset_userdata('id');
		redirect('login');
		}
		public function index()
			{
				$this->load->model('admin/adminmodel','adminmodel');

				$config = array();
				$config["base_url"] = base_url() . "admin/leads/index";
				$config["total_rows"] = $this->adminmodel->q_rows();
				$config["per_page"] = 15;
				$config["uri_segment"] = 4;
				
				
				$config["full_tag_open"] = '<ul class="pagination">';
				$config["full_tag_close"] = '</ul>';
				$config["next_tag_open"] = '<li class="paginate_button page-item next">';
				$config["next_tag_close"] = '</li>';
				$config["prev_tag_open"] = '<li  class="paginate_button page-item previous">';
				$config["prev_tag_close"] = '</li>';
				$config["num_tag_open"] = '<li class="paginate_button page-item">';
				$config["num_tag_close"] = '</li>';
				$config["cur_tag_open"] = '<li class="page-item active"><a class="page-link">';
				$config["cur_tag_close"] = '</a></li>';
			    $this->pagination->initialize($config);
				$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

				$data["links"] = $this->pagination->create_links();
				
				
				$query=$this->adminmodel->display_query($config['per_page'],$page);
				$data['leads']=$query;
				
				$tresult= $this->adminmodel->displayteam();
				$data['team']=$tresult;
				
				
				$this->load->view('admin/querylist',$data);
			}
		public function search_leads()
		{
				
				$tid= $this->input->post('assinged');
			
				$sresult= $this->adminmodel->search_query($tid);
				$data['leads']=$sresult;
				
				$tresult= $this->adminmodel->displayteam();
				$data['team']=$tresult;
				
				
				$this->load->view('admin/searchquerylist',$data);
		}
		public function search_status()
		{
				
				$status= $this->input->post('status');
			
				$sresult= $this->adminmodel->search_by_status($status);
				$data['leads']=$sresult;
				
				$tresult= $this->adminmodel->displayteam();
				$data['team']=$tresult;
				
				
				$this->load->view('admin/searchquerylist',$data);
		}
		
		public function addnew()
		{
        
			$this->form_validation->set_rules('name', 'Your Name', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Your Mobile', 'trim|required|numeric|exact_length[10]');
			$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('city', 'Your City', 'trim|required');
			$this->form_validation->set_rules('pin', 'Your Area Pin', 'trim|required|exact_length[6]');
        
        If($this->form_validation->run() ==false){
            
            $this->load->view('admin/newquery');
        }
        else{
            $data= array();
            $data['name']= $this->input->post('name');
            $data['mobile']= $this->input->post('mobile');
            $data['email']= $this->input->post('email');
            $data['city']= $this->input->post('city');
            $data['pincode']= $this->input->post('pin');
            $data['time']= date('Y-m-d H:i:s');
            
            $this->adminmodel->savequery($data);
            $this->session->set_flashdata('sucess', 'Record added successfully');
            redirect(base_url().'admin/addquery');
        }
        
		}
		
		
		public function delete()
		{
		
		$this->adminmodel->deletequery();
		
		
		redirect("admin/querylist");
		}
		
		
		
		public function edit(){
			$id = $this->input->get('query_id', TRUE);

			
			$qdetails = $this->adminmodel->edit_query($id);
			
			
			
			$this->load->view('admin/editquery',['qv'=>$qdetails]);
		
		}
		public function view(){
			$id = $this->input->get('query_id', TRUE);
			$qdetails = $this->adminmodel->edit_query($id); 
			$data['qfollow']=$this->adminmodel->view_followup($id);

			$this->load->view('admin/common/header');
			$this->load->view('admin/viewquery', ['qd'=>$qdetails]);
			$this->load->view('admin/followhistory',$data);
			$this->load->view('admin/common/footer'); 
		
		}
		public function view3232(){
			$id = $this->input->get('query_id', TRUE);

			
			$qdetails = $this->adminmodel->edit_query($id);
			 
			$data['qfollow']=$this->adminmodel->view_followup($id);

			$this->load->view('admin/common/header');
			$this->load->view('admin/viewquery', ['qd'=>$qdetails]);
			$this->load->view('admin/followhistory',$data);
			$this->load->view('admin/common/footer');
		
		}
		
		
		public function update(){
			
            $upd= $this->adminmodel->update_query();
			
			if($upd>0){
			$this->session->set_flashdata('msg',"User Query Details Successful Updated'");
			$this->session->set_flashdata('msg','alert-success');
			}
			else{
			$this->session->set_flashdata('msg',"User Query Details Not Updated'");
			$this->session->set_flashdata('msg','alert-danger');
			}
            return redirect('admin/leads'); 
        }
		
		
		public function updateassign(){
            $upa= $this->adminmodel->update_assign();
            return redirect('admin/leads'); 
        }
		
		
		public function addvendor()
		{
        $this->load->model('adminmodel');
			$this->form_validation->set_rules('cname', 'Your Company Name', 'trim|required');
			$this->form_validation->set_rules('caddress', 'Your Company Address', 'trim|required');
			$this->form_validation->set_rules('name', 'Your Name', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Your Mobile', 'trim|required|numeric|exact_length[10]');
			$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('tusername', 'Your Username', 'trim|required|is_unique[vendors.username]');
			$this->form_validation->set_rules('tpass', 'Your Password', 'trim|required');
			$this->form_validation->set_rules('teamlimit', 'Choose Team Limit', 'trim|required');
			$this->form_validation->set_rules('tvalidity', 'Choose Validity', 'trim|required');
        
        If($this->form_validation->run() ==false){
            
            $this->load->view('admin/addvendor');
        }
        else{
            $data= array();
			$data['vcname']= $this->input->post('cname');
            $data['vaddress']= $this->input->post('caddress');
            $data['vname']= $this->input->post('name');
            $data['vmobile']= $this->input->post('mobile');
            $data['vemail']= $this->input->post('email');
            $data['username']= $this->input->post('tusername');
            $data['paasword']= $this->input->post('tpass');
			$data['teamlimit']= $this->input->post('teamlimit');
            $data['validity']= $this->input->post('tvalidity');
            $data['created']= date('Y-m-d');
            
            $this->adminmodel->newvendor($data);
            $this->session->set_flashdata('sucess', 'Record added successfully');
            return redirect('admin/addvendor');
        }
        
		}
		public function vendorlist()
		{
		$result['data']=$this->adminmodel->displayvendor();
		$this->load->view('admin/vendorlist',$result);
		}
		
		
		
		
		 
		
		

		
		
		
	
}
?>