<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_profil extends CI_Controller
	{
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper('html');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		function index()
		{
			$this->profil();
		}

		function profil()
		{
			$data['content'] = $this->load->view('admin_profil_form', '', true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

	}

?>