<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/

	class Admin_menu extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->model('menu_model');
			$this->load->model('post_model');
			$this->load->model('page_model');

		}

		function cek_login()
		{
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}
		
		function index()
		{
			$this->tambah();
			

		}

		function tambah()
		{
			$this->cek_login();

			$menu['list'] = $this->menu_model->selectSort();

			

			$data['content'] = $this->load->view('form_tambah_menu', $menu, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);

		}
		public function menu_edit()
		{
			$this->cek_login();

			$this->load->model('menu_model');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->helper('form');
		}

		function menu_tambah()
		{
			# code...
			$a = $this->input->post('menu_tipe');

			$this->form_validation->set_rules('menu_name','Nama Menu','required');

			if ($this->form_validation->run()==FALSE) 
			{
				redirect(site_url('admin_menu'));
			}
			else
			{
				$data['menu_name'] = $this->input->post('menu_name');
				$data['menu_url_type'] = $this->input->post('menu_tipe');

				if ($a == 'none') 
				{

					$this->menu_model->insert($data);
					redirect(site_url('admin_menu'));
				}
				else if ($a == 'external_link') 
				{
					$data['content'] = $this->load->view('tambah_menu_link', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else if ($a == 'post') 
				{
					$data['post_list'] = $this->post_model->showAll()->result();
					$data['content'] = $this->load->view('tambah_menu_post', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else if ($a == 'tag') 
				{
					$data['tag_list'] = $this->post_model->showAll()->result();
					$data['content'] = $this->load->view('tambah_menu_tag', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else if ($a == 'page') 
				{
					$data['page_list'] = $this->page_model->showAll()->result();
					$data['content'] = $this->load->view('tambah_menu_page', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}


			}
		}

		function menu_tambah_link()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('link');

			$this->form_validation->set_rules('link','External Link','required');

			if ($this->form_validation->run()==FALSE) 
			{
				# code...
				$data['content'] = $this->load->view('tambah_menu_link', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin_menu'));
			}

		}

		function menu_tambah_post()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('post');

			$this->form_validation->set_rules('post','Judul Post','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$data['post_list'] = $this->post_model->showAll()->result();
				$data['content'] = $this->load->view('tambah_menu_post', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin_menu'));
			}

		}

		function menu_tambah_tag()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('tag');

			$this->form_validation->set_rules('tag','Nama Tag','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$data['tag_list'] = $this->post_model->showAll()->result();
				$data['content'] = $this->load->view('tambah_menu_tag', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin_menu'));
			}

		}

		function menu_tambah_page()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('page');

			$this->form_validation->set_rules('page','Page Judul','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$data['page_list'] = $this->page_model->showAll()->result();
				$data['content'] = $this->load->view('tambah_menu_page', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin_menu'));
			}

		}

		public function menu_sesuaikan()
		{
			$this->cek_login();
			$this->load->model('menu_model');

			$menu['list'] = $this->menu_model->selectSort();

			

			$data['content'] = $this->load->view('menu_config', $menu, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);

		}

	}

?>