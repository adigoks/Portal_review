<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_layout extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct()
			$this->load->helper('url');
			$this->load->model('layout_model');
			$this->load->library('session');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

	}

?>