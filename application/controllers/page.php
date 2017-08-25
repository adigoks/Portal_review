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
						'id_user' => $temp->id,
						'username_user' => $temp->user_name,
						'level_user'=> $temp->user_level,
						'logged' => 'true' );

					$this->session->set_userdata($array_item);
					$this->page();
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
			$this->page();
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
			$id = $this->session->userdata('user_author');
			$data['detail_id'] = $this->user_model->selectId($id)->row();
			$data['content'] = $this->load->view('front_profile', $data, true);
			$this->load->view('front_body', $data);
			$this->load->view('front_footer');			
		}

		public function update()
		{
			$id = $this->session->userdata('user_author');
			$pass = $this->input->post('new_password');
			$pass2 = $this->input->post('re_new_password');
			$foto = $_FILES['foto'];

			if (isset($foto) != "" ) {
				$file_name = $foto['name'];
				$file_type = $foto['type'];
				$file_size = $foto['size'];

				if (($file_size <= 2560000) && ($file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/gif')) {
					$name = str_replace(" ","-", $file_name);
					$file_tmp_name = $foto['tmp_name'];
					if ($pass != "") {
						$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
						$this->form_validation->set_rules('re_new_password', 'Re-type Password', 'required');

						if ($this->form_validation->run() == FALSE) {
							redirect(site_url('page/form_profile'));
						}
						elseif ($pass != $pass2) {
							$this->session->set_flashdata('notification', 'Peringatan : Password baru dan Re-Type Password tidak cocok');
							redirect(site_url('page/form_profile'));
						}
						else{
							if($file_name){
							move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
							$data['user_profile_img'] = $name;
							$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
							$data['user_name'] = $this->input->post('username');
							$data['user_email'] = $this->input->post('email');
							$this->user_model->update($data,$id);
							redirect(site_url('page/form_profile'));
							}
						}
					}
					else{
						if($file_name){
						move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
						$data['user_profile_img'] = $name;
						$data['user_name'] = $this->input->post('username');
						$data['user_email'] = $this->input->post('email');
						$this->user_model->update($data,$id);
						redirect(site_url('page/form_profile'));
						}
					}
				}
				else{
					$this->session->set_flashdata('notification', 'Peringatan : Format foto salah');
					redirect(site_url('page/form_profile'));
				}
			}
			else{
				if ($pass != "") {
					$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
					$this->form_validation->set_rules('re_new_password', 'Re-type Password', 'required');


					if ($this->form_validation->run() == FALSE) {
						redirect(site_url('page/form_profile'));
					}
					elseif ($pass != $pass2) {
						$this->session->set_flashdata('notification', 'Peringatan : Password baru dan Re-Type Password tidak cocok');
						redirect(site_url('page/form_profile'));
					}
					else{
						if($file_name){
						$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
						$data['user_name'] = $this->input->post('username');
						$data['user_email'] = $this->input->post('email');
						$this->user_model->update($data,$id);
						redirect(site_url('page/form_profile'));
						}
					}
				}
				else{
					$data['user_name'] = $this->input->post('username');
					$data['user_email'] = $this->input->post('email');
					$this->user_model->update($data,$id);
					redirect(site_url('page/form_profile'));
				}
			}
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