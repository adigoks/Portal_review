<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_media extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->library('session');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		function index()
		{
			
			$data['content'] = $this->load->view('form_media', '', true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function sortDirToArray($dir) {
  
			$result = array();

			$cdir = scandir($dir);

			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..","index.html")))
				{
					if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
					{
						$result[] = $value;
					}
				}
			}

			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..","index.html")))
				{
					if (!is_dir($dir . DIRECTORY_SEPARATOR . $value))
					{
						$result[] = $value;
					}
				}
			}
			return $result;
		} 

		function dirToArray($dir)
		{
			$result = array();

			$cdir = $this->sortDirToArray($dir);
			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..","index.html")))
				{
					if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
					{
						$result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
					}else
					{
						$result[] = $value;
					}
				}
			}

			return $result;
		}

		function media_list($directory='image'){
			
			$data['directory'] = $directory;
			$data['dir'] = $this->dirToArray($directory);

			echo $this->load->view('media_list', $data, true);
		}
	}

?>