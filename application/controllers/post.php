<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Post extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct()
			$this->load->helper('url');
			$this->load->model('post_model');
		}

		public function tag()
		{
			# code...
		}

		public function kategori()
		{
			# code...
		}
	}

?>