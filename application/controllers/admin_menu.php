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

		}
		
		function index()
		{
			# code...
			$this->load->view('form_tambah_menu');

		}
		public function menu_edit()
		{

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
				# code...
				$this->load->view('form_tambah_menu');
			}
			else
			{
				if ($a == 'none') 
				{
					$data['menu_name'] = $this->input->post('menu_name');
					$data['menu_url_type'] = $this->input->post('menu_tipe');

					$this->menu_model->insert($data);
					redirect(site_url('admin_menu'));
				}
				else
				{
					$data['menu_name'] = $this->input->post('menu_name');
					$data['menu_url_type'] = $this->input->post('menu_tipe');

					$this->load->view('next_tambah_menu', $data);
				}
				
			}
		}

		function menu_tambah_url()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('url');

			$this->form_validation->set_rules('url','URL','required');

			if ($this->form_validation->run()==FALSE) 
			{
				# code...
				$this->load->view('next_tambah_menu');
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin_menu'));
			}

		}

		public function menu_sesuaikan()
		{
			$this->load->model('menu_model');

			$menu['list'] = $this->menu_model->selectSort();

			

			$data['content'] = $this->load->view('menu_config', $menu, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);

		}

	}

?>