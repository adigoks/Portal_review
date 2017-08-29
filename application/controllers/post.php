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
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->helper('form');
			$this->load->model('menu_model');
			$this->load->model('komentar_model');
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
			$this->add_log($this->uri->uri_string());
			
		}

		public function post_detail($uri, $page = 1){
			$data['post']= $this->post_model->showUri($uri)->row();
			$data['widget'] = $this->post_model->showPopuler()->result();
			$data['trending'] = $this->post_model->showTrending()->result();

			$id_user = $this->session->userdata('id_user');
			$data['name_user'] = $this->user_model->selectId($id_user)->row();

			$koment = $data['post']->id;
			$total = count($this->komentar_model->select_komentar_post($koment)->row());
			if ($total > 0) {
				$data['komentar'] = $this->komentar_model->select_komentar_post($koment)->row();
				$id_balas = $data['komentar']->komentar_id;
				$data['balas'] = $this->komentar_model->select_komentar_balas($id_balas)->result();
			}
			
			//Paginasi koment
			$data['perpage'] = 3;
			$offset = ($page - 1) * $data['perpage'];
					
			$data['config'] =array(
				'base_url' =>site_url('post/'.$data['post']->post_uri),
				'total_rows' =>count($this->komentar_model->select_komentar_post($koment)->result()),
				'per_page' =>$data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];
					
			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page'] = $page;
			$data['paging_komentar'] = $this->komentar_model->paging_komen($limit, $koment)->result();
			//end paginasi

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
			$data['post']= $tag;
			$tag = str_replace('-', ' ', $tag);
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
			$this->add_log($this->uri->uri_string());
			
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
			$this->add_log($this->uri->uri_string());
		}

		public function post_populer()
		{
			# code...
		}

		public function kategori()
		{
			# code...
		}

		public function search($keyword=null, $page=1)
		{
			if($keyword==null)
			{
				$keyword = $this->input->post('search');	
			}else{
				$keyword = str_replace('+', ' ', $keyword);
			}
			
			if($keyword!='')
			{
				
				$this->initHead();
				$this->menu_list();

				$data['widget'] = $this->post_model->showPopuler()->result();
				$data['trending'] = $this->post_model->showTrending()->result();
				$data['post']= $keyword;
				$data['post1']= $this->post_model->search($keyword)->result();

				$data['perpage'] = 3;
				$offset = ($page - 1) * $data['perpage'];
				$data['config'] =array(
					'base_url' =>site_url('post/search'),
					'total_rows' =>count($this->post_model->search($keyword)->result()),
					'per_page' =>$data['perpage']);
				$limit['offset'] = $offset;
				$limit['perpage'] = $data['perpage'];

				$data['offset'] = $offset;
				$data['total'] = $data['config']['total_rows'];
				$data['page'] = $page;
				$data['paging_search'] = $this->post_model->paging_search($keyword, $limit)->result();

				$data['content'] =$this->load->view('paginasi_search',$data,true);

				$data['content'] = $this->load->view('front_main_post', $data,true);

				// $data['content'] .=  $this->load->view('front_content',$data,true);
				$this->load->view('front_body', $data);
				$this->load->view('front_footer');	
				$this->add_log($this->uri->uri_string());
			}else{
				redirect(site_url());
			}
		}

		public function komentar()
		{
			$id = $this->session->userdata('id_user');
			$user = $this->user_model->selectId($id)->row();

			$user_id = $user->id;
			$url = $this->input->post('post_url');

			$data['komen_isi'] = $this->input->post('komen_box');
			$data['komen_post'] = $this->input->post('post_id');
			$data['komen_user_id'] = $user_id;
			$data['komen_parent'] = 0;
			
			$this->komentar_model->insert($data);

			redirect(site_url('post/'.$url));
		}


		public function balas_komen()
		{
			$id = $this->session->userdata('id_user');
			$user = $this->user_model->selectId($id)->row();

			$user_id = $user->id;
			$url = $this->input->post('post_url');

			$data['komen_isi'] = $this->input->post('reply');
			$data['komen_post'] = $this->input->post('post_id');
			$data['komen_user_id'] = $user_id;
			$data['komen_parent'] = $this->input->post('balas_id');
			
			$this->komentar_model->insert($data);

			redirect(site_url('post/'.$url));
		}
	}

?>