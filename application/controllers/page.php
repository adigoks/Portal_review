<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	include (dirname(__FILE__)."/welcome.php");

	class Page extends Welcome
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('date');
			$this->load->library('email');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->model('page_model');
			$this->load->model('user_model');
			$this->load->model('menu_model');
		}
		public function index()
		{
			$this->initHead();
			$this->menu_list();
			$this->load_static();
			$this->load->view('front_footer');
		}

		public function load_static()
		{
			# code...
			
			$data['content'] = $this->load->view('front_page','',true);
			$this->load->view('front_body',$data);
		}

		public function saran()
		{
			# code...
		}

		public function form_login()
		{		
			$this->initHead();
			$this->menu_list();
			$data['content'] = $this->load->view('user_login', '', true);
			$this->load->view('front_body', $data);
			$this->load->view('front_footer');		
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
				$this->load->view('front_head');
				$this->menu_list();
				$data['content'] = $this->load->view('user_login', '', true);
				$this->load->view('front_body', $data);
				$this->load->view('front_footer');	
			}
			else
			{
				if ($num > 0) 
				{
					$array_item = array(
						'id_author' => $temp->id,
						'username' => $temp->user_name,
						'level'=> $temp->user_level,
						'logged' => 'true' );

					$this->session->set_userdata($array_item);

					$this->loadinit();
				}
				else
				{
					$this->session->set_flashdata('notification', 'User name dan password tidak cocok');

					redirect(site_url('page/form_login'));
				}
			}
		}

		public function logout()
		{
			unset($_SESSION['logged']); 
			$this->session->sess_destroy();
			$this->loadinit();
		}

		public function form_daftar()
		{
			$this->initHead();
			$this->menu_list();
			$data['content'] = $this->load->view('user_daftar', '', true);
			$this->load->view('front_body', $data);
			$this->load->view('front_footer');			
		}
		public function form_profile()
		{
			$this->initHead();
			$this->menu_list();
			$data['content'] = $this->load->view('front_profile', '', true);
			$this->load->view('front_body', $data);
			$this->load->view('front_footer');			
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
			$img = $_FILES['foto'];
   
        	$file_name = $img['name'];
			$file_type = $img['type'];
			$file_size = $img['size'];

			$akun = $this->user_model->select_username($username)->row();
			$num = count($akun); 

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
				$this->load->view('front_head');
				$this->menu_list();
				$data['content'] = $this->load->view('user_daftar', '', true);
				$this->load->view('front_body', $data);
				$this->load->view('front_footer');
			}
			else{
				if ($num == 1) {
					$this->session->set_flashdata('notification', 'Peringatan : username sudah tersedia');
					redirect(site_url('page/form_daftar'));
				}
				else{
					if ($pass == $repass) {
					$this->email->from('fichasa7@gmail.com', 'Meveriz');
					$this->email->to($email);
					$this->email->subject('Validasi Register');
					$this->email->message('Please go to this link to verify your register'.$hash_valid);
					$a = $this->email->send();

						if ($a) {
							$this->session->set_flashdata('notification', 'Peringatan : Email tidak valid');
							redirect(site_url('page/form_daftar'));
						}
						else{
							if (($file_size <= 2560000) && ($file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/gif')) {
								$name = str_replace(" ", "-", $file_name);
								$file_tmp_name = $img['tmp_name'];
								if($file_name)
								{	
									move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
									$data['user_profile_img'] = $name;
									$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
									$this->user_model->insert($data);
									redirect(site_url('page/form_login'));	
								}
							}
							else{
								$this->session->set_flashdata('notification', 'Peringatan : Format file salah');					
								redirect(site_url('page/form_daftar'));
							}
						}
					}
					else{
						$this->session->set_flashdata('notification', 'Peringatan : Password dan Re-Password tidak cocok');
						redirect(site_url('page/form_daftar'));
					}
				}
			}
		}
	}

?>