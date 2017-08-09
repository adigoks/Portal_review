<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_post extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->load->model(array('post_model','user_model','page_model'));
			$this->load->library('pagination');
			
			

			$this->load->model('post_model');
			$this->load->model('page_model');


			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		function index()
		{
			$this->tambah_post();
		}

		function tambah_post()
		{
			
			$data['content'] = $this->load->view('admin_tambah_post', '', true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}


		function sesuaikan_post($offset=0)
		{
			
			$data['post']=$this->post_model->showAll()->result();
			$data['post_page']=$this->page_model->showAll()->result();
			$a=$this->session->userdata('id_author');
			$b=intval($a);
			$data['post_id']=$this->user_model->selectId($b)->result();
			
						#paginasi
			$perpage =10;
			
			$config = array(
							'base_url'=>site_url('admin_post/sesuaikan_post'),
							'total_rows'=>count($this->post_model->showAll()->result()),
							'per_page'=>$perpage);
			$config2 = array(
							'base_url'=>site_url('admin_post/sesuaikan_post'),
							'total_rows'=>count($this->page_model->showAll()->result()),
							'per_page'=>$perpage);
			$this->pagination->initialize($config,$config2);
			$limit['perpage']=$perpage;
			$limit['offset']=$offset;
			$data['post']=$this->post_model->paging($limit)->result();
			$data['post_page']=$this->page_model->pagination($limit)->result();
			$data['content'] = $this->load->view('admin_sesuaikan_post', $data, true);
			
			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}
		
		

		function add_post()
		{
			$data['post_judul'] = $this->input->post('judul_post');
			$data['post_isi'] = $this->input->post('isi_post');
			$data['post_tag'] = $this->input->post('tag_post');
			$data['post_kategori'] = $this->input->post('kategori_post');
			$id = $this->session->userdata('id_author');
			$data['post_author'] = $id;

			echo('post_author');
			$koment = $this->input->post('enable_comment');

			if (isset($koment)) 
			{
				$data['post_enable_comment'] = 1;
			}

			$this->form_validation->set_rules('judul_post','Judul Artikel','required');
			$this->form_validation->set_rules('isi_post','Isi Artikel','required');

			$simpan = $this->input->post('simpan_post');

			if($simpan == 'simpan post')
			{
				if ($this->form_validation->run() == FALSE) 
				{
					redirect(site_url('admin_post'));
				}
				else
				{
					$this->post_model->insert($data);
					echo $this->session->set_flashdata('pesan','Post berhasil ditambahkan');
					redirect(site_url('admin_post'));		
				}
			}
			else
			{
				if ($this->form_validation->run() == FALSE) 
				{
					redirect(site_url('admin_post'));
				}
				else
				{
					$data['post_published'] = 1;
					$this->post_model->insert($data);
					echo $this->session->set_flashdata('pesan','Post berhasil ditambahkan');
					redirect(site_url('admin_post'));		
				}
			}		

		}
		
		function form_edit_post($id)
		{
			$data['id_post'] = $this->post_model->selectId($id)->row();
			$data['content'] = $this->load->view('admin_edit_post', $data, true);

			$data['content'] =$this->load->view('admin_body', $data, true);
			$this->load->view('admin_pane', $data);
		}

		function edit_post()
		{

		}

		function add_page()
		{
			$data['page_name'] = $this->input->post('nama_page');
			$data['page_judul'] = $this->input->post('judul_page');
			$data['page_isi'] = $this->input->post('isi_page');
			
			$this->form_validation->set_rules('nama_page','Nama page','required');
			$this->form_validation->set_rules('judul_page','Judul page','required');
			$this->form_validation->set_rules('isi_page','Isi page','required');

			$button = $this->input->post('simpan_page');

			if($button == 'simpan')
			{
				if ($this->form_validation->run() == FALSE) 
				{
					redirect(site_url('admin_post#menu1'));;
				}
				else
				{
					$this->page_model->insert($data);
					echo $this->session->set_flashdata('pesan','Page berhasil ditambahkan');
					redirect(site_url('admin_post#menu1'));
				}
			}
			else
			{
				if ($this->form_validation->run() == FALSE) 
				{
					redirect(site_url('admin_post#menu1'));
				}
				else
				{
					$this->page_model->insert($data);
					echo $this->session->set_flashdata('page_pesan','Page berhasil ditambahkan');
					redirect(site_url('admin_post#menu1'));		
				}
			}
		}

	}

?>