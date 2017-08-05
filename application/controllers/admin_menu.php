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
		public function index()
		{

		}
		public function menu_edit()
		{
			
		}

		public function menu_tambah()
		{
			# code...
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