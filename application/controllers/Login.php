<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
		

	public function index()
		{
		$this->form_validation->set_rules('uname', 'Username', 'trim|required');
		$this->form_validation->set_rules('pword', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run())
            {
				
				$uname= $this->input->post('uname');
				$pass= $this->input->post('pword');
				
				$this->load->model('admin/loginmodel','lmodel');
				$id=$this->lmodel->validateuser($uname, $pass);
				if($id)
				{
				$data= array();
				
				$data['id']=$id->id;
				$data['name']=$id->name;
				
				$this->session->set_userdata($data);
				
				 $this->session->set_flashdata('login','Welcome to Busynoi lab Dashboard');
				redirect('admin/dashboard');
                }
				else
                {
				$this->session->set_flashdata('invalid_login','Either Username/Password is Inconnrect.');
                $this->load->view('admin/login');
                }
				}
                else
                {
                 $this->load->view('admin/login');
                }

				
		}
		
	
}
?>