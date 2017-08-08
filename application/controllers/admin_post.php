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
			$this->form_validation->set_rules('tag_post','tag','required');
			$this->form_validation->set_rules('kategori_post','kategori','required');

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
				echo('sss');
			}		

		}

	}

?>