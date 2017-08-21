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
			$this->load->library('session');
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

		public function form_login()
		{		
			$this->load->view('user_login');			
		}

		public function login()
		{
			$username = $this->input->post('username', true);
			$password= $this->input->post('password', true);
			$password = "pnvs#%12".$password."41;1*";
			$temp = $this->user_model->select_us1($username, md5($password))->row();
			$num = count($temp);
			
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$this->load->view('form_login');
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

					$this->load->view('user_profil');
				}
				else
				{
					$this->session->set_flashdata('notification', 'User name dan password tidak cocok');

					redirect(site_url('page/form_login'));
				}
			}
		}

		public function form_daftar()
		{
			$this->load->view('user_daftar', array('error'=>''));
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
			$foto = $this->input->post('foto');

			$akun = $this->user_model->select_username($username)->row();
			$num = count($akun);


			/*$config['upload_path'] = './image/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1000';        
			$config['max_width'] = '1024';        
			$config['max_height'] = '768'; 

			$this->load->library('upload', $config);*/

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
			//$error = array('error' => $this->upload->display_errors());

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('user_daftar'/*, $error*/);
			}
			else{
				if ($num == 1) {
					$this->session->set_flashdata('notification', 'Peringatan : username sudah tersedia');
					$this->load->view('user_daftar'/*, $error*/);
				}
				else{
					if ($pass == $repass) {
					/*$this->email->from('estragar333@gmail.com', 'Meveriz');
					$this->email->to($email);
					$this->email->subject('Validasi Register');
					$this->email->message('Please go to this link to verify your register'.$hash_valid);

					if ($this->email->send() == FALSE) {
						$this->load->view('user_daftar');*/
					/*}
					else{*/
						//if (!$this->upload->do_upload()) {
							
							//$this->load->view('user_daftar', $error);
						//}
						//else{
							//$upload_data = $this->upload->data();
							$data['user_profile_img'] = $foto;
							//$data = array('upload_data' => $upload_data );
							$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
							$this->user_model->insert($data);
							$this->load->view('user_profil');
						//}
						
					//}
					
					}
					else{
						$this->session->set_flashdata('notification', 'Peringatan : Password dan Re-Password tidak cocok');
						$this->load->view('user_daftar'/*, $error*/);
					}
				}
			}
		}
	}

?>