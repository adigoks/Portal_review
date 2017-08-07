<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_dashboard extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function index()
		{
			// if(cek session e sudah loginkah?)
			// {
				$this->load->view('admin_pane');	
			// }else
			// {
			// 	mbalik ning admin login
			// }
			
		}
	}

?>