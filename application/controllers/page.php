<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Page extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('date');
			$this->load->library('email');
			$this->load->library('form_validation');
			$this->load->model('page_model');
			$this->load->model('user_model');
		}

		public function load_static()
		{
			# code...
		}

		public function saran()
		{
			# code...
		}

		public function login()
		{
			# code...
		}

		public function form_daftar()
		{
			$this->load->view('user_daftar');
		}

		public function daftar()
		{
			$username = $this->input->post('username');
			$time = date('Y-m-d H:i:s');
			$confirm = 0;
			$hash_valid = md5($username.$time.$confirm);
			$repass = $this->input->post('re_password');
			$pass = $this->input->post('password');
			$email = $this->input->post('email');

			$data['user_name'] = $this->input->post('username');
			$data['user_email'] = $this->input->post('email');
			$data['user_level'] = 2;
			$data['user_confirm'] = 0;
			$data['user_active'] = 1;
			$data['user_validation'] = $hash_valid;

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('re_password', 'Re-Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('user_daftar');
			}
			else{
				if ($pass == $repass) {
					$this->email->from('estragar333@gmail.com', 'Meveriz');
					$this->email->to($email);
					$this->email->subject('Validasi Register');
					$this->email->message('Please go to this link to verify your register'.$hash_valid);

					if ($this->email->send() == FALSE) {
						$this->load->view('user_daftar');
					}
					else{
						$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
						$this->user_model->insert($data);
						$this->load->view('user_profil');
					}
					
				}
				else{
					$this->load->view('user_daftar');
				}
			}
		}
	}

?>