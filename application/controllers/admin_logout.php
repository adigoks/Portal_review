<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_logout extends CI_Controller
	{
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->helper('form');
			$this->load->library('session');
		}
		function index()
		{
			$this->load->view('admin_login');
		}

		function Logout()
		{
			$this->session->sess_destroy(); 
			redirect(site_url('admin_login'));
		}
	}
?>