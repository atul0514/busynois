<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			if (!$this->session->userdata('id')) {
				return redirect('login');
			}
			$this->load->model('admin/blogmodel','blogmodel');
			}
			public function logout(){
			$this->session->unset_userdata('id');
			redirect('login');
			}
		
        public function index()
		{
			$data['title'] ="Post's List";
			$result['data']=$this->blogmodel->displaypost();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/postlist', $result);
			$this->load->view('admin/common/footer'); 
		}

		public function delete()
		{
			$this->blogmodel->deletposts();
		
		
			redirect("admin/blog");
		}

		public function add_post(){

			$data['title'] ="Add Post";

			$result['data']=$this->blogmodel->displaycat();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/add_post', $result);
			$this->load->view('admin/common/footer');
		}
	
		public function insert_post(){
			//validate the form data 

			$this->form_validation->set_rules('post_title', 'Post Title', 'required');
			$this->form_validation->set_rules('cat', 'Post Category', 'required');
			$this->form_validation->set_rules('post_desc', 'Post Description', 'required|xss_clean|strip_tags|trim');
			$this->form_validation->set_rules('mtitle', 'Post Meta Title', 'required');
			$this->form_validation->set_rules('mdesc', 'Post Meta Desctiption', 'required');
			$this->form_validation->set_rules('mkeywords', 'Post Meta Keywords', 'required');

	        if ($this->form_validation->run() == FALSE){
				redirect('admin/blog/add_post');
			}else{

				$slug = url_title($this->input->post('post_title'), 'dash', TRUE);
					$slugcount = $this->blogmodel->slug_count($slug);
					if ($slugcount > 0) {
					   $slug = $slug."-".$slugcount;
					}
				
				//get the form values
				$data['p_title'] = $this->input->post('post_title', TRUE);
				$data['cid'] = $this->input->post('cat', TRUE);
				$data['p_description'] = $this->input->post('post_desc', FALSE);
				$data['p_meta-title'] = $this->input->post('mtitle', TRUE);
				$data['p_meta-desc'] = $this->input->post('mdesc', TRUE);
				$data['p_meta-keywords'] = $this->input->post('mkeywords', TRUE);
				$data['slug'] = $slug;
				//file upload code 
				//set file upload settings 
				$config['upload_path']          = APPPATH. '../assets/uploads/blog';
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
					$data['banner_image'] = $upload_data['file_name'];

					//store pic data to the db
					$this->blogmodel->insert_post($data);

					redirect('admin/blog');
				}
					$this->load->view('admin/common/footer');
			}
		}

		public function edit(){

			$data['title'] ="Update Posts";
			$id = $this->input->get('pid', TRUE);
			
			$qdetails = $this->blogmodel->edit_post($id);
			$result['rdata']=$this->blogmodel->displaycat();

			$cdata = array_merge($result,['row'=>$qdetails]);
			
			$this->load->view('admin/common/header', $data);
			$this->load->view('admin/edit_post',$cdata);
			$this->load->view('admin/common/footer');
		
		}



		public function update(){
			
			//get the form values
				$data['p_title'] = $this->input->post('post_title', TRUE);
				$data['cid'] = $this->input->post('cat', TRUE);
				$data['p_description'] = $this->input->post('post_desc', FALSE);
				$data['p_meta-title'] = $this->input->post('mtitle', TRUE);
				$data['p_meta-desc'] = $this->input->post('mdesc', TRUE);
				$data['p_meta-keywords'] = $this->input->post('mkeywords', TRUE);
				
				//file upload code 
				//set file upload settings 
				 if($_FILES[banner]['name']!="")
            {
				$config['upload_path']          = APPPATH. '../assets/uploads/blog';
				$config['allowed_types']        = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('banner')){
					$error = array('error' => $this->upload->display_errors());

					$data['title'] ="Upload Banners";
					$this->load->view('admin/common/header',$data);
					$this->load->view('admin/add_post', $error);
					
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


            $this->blogmodel->update_post($data);
			
            return redirect('admin/blog'); 
        }
    


        public function category()
		{
			$data['title'] ="category";
			$result['data']=$this->blogmodel->displaycat();

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/categorylist', $result);
			$this->load->view('admin/common/footer'); 
		}

		public function deletecat()
		{
			$this->blogmodel->deletecat();
		
		
			redirect("admin/blog/category");
		}

	
		public function insert_cat(){
			//validate the form data 

			$this->form_validation->set_rules('cname', 'category Name', 'required');

	        if ($this->form_validation->run() == FALSE){
				redirect('admin/blog/category');
			}else{
				
				//get the form values
				$data['cname'] = $this->input->post('cname', TRUE);
				

					//store pic data to the db
					$this->blogmodel->insert_cat($data);

					redirect('admin/blog/category');
			}
			
		}

		public function edit_category()
		{
			$data['title'] ="Edit Category";

			$id = $this->input->get('cid', TRUE);

			$result['cdata']=$this->blogmodel->displaycat();
			$qdetails=$this->blogmodel->edit_cat($id);

			$cdata = array_merge($result,['erow'=>$qdetails]);

			$this->load->view('admin/common/header',$data);
			$this->load->view('admin/editcategory', $cdata);
			$this->load->view('admin/common/footer'); 
		}

		public function update_category()
		{
			
			$data['cname'] = $this->input->post('cname', TRUE);
				

					//store pic data to the db
					$this->blogmodel->update_cat($data);

					redirect('admin/blog/category');
		}


}