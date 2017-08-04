<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Page extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct()
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('page_model');
		}

		public function load_static()
		{
			# code...
		}

		public function saran()
		{
			# code...
		}

		public function login()
		{
			# code...
		}

		public function daftar()
		{
			# code...
		}

	}

?>