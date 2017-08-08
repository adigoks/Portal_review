<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_login extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->library('session');
			
		}

		public function index()
		{
			$this->load->view('admin_login');

		}

		public function login ()
		{
			$username = $this->input->post('user_name', true);
			$password= $this->input->post('password', true);
			$password = "pnvs#%12".$password."41;1*";
			$temp = $this->user_model->select_us($username, md5($password))->row();
			$num = count($temp);

			$this->form_validation->set_rules('user_name','User Name','required');
			$this->form_validation->set_rules('password','Password','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$this->load->view('admin_login');
			}
			else
			{
				if ($num > 0) 
				{
					$array_item = array(
						'username' => $temp->user_name,
						'password' => $temp->user_password,
						'level'=> $temp->user_level,
						'logged_in' => true );

					$this->session->set_userdata($array_item);

					redirect(site_url('admin_login/success_page'));
				}
				else
				{
					$this->session->set_flashdata('notification', 'User name dan password tidak cocok');

					redirect(site_url('admin_login'));
				}
			}
		}

		public function success_page()
		{
			$logged_in = $this->session->userdata('logged_in');
			if (!$logged_in) 
			{

				redirect(site_url('admin_login'));
			}
			else
			{
				redirect(site_url('admin-dashboard/menu'));
			}
		}

	}

?>