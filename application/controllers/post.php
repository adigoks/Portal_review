<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	include (dirname(__FILE__)."/welcome.php");

	class Post extends Welcome
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

			
			if($this->uri->segment(1)=='post' && $this->uri->segment(2) == true)
			{
				$data['post']= $this->post_model->showUri($this->uri->segment(2))->row();
				$this->initHead($data);
				$this->menu_list();
				$this->post_detail($this->uri->segment(2));
			}else if ($this->uri->segment(1)=='post' && $this->uri->segment(2) == false){
				redirect(site_url());
			}else{
				$this->initHead();
				$this->menu_list();
				$this->tag($tag);
			
			}
			$this->load->view('front_footer');	
			
		}

		public function post_detail($uri){
			$data['post']= $this->post_model->showUri($uri)->row();
			$data['widget'] = $this->post_model->showPopuler()->result();
			$data['trending'] = $this->post_model->showTrending()->result(); 

			$data['content'] =$this->load->view('front_post',$data,true);

			$data['content'] = $this->load->view('front_main_post', $data,true);

			// $data['content'] .=  $this->load->view('front_content',$data,true);
			$this->load->view('front_body', $data);
		}

		public function tag($tag, $page=1)
		{

			$this->initHead();
			$this->menu_list();

			$data['widget'] = $this->post_model->showPopuler()->result();
			$data['trending'] = $this->post_model->showTrending()->result();
			$data['post']= $this->post_model->showTag($tag)->row();
			$data['post1']= $this->post_model->showTag($tag)->result();

			$data['perpage'] = 3;
			$offset = ($page - 1) * $data['perpage'];
			$data['config'] =array(
				'base_url' =>site_url('post/tag'),
				'total_rows' =>count($this->post_model->showTag($tag)->result()),
				'per_page' =>$data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];

			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page'] = $page;
			$data['paging_tag'] = $this->post_model->paging_tag($tag, $limit)->result();

			$data['content'] =$this->load->view('paginasi_tag',$data,true);

			$data['content'] = $this->load->view('front_main_post', $data,true);

			// $data['content'] .=  $this->load->view('front_content',$data,true);
			$this->load->view('front_body', $data);
			$this->load->view('front_footer');	
			
			# code...
		}

		public function author($id, $page=1)
		{
			$this->initHead();
			$this->menu_list();

			$data['widget'] = $this->post_model->showPopuler()->result();
			$data['trending'] = $this->post_model->showTrending()->result();
			$data['id_list']= $this->post_model->showAuthor($id)->row();
			$data['id_list1']= $this->post_model->showAuthor($id)->result();

			$data['perpage'] = 3;
			$offset = ($page - 1) * $data['perpage'];
			$data['config'] =array(
				'base_url' =>site_url('post/author'),
				'total_rows' =>count($this->post_model->showAuthor($id)->result()),
				'per_page' =>$data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];

			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page'] = $page;
			$data['paging_id'] = $this->post_model->paging_author($id, $limit)->result();

			$data['content'] =$this->load->view('paginasi_author',$data,true);

			$data['content'] = $this->load->view('front_main_post', $data,true);

			// $data['content'] .=  $this->load->view('front_content',$data,true);
			$this->load->view('front_body', $data);
			$this->load->view('front_footer');
		}

		public function post_populer()
		{
			# code...
		}

		public function kategori()
		{
			# code...
		}
	}

?>