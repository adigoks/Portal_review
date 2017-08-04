<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Layout extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct()
			$this->load->helper('url');
			$this->load->model('layout_model');
		}

		public function head()
		{
			# code...
		}

	}

?>