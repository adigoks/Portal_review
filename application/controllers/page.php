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
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->model('page_model');
			$this->load->model('user_model');
			$this->load->model('menu_model');
			$this->load->model('saran_model');

			$config = Array(
   				'protocol' => 'smtp',
    			'smtp_host' => 'ssl://smtp.gmail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'portal.myreview@gmail.com',
			    'smtp_pass' => 'intel inside',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
				);

			$this->load->library('email', $config);
		}
		public function index($uri='')
		{
			switch ($uri) {
				case 'saran':
					$this->saran();
					break;
				case 'form_daftar':
					$this->form_daftar();
					break;
				case 'form_login':
					$this->form_login();
					break;
				case 'login':
					$this->login();
					break;
				case 'kirim_saran':
					$this->send_saran();
					break;
				default:
					$this->initHead();
					$this->menu_list();
					$this->load_static($uri);
					$this->init_footer();
					break;
			}
			
			
		}

		public function load_static($uri='')
		{
			# code...
			$uri = str_replace('-', ' ', $uri);

			$data['page'] = $this->page_model->select_judul($uri)->row();
			$data['content'] = $this->load->view('front_page',$data,true);
			$this->load->view('front_body',$data);
		}

		public function saran()
		{
			$this->initHead();
			$this->menu_list();

			if (isset($_SESSION['logged']) == false) {
				$data['content'] = $this->load->view('form_saran','',true);
			}
			else{
				$id = $this->session->userdata('id_user');
				$user = $this->user_model->selectId($id)->row();
				$data['username'] = $user->user_name;
				$data['email'] = $user->user_email;
				$data['content'] = $this->load->view('form_saran',$data,true);
			}
			
			$this->load->view('front_body',$data);
			$this->init_footer();
		}

		public function send_saran()
		{	

			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$tipe = $this->input->post('pesan');
			$isi = $this->input->post('isi');

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('pesan','Tipe','required');
			$this->form_validation->set_rules('isi','Isi pesan','required');

			if($this->form_validation->run()==FALSE){
				$this->saran();
			}
			else{
				$this->email->set_newline("\r\n");
				$this->email->from('portal.myreview@gmail.com', 'wibu master');
				$this->email->to('portal.myreview@gmail.com');
				$this->email->subject($tipe);
				$this->email->message('Dari : '.$username.'<br/>Email :'.$email.'<br/>Isi Pesan :'.$isi);
				$send = $this->email->send();

				if ($send == FALSE) {
					$this->session->set_flashdata('notification', 'silahkan cek koneksi anda atau email anda');
					redirect(site_url('page/saran'));
				}
				else{
					$data['saran_name'] = $this->input->post('username');
					$data['saran_email'] = $this->input->post('email');
					$data['saran_tipe'] = $this->input->post('pesan');
					$data['saran_isi'] = $this->input->post('isi');
					$data['saran_readed'] = 0;

					$this->saran_model->insert($data);

					$this->session->set_flashdata('notification', 'Pesan telah terkirim');
					redirect(site_url('page/saran'));
				}
			}	

		}

		public function form_login()
		{		
			$this->initHead();
			$this->menu_list();
			$data['content'] = $this->load->view('user_login', '', true);
			$this->load->view('front_body', $data);
			$this->init_footer();		
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
				$this->initHead();
				$this->menu_list();
				$data['content'] = $this->load->view('user_login', '', true);
				$this->load->view('front_body', $data);
				$this->init_footer();
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
			$this->init_footer();		
		}
		public function form_profile()
		{
			$this->initHead();
			$this->menu_list();
			$id = $this->session->userdata('id_user');
			$data['detail_id'] = $this->user_model->selectId($id)->row();
			$data['content'] = $this->load->view('front_profile', $data, true);
			$this->load->view('front_body', $data);
			$this->init_footer();			
		}

		public function update()
		{
			$id = $this->session->userdata('id_user');
			$user = $this->user_model->selectId($id)->row();
			
			$email = $this->input->post('email');
			$pass = $this->input->post('new_password');
			$pass2 = $this->input->post('re_new_password');
			$pass3 = $this->input->post('password_lama');
			$pass_hash = md5("pnvs#%12".$pass3."41;1*");

			$nama_foto = $this->input->post('foto');
			$foto = $_FILES['foto'];
			
			$file_name = $foto['name'];
			$file_type = $foto['type'];
			$file_size = $foto['size'];

			if (!empty($_FILES['foto']['name'])) {
				if (($file_size <= 2560000) && ($file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/gif')) {
					$name = str_replace(" ","-", $file_name);
					$file_tmp_name = $foto['tmp_name'];
					if ($pass != NULL || $pass2 != NULL || $pass3 != NULL) {
						$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
						$this->form_validation->set_rules('re_new_password', 'Re-type Password', 'required');

						if ($this->form_validation->run() == FALSE) {
							$this->initHead();
							$this->menu_list();
							$id = $this->session->userdata('id_user');
							$data['detail_id'] = $this->user_model->selectId($id)->row();
							$data['content'] = $this->load->view('front_profile', $data, true);
							$this->load->view('front_body', $data);
							$this->load->view('front_footer');	
						}
						elseif ($pass != $pass2) {
							$this->session->set_flashdata('notification', 'Peringatan : Password baru dan Re-Type Password tidak cocok');
							redirect(site_url('page/form_profile'));
						}
						elseif($user->user_password != $pass_hash){
							$this->session->set_flashdata('notification', 'Peringatan : Password lama salah');
							redirect(site_url('page/form_profile'));
						}
						elseif($user->user_email != $email){
							if($file_name){
							$this->email->set_newline("\r\n");
							$this->email->from('portal.myreview@gmail.com', 'portal review');
							$this->email->to($email);
							$this->email->subject('Validasi New Email ');
							$this->email->message('Please go to this link to verify your new register email <a href="'.base_url().'page/validasi/'.$user->user_validation.'">here</a>');

							$data['user_confirm'] = 0;
							move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
							$data['user_profile_img'] = $name;
							$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
							$data['user_name'] = $this->input->post('username');
							$data['user_email'] = $this->input->post('email');
							$this->email->send();
							$this->user_model->update($data,$id);
							$this->session->set_flashdata('notification', 'Data telah diupdate');
							redirect(site_url('page/form_profile'));
							}
						}
						else{
							if($file_name){
							move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
							$data['user_profile_img'] = $name;
							$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
							$data['user_name'] = $this->input->post('username');
							$data['user_email'] = $this->input->post('email');
							$this->user_model->update($data,$id);
							$this->session->set_flashdata('notification', 'Data telah diupdate');
							redirect(site_url('page/form_profile'));
							}
						}
					}
					else{
						if($user->user_email != $email){
							if($file_name){
								$this->email->set_newline("\r\n");
								$this->email->from('portal.myreview@gmail.com', 'wibu master');
								$this->email->to($email);
								$this->email->subject('Validasi New Email ');
								$this->email->message('Please go to this link to verify your new register email <a href="'.base_url().'page/validasi/'.$user->user_validation.'">here</a>');

								$data['user_confirm'] = 0;
								move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
								$data['user_profile_img'] = $name;
								$data['user_name'] = $this->input->post('username');
								$data['user_email'] = $this->input->post('email');
								$this->email->send();
								$this->user_model->update($data,$id);
								$this->session->set_flashdata('notification', 'Data telah diupdate');
								redirect(site_url('page/form_profile'));
							}
						}
						elseif($file_name){
							move_uploaded_file($file_tmp_name, "./image/user_profil/$name");
							$data['user_profile_img'] = $name;
							$data['user_name'] = $this->input->post('username');
							$data['user_email'] = $this->input->post('email');
							$this->user_model->update($data,$id);
							$this->session->set_flashdata('notification', 'Data telah diupdate');
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
				if ($pass != NULL || $pass2 != NULL || $pass3 != NULL) {
					$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
					$this->form_validation->set_rules('re_new_password', 'Re-type Password', 'required');


					if ($this->form_validation->run() == FALSE) {
						$this->initHead();
						$this->menu_list();
						$id = $this->session->userdata('id_user');
						$data['detail_id'] = $this->user_model->selectId($id)->row();
						$data['content'] = $this->load->view('front_profile', $data, true);
						$this->load->view('front_body', $data);
						$this->init_footer();
					}
					elseif ($pass != $pass2) {
						$this->session->set_flashdata('notification', 'Peringatan : Password baru dan Re-Type Password tidak cocok');
						redirect(site_url('page/form_profile'));
					}
					elseif($user->user_password != $pass_hash){
							$this->session->set_flashdata('notification', 'Peringatan : Password lama salah');
							redirect(site_url('page/form_profile'));
					}
					elseif($user->user_email != $email){

						$this->email->set_newline("\r\n");
						$this->email->from('portal.myreview@gmail.com', 'wibu master');
						$this->email->to($email);
						$this->email->subject('Validasi New Email ');
						$this->email->message('Please go to this link to verify your new register email <a href="'.base_url().'page/validasi/'.$user->user_validation.'">here</a>');
						$this->email->send();

						$data['user_confirm'] = 0;
						$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
						$data['user_name'] = $this->input->post('username');
						$data['user_email'] = $this->input->post('email');
						$this->user_model->update($data,$id);
						$this->session->set_flashdata('notification', 'Data telah diupdate');
						redirect(site_url('page/form_profile'));

					}
					else{
					
						$data['user_password'] = md5("pnvs#%12".$pass."41;1*");
						$data['user_name'] = $this->input->post('username');
						$data['user_email'] = $this->input->post('email');
						$this->user_model->update($data,$id);
						$this->session->set_flashdata('notification', 'Data telah diupdate');
						redirect(site_url('page/form_profile'));
						
					}
				}
				else{
					if($user->user_email != $email){

						$this->email->set_newline("\r\n");
						$this->email->from('portal.myreview@gmail.com', 'wibu master');
						$this->email->to($email);
						$this->email->subject('Validasi New Email ');
						$this->email->message('Please go to this link to verify your new register email <a href="'.base_url().'page/validasi/'.$user->user_validation.'">here</a>');

						$data['user_confirm'] = 0;
						$data['user_name'] = $this->input->post('username');
						$data['user_email'] = $this->input->post('email');
						$this->email->send();
						$this->user_model->update($data,$id);
						$this->session->set_flashdata('notification', 'Data telah diupdate');
						redirect(site_url('page/form_profile'));

					}
					else{
						$data['user_name'] = $this->input->post('username');
						$data['user_email'] = $this->input->post('email');
						$this->user_model->update($data,$id);
						$this->session->set_flashdata('notification', 'Data telah diupdate');
						redirect(site_url('page/form_profile'));
					}
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
				$this->initHead();
				$this->menu_list();
				$data['content'] = $this->load->view('user_daftar', '', true);
				$this->load->view('front_body', $data);
				$this->init_footer();
			}
			else{
				if ($num == 1) {
					$this->session->set_flashdata('notification', 'Peringatan : username sudah tersedia');
					redirect(site_url('page/form_daftar'));
				}
				else{
					if ($pass == $repass) {
					$this->email->set_newline("\r\n");
					$this->email->from('portal.myreview@gmail.com', 'portal review');
					$this->email->to($email);
					$this->email->subject('Validasi Register');
					$this->email->message('Please go to this link to verify your register <a href="'.base_url().'page/validasi/'.$hash_valid.'">here</a>');
					$a = $this->email->send();
						if ($a === FALSE) {
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

									$akun1 = $this->user_model->select_username($username)->row();

									$array_item = array(
										'id_user'=>$akun1->id,
										'username_user'=>$akun1->user_name,
										'level_user'=>$akun1->user_level,
										'logged'=>'true' );

									$this->session->set_userdata($array_item);

									$this->success();
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

		public function validasi ()
		{
			if ($this->uri->segment(1) == 'page' && $this->uri->segment(2) == 'validasi' && $this->uri->segment(3) == true) {
				$key = $this->uri->segment(3);
				$akun = $this->user_model->selectValidasi($key)->row();
				$num = count($akun);

				if ($num == 1) {
					if ($akun->user_confirm == 0) {
						$id = $akun->id;
						$data['user_confirm'] = 1;
						$this->user_model->update($data, $id);

						$array_item = array(
							'id_user' => $akun->id ,
							'username_user' => $akun->user_name ,
							'level_user' => $akun->user_level ,
							'logged' => 'true' );	
						$this->session->set_userdata($array_item);

						$this->session->set_flashdata('notification', 'Selamat, Akun anda telah berhasil divalidasi');
						redirect(site_url('page/form_profile'));		
					}
					else{
						unset($_SESSION['logged']); 
						$this->session->set_flashdata('notification', 'Maaf akun anda telah divalidasi<br/>silahkan login terlebih dahulu');
						redirect(site_url('page/form_login'));		
					}	
				}
				else{
					unset($_SESSION['logged']); 
					$this->session->set_flashdata('notification', 'Tidak dapat menemukan kode verifikasi yang cocok');
					redirect(site_url('page/form_login'));	
				}
			}
			else{
				redirect(site_url('page/form_login'));
			}
		}

		public function success(){
			$this->initHead();
			$this->menu_list();
			$data['content'] = $this->load->view('front_success', '', true);
			$this->load->view('front_body', $data);
			$this->init_footer();

		}

		public function lupa_password(){
			$this->initHead();
			$this->menu_list();
			$data['content'] = $this->load->view('front_lupa_pass','',true);
			$this->load->view('front_body', $data);
			$this->init_footer();

		}

		public function send_lupa_pass()
		{
			$lupa = $this->input->post('lupa');

			if (isset($lupa)) {
				$user = $this->input->post('username');
				$email = $this->input->post('email');

				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('email', 'E-mail', 'required');

				$akun = $this->user_model->select_username_user($user)->row();
				$count = count($akun);

				if ($count > 0) {
					$id = $akun->id;
				}

				if ($this->form_validation->run() == FALSE) {
					$this->lupa_password();
				}
				else{

					if($akun->user_name != $user){
						$this->session->set_flashdata('notification', 'Username salah');
						redirect(site_url('page/lupa_password'));
					}
					elseif($akun->user_email != $email){
						$this->session->set_flashdata('notification', 'Email anda salah');
						redirect(site_url('page/lupa_password'));
					}

					else{
						$this->email->set_newline("\r\n");
						$this->email->from('portal.myreview@gmail.com', 'wibu master');
						$this->email->to('portal.myreview@gmail.com');
						$this->email->subject('Request reset password ');
						$this->email->message($akun->user_name." meminta permintaan reset passwords");
						$kirim = $this->email->send();

						if ($kirim == FALSE) {
							$this->session->set_flashdata('notification', 'silahkan cek koneksi anda atau email anda');
							redirect(site_url('page/lupa_password'));
						}
						else{
							$data['user_forgot'] = 1;
							$this->user_model->update($data, $id);
							$this->session->set_flashdata('notification', 'tunggu beberapa saat lalu silahkan cek email anda untuk mendapatkan password baru');
							redirect(site_url('page/form_login'));	
						}
					}					
				}
			}
			else{
				redirect(site_url('page/form_login'));
			}
		}
	}

?>