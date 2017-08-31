<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_pengaturan extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->helper('form');
			$this->load->library('session');
			$this->load->library('pagination');
			$this->load->model('user_model');
			$this->load->model('attribute_model');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}

			$config = Array(
   				'protocol' => 'smtp',
    			'smtp_host' => 'ssl://smtp.gmail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'wibumaster@gmail.com',
			    'smtp_pass' => 'wibumaster12345',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
				);

			$this->load->library('email', $config);
		}

		public function index()
		{
			$id = $this->session->userdata('id_author');
			$data['usr'] = $this->user_model->selectId($id)->row();

			$data['kategori'] = $this->attribute_model->selectName('kategori')->row();

			$data['content'] = $this->load->view('admin_pengaturan', $data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}


		public function permission_admin($page=1){


			$data['perpage'] = 7;
			$offset = ($page - 1) * $data['perpage'];
		
			$data['config']=array(
						'base_url'=>site_url('admin_pengaturan/permission_admin'),
					  	'total_rows'=>count($this->user_model->select_admin()->result()),
					  	'per_page'=>$data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];

			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page'] = $page;
			$data['paging_admin'] = $this->user_model->pagination_admin($limit)->result();

			echo $this->load->view('paginasi_admin',$data, true);	

		}
		public function admin_ubah_password($page=1){
			$data['perpage'] = 7;
			$offset = ($page - 1) * $data['perpage'];

			$data['config']=array(
				'base_url'=>site_url('admin_pengaturan/admin_ubah_password'),
				'total_rows'=>count($this->user_model->select_admin()->result()),
				'per_page'=> $data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];
			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page']=$page;
			$data['paging_admin'] = $this->user_model->pagination_admin($limit)->result();

			echo $this->load->view('paginasi_pass_reset',$data,true);
		}

		public function update_kategori()
		{
			
			$id = $this->input->post('id_kategori');
			$data['attribute_values'] = $this->input->post('kategori_value');
			echo $id;
			$data['attribute_values'] = json_encode($data['attribute_values']);
			if($this->attribute_model->selectName('kategori')->row() != null)
			{
				
				$this->attribute_model->update($data,$id);	
				$this->session->set_flashdata('pesan','kategori berhasil di perbarui');
			}else
			{
				$data['attribute_name'] = 'kategori';
				$this->attribute_model->insert($data);
				$this->session->set_flashdata('pesan','kategori berhasil di tambahkan');
				
			}
			
			redirect(site_url('admin-dashboard/pengaturan'));

		}

		public function update_level()
		{
				$user = $this->input->post('akun');
			
				$data['user_level'] = $this->input->post('level');

				$this->user_model->update_level($data, $user);

				redirect(site_url('admin-dashboard/pengaturan'));
		}

		public function ubah_pass()
		{
				$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    			$password = array(); 
    			$alpha_length = strlen($alphabet) - 1; 
    			for ($i = 0; $i < 8; $i++) 
    			{
       	 		  $n = rand(0, $alpha_length);
        		  $password[] = $alphabet[$n];
    			}
    			$p=implode("", $password);
   
				$email=$this->input->post('email');
				$id=$this->input->post('id');
				$this->email->set_newline("\r\n");
					$this->email->from('wibumaster@gmail.com', 'wibu master');
					$this->email->to($email);
					$this->email->subject('password baru');
					$this->email->message('silahkan gunakan password berikut untuk login!'.$p);
					$this->email->send();

					$data['user_password']=md5("pnvs#%12".$p."41;1*");					
					$this->user_model->update($data,$id);


					redirect(site_url('admin-dashboard/pengaturan'));


		}

	}

?>