<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
			$this->load->model('blogmodel');
			$this->load->model('usersmodel');
			}
		
        public function index()
		{
			
		$config = array();
        $config["base_url"] = base_url("blog/index");
        $config["total_rows"] = $this->blogmodel->post_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;

        $config['page_query_string'] = TRUE;
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li class="page-item">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li class="page-item">';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active page-item"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $result['data']=$this->blogmodel->displaypost($config["per_page"],$page);


			$result["links"]=$this->pagination->create_links();

			$result['catdata']=$this->blogmodel->displaycategory();
			$result['postdata']=$this->blogmodel->recentpost();
			$fresult['fdata']=$this->usersmodel->page();

			$this->load->view('frontend/common/header',$result);
			$this->load->view('frontend/blog', $result);
			$this->load->view('frontend/common/footer',$fresult); 
		}

		public function post($id){

			$id = $id=$this->uri->segment(3);
			
			$this->load->model('blogmodel');
			$this->load->model('usersmodel');

			$qdetails = $this->blogmodel->view_post($id);
			
			$webco['data']=$this->blogmodel->displaycategory();
			$webco['postdata']=$this->blogmodel->recentpost();
			$fresult['fdata']=$this->usersmodel->page();

			$result = array_merge($webco,['brow'=>$qdetails]);
		

			$this->load->view('frontend/common/header-blog',$result);
			$this->load->view('frontend/post', $result);
			$this->load->view('frontend/common/footer', $fresult);
		
		
		}


		public function category(){

		$id = $this->input->get('id', TRUE);

		$this->load->model('blogmodel');
		$this->load->model('usersmodel');
			
		$config = array();
        $config["base_url"] = base_url("blog/category?id=$id");
        $config["total_rows"] = $this->blogmodel->catpost_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;

        $config['page_query_string'] = TRUE;
	    $config['prev_link'] = '&lt; Prev';
	    $config['prev_tag_open'] = '<li class="page-item">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = 'Next &gt;';
	    $config['next_tag_open'] = '<li class="page-item">';
	    $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active page-item"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $config['first_link'] = FALSE;
	    $config['last_link'] = FALSE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $result['data']=$this->blogmodel->categorypost($config["per_page"],$page);


			$result["links"]=$this->pagination->create_links();
			
			$result['catdata']=$this->blogmodel->displaycategory();
			$result['postdata']=$this->blogmodel->recentpost();
			$fresult['fdata']=$this->usersmodel->page();


			$this->load->view('frontend/common/header',$result);
			$this->load->view('frontend/blog', $result);
			$this->load->view('frontend/common/footer',$fresult); 
		}

		

}