<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_profil extends CI_Controller
	{
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->model('user_model');

			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}

			$config = Array(
   				'protocol' => 'smtp',
    			'smtp_host' => 'ssl://smtp.gmail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'wibumaster@gmail.com',
			    'smtp_pass' => 'Akulupasandinnya',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
				);

			$this->load->library('email', $config);
		}

		function index()
		{
			$this->profil();
		}

		function profil()
		{

			
			$id = $this->session->userdata('id_author');
			$data['user'] = $this->user_model->selectId($id)->row();
			$data['usr']=$data['user'];
			$data['content'] = $this->load->view('admin_profil_form', $data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function update_profil()
		{
			$id = $this->session->userdata('id_author');
			$akun = $this->user_model->selectId($id)->row();
			$email = $this->input->post('email');

			if ($akun->user_email == $email) {
				$data['user_profile_img'] = $this->input->post('image-path');
				$data['user_name'] = $this->input->post('username');
				$data['user_deskripsi'] = $this->input->post('deskripsi');

				$this->user_model->update($data,$id);
				redirect(site_url('admin_profil'));
			}
			else{
				$this->email->set_newline("\r\n");
				$this->email->from('wibumaster@gmail.com', 'wibu master');
				$this->email->to('wibumaster@gmail.com');
				$this->email->subject('Validasi New Email Baru');
				$this->email->message('Please go to this link to verify your new register email <a href="'.base_url().'admin-dashboard/profil/validasi/'.$akun->user_validation.'">here</a>');
				$kirim = $this->email->send();

				if ($kirim == FALSE) {
					$this->session->set_flashdata('notification', 'silahkan cek koneksi anda atau email anda');
					redirect(site_url('admin_profil'));
				}
				else{
					$data['user_profile_img'] = $this->input->post('image-path');
					$data['user_confirm'] = 0;
					$data['user_name'] = $this->input->post('username');
					$data['user_email'] = $this->input->post('email');
					$data['user_deskripsi'] = $this->input->post('deskripsi');

					$this->user_model->update($data,$id);
					redirect(site_url('admin_profil'));
				}
			}
			
		}

		public function validasi()
		{
			if ($this->uri->segment(1) == 'admin-dashboard' && $this->uri->segment(2) == 'profil' && $this->uri->segment(3) == 'validasi' && $this->uri->segment(4) == true) {
				$key = $this->uri->segment(4);
				$akun = $this->user_model->selectValidasi($key)->row();
				$num = count($akun);

				if ($num == 1) {
					if ($akun->user_confirm == 0) {
						$id = $akun->id;
						$data['user_confirm'] = 1;
						$this->user_model->update($data, $id);

						$array_item = array(
							'id_author' => $akun->id,
							'username' => $akun->user_name,
							'level'=> $akun->user_level,
							'logged_in' => 'true' 
						);

						$this->session->set_userdata($array_item);

						$this->session->set_flashdata('notification', 'Selamat, Akun anda telah berhasil divalidasi');
						redirect(site_url('admin_profil'));		
					}
					else{
						unset($_SESSION['logged']); 
						$this->session->set_flashdata('notification', 'Maaf akun anda telah divalidasi<br/>silahkan login terlebih dahulu');
						redirect(site_url('admin_login'));		
					}	
				}
				else{
					unset($_SESSION['logged']); 
					$this->session->set_flashdata('notification', 'Tidak dapat menemukan kode verifikasi yang cocok');
					redirect(site_url('admin_login'));	
				}
			}
			else{
				redirect(site_url('admin_login'));
			}
		}

	}

?>