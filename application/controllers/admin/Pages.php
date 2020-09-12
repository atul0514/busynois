<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			$this->load->model('admin/pagesmodel','pagesmodel');
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}

        public function index()
		{
			$data['title'] ="Page List";
			$result['data']=$this->pagesmodel->display();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/pagelist', $result);
			$this->load->view('admin/common/footer'); 
		}

		public function delete()
		{
			$id=$this->uri->segment(4);

			
			$this->pagesmodel->delete($id);
		
		
			redirect("admin/pages");
		}

		public function addnew(){

			$data['title'] ="Add Post";


			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/add_page');
			$this->load->view('admin/common/footer');
		}
	
		public function insert(){
			//validate the form data 

			$this->form_validation->set_rules('page_title', 'Page Title', 'required');
			$this->form_validation->set_rules('page_title', 'Page Description', 'required');
			$this->form_validation->set_rules('mtitle', 'Page Meta Title', 'required');
			$this->form_validation->set_rules('mdesc', 'Page Meta Desctiption', 'required');
			$this->form_validation->set_rules('mkeywords', 'Page Meta Keywords', 'required');

	        if ($this->form_validation->run() == FALSE){
	//			redirect($_SERVER['HTTP_REFERER']);
	        	echo "not validate";
			}else{

				$slug = url_title($this->input->post('page_title'), 'dash', TRUE);
					
				
				//get the form values
				$data['p_title'] = $this->input->post('page_title', TRUE);
				$data['p_description'] = $this->input->post('page_desc', TRUE);
				$data['p_meta-title'] = $this->input->post('mtitle', TRUE);
				$data['p_meta-desc'] = $this->input->post('mdesc', TRUE);
				$data['p_meta-keywords'] = $this->input->post('mkeywords', TRUE);
				$data['slug'] = $slug;


				//file upload code 
				//set file upload settings 
				$config['upload_path']          = APPPATH. '../assets/uploads/pages';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					redirect($_SERVER['HTTP_REFERER']);
					
				}else{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['banner_image'] = $upload_data['file_name'];

					//store pic data to the db
					$this->pagesmodel->insert($data);

					redirect('admin/pages');
				}
			}
		}

		public function edit(){

			$data['title'] ="Update Posts";
			$id = $id=$this->uri->segment(4);
			
			$qdetails = $this->pagesmodel->edit($id);
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/edit_page',['row'=>$qdetails]);
			$this->load->view('admin/common/footer');
		
		}



		public function update(){
			
			//get the form values
				$data['p_title'] = $this->input->post('pages_title', TRUE);
				$data['p_description'] = $this->input->post('pages_desc', TRUE);
				$data['p_meta-title'] = $this->input->post('mtitle', TRUE);
				$data['p_meta-desc'] = $this->input->post('mdesc', TRUE);
				$data['p_meta-keywords'] = $this->input->post('mkeywords', TRUE);
				
				//file upload code 
				//set file upload settings 
				 if($_FILES[banner]['name']!="")
            {
				$config['upload_path']          = APPPATH. '../assets/uploads/pages';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					redirect($_SERVER['HTTP_REFERER']);
					
					}
				else
					{

					//file is uploaded successfully
					//now get the file uploaded data 
					$upload_data = $this->upload->data();

					//get the uploaded file name
					$data['banner_image'] = $upload_data['file_name'];

					}
			}
				else
				{

					$data['banner_image'] = $this->input->post('bnold', TRUE);

				}


            $this->pagesmodel->update($data);
			
            redirect($_SERVER['HTTP_REFERER']);
        }

}
?>