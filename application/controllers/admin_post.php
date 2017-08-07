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
			$this->load->helper('html');

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

	}

?>