<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Post extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('post_model');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->model('menu_model');
		}
		public function index()
		{
			$this->load->view('front_head');
			$this->menu_list();
			
			if($this->uri->segment(1)=='post' && $this->uri->segment(2) == true)
			{
				$this->post_detail($this->uri->segment(2));
			}else{

			$this->tag();
			
			}
			$this->load->view('front_footer');	
			
		}
		public function menu_list()
		{
			$data['menu'] = $this->menu_model->selectSort();
			$this->load->view('front_header', $data);
		}

		public function post_detail($uri){
			$data['post']= $this->post_model->showUri($uri)->row();
			

			$data['content'] =$this->load->view('front_post',$data,true);

			$data['content'] = $this->load->view('front_main_post', $data,true);

			// $data['content'] .=  $this->load->view('front_content',$data,true);
			$this->load->view('front_body', $data);
		}

		public function tag()
		{

			
			$data['content'] =$this->load->view('tag_list','',true);

			$data['content'] = $this->load->view('front_main_post', $data,true);

			// $data['content'] .=  $this->load->view('front_content',$data,true);
			$this->load->view('front_body', $data);
			
			# code...
		}


		public function kategori()
		{
			# code...
		}
	}

?>