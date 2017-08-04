<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_login extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct()
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('layout_model');
		}

	}

?>