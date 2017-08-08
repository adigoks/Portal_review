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


		function sesuaikan_post()
		{
			$data['content'] = $this->load->view('admin_sesuaikan_post', '', true);

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

		function add_page()
		{
			$data['page_name'] = $this->input->post('nama_page');
			$data['page_judul'] = $this->input->post('judul_page');
			$data['page_isi'] = $this->input->post('isi_page');
			
			$this->form_validation->set_rules('nama_page','Nama page','required');
			$this->form_validation->set_rules('judul_page','Judul page','required');
			$this->form_validation->set_rules('isi_page','Isi page','required');

			$button = $this->input->post('simpan_page');
			var_dump($data);
			if($button == 'simpan')
			{
				if ($this->form_validation->run() == FALSE) 
				{
					echo '<script>alert("gagal");</script>';
					redirect(site_url('admin_post#menu1', 'refresh'));
				}
				else
				{

					$this->page_model->insert($data);
					echo $this->session->set_flashdata('page_pesan','Page berhasil ditambahkan');
					redirect(site_url('admin_post#menu1'));		
				}
			}
			else
			{
				if ($this->form_validation->run() == FALSE) 
				{
					echo('gagal');
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