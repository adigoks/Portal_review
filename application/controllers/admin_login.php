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

			

			$config = Array(
   				'protocol' => 'smtp',
    			'smtp_host' => 'ssl://smtp.gmail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'emailcobaportal@gmail.com',
			    'smtp_pass' => 'cobaportal',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
				);

			$this->load->library('email', $config);

		}

		public function index()
		{
			$this->cek_login();
			$this->load->view('admin_login');

		}
		public function cek_login()
		{
			if ($this->session->userdata('logged_in') == true) 
			{

				redirect(site_url('admin-dashboard'));
			}
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
						'id_author' => $temp->id,
						'username' => $temp->user_name,
						'level'=> $temp->user_level,
						'logged_in' => 'true' );

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
			if ($logged_in) 
			{
				redirect(site_url('admin-dashboard'));
				
			}
			else
			{
				redirect(site_url('admin_login'));
			}
		}

		public function lupa_password()
		{
			$this->cek_login();
			$this->load->view('admin_lupa_pass');
		}

		public function admin_lupa_pass()
		{
			$this->cek_login();
			$a = $this->input->post('kirim');
			if(isset($a)){

				$username = $this->input->post('user_name');
				$email = $this->input->post('email');

				$this->form_validation->set_rules('user_name', 'Username', 'required');
				$this->form_validation->set_rules('email', 'E-mail', 'required');

				$akun = $this->user_model->select_username_admin($username)->row();

				$count = count($akun);

				if($count > 0){
				$id = $akun->id;
				}
				if ($this->form_validation->run() == FALSE) {
						$this->lupa_password();
						var_dump($id);
				}else{

						if($akun->user_name != $username){
							$this->session->set_flashdata('notification', 'Username salah');
							redirect(site_url('admin_login/lupa_password'));

						}
						elseif($akun->user_email != $email){
							$this->session->set_flashdata('notification', 'Email anda salah');
							redirect(site_url('admin_login/lupa_password'));
						}

						else{
							var_dump('$akun');
							$this->email->set_newline("\r\n");
							$this->email->from('emailcobaportal@gmail.com', 'wibu master');
							$this->email->to('emailcobaportal@gmail.com');
							$this->email->subject('Request reset password ');
							$this->email->message($akun->user_name." meminta permintaan reset passwords");
							$kirim = $this->email->send();

							if ($kirim == FALSE) {
								$this->session->set_flashdata('notification', 'silahkan cek koneksi anda atau email anda');
								redirect(site_url('admin_login/lupa_password'));
							}
							else{
								$data['user_forgot'] = 1;
								
								$this->user_model->update($data, $id);
								redirect(site_url('admin_login'));	
							}
						}					
					}
				}
			else{
				redirect(site_url('admin_login/lupa_password'));
				
			}	 
			
			
		}
	}

?>