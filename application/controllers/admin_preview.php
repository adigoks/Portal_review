<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_preview extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->library('session');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		public function index()
		{
			$data['target'] = $this->input->get('target');
			
			$data['default'] = $this->input->get('default');
			$this->load->view('preview',$data);
			
		}
	}

?>