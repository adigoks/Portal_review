<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_post extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('html');
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->load->model(array('post_model','user_model','page_model'));
			$this->load->library('pagination');
			
			

			$this->load->model('post_model');
			$this->load->model('page_model');


			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		function index()
		{
			$this->tambah_post();
		}

		function tambah_post()
		{
			$button ='';
			$data['b'] = $button;
			$data['content'] = $this->load->view('admin_tambah_post',$data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}


		function sesuaikan_post()
		{
			
			$data['content'] = $this->load->view('admin_sesuaikan_post',"",true);
			
			$data['content'] =$this->load->view('admin_body', $data,true);
			
			$this->load->view('admin_pane', $data);
		}
		
		function paginasi_post($offset=0){
			
			$data['post']=$this->post_model->showAll()->result();
			
			$a=$this->session->userdata('id_author');
			$b=intval($a);
			$data['post_id']=$this->user_model->selectId($b)->result();
			
						#paginasi
			$data['perpage'] =10;
			
			
			$config = array(
							'base_url'=>site_url('admin_post/sesuaikan_post'),
							'total_rows'=>count($this->post_model->showAll()->result()),
							'per_page'=>$data['perpage']);
			
			
			$limit['perpage']=$data['perpage'];
			$limit['offset']=$offset;
			$data['offset']=$offset;
			$data['total']=$config['total_rows'];
			
			$data['post']=$this->post_model->paging($limit)->result();
			echo $this->load->view('paginasi_post',$data,true);
			
		}
		
		function paginasi_page($offset2=0){
			$data['post_page']=$this->page_model->showAll()->result();
			$a=$this->session->userdata('id_author');
			$b=intval($a);
			$data['post_id']=$this->user_model->selectId($b)->result();
			$perpage2 =10;
			$config2 = array(
							'base_url'=>site_url('admin_post/paginasi_page'),
							'total_rows'=>count($this->page_model->showAll()->result()),
							'per_page'=>$perpage2);
			$this->pagination->initialize($config2);
			$limit2['perpage']=$perpage2;
			$limit2['offset']=$offset2;
			$data['post_page']=$this->page_model->pagination($limit2)->result();
			echo $this->load->view('paginasi_page',$data,true);
		}

		function add_post()
		{
			$data['post_judul'] = $this->input->post('judul_post');
			$data['post_isi'] = $this->input->post('isi_post');
			$data['post_tag'] = $this->input->post('tag_post');
			$data['post_kategori'] = $this->input->post('kategori_post');
			$id = $this->session->userdata('id_author');
			$data['post_author'] = $id;

			$koment = $this->input->post('enable_comment');

			if (isset($koment)) 
			{
				$data['post_enable_comment'] = 1;
			}

			$this->form_validation->set_rules('judul_post','Judul Artikel','required');
			$this->form_validation->set_rules('isi_post','Isi Artikel','required');
			$simpan = $this->input->post('simpan_post');

			if($simpan == 'simpan post')
			{
				if ($this->form_validation->run() == FALSE) 
				{
					$button = '';
					$data['b'] = $button;
					$data['content'] = $this->load->view('admin_tambah_post',$data,true);
					$data['content'] =$this->load->view('admin_body', $data, true);
					$this->load->view('admin_pane', $data);
				}
				else
				{
					$this->post_model->insert($data);
					echo $this->session->set_flashdata('pesan','Post berhasil ditambahkan');
					redirect(site_url('admin_post'));
						
				}
			}
			else
			{
				if ($this->form_validation->run() == FALSE) 
				{
					redirect(site_url('admin_post'));
				}
				else
				{
					$data['post_published'] = 1;
					$this->post_model->insert($data);
					echo $this->session->set_flashdata('pesan','Post berhasil ditambahkan');
					redirect(site_url('admin_post'));		
				}
			}		

		}
		
		function form_edit_post($id)
		{
			$data['id_post'] = $this->post_model->selectId($id)->row();
			$data['content'] = $this->load->view('admin_edit_post', $data, true);

			$data['content'] =$this->load->view('admin_body', $data, true);
			$this->load->view('admin_pane', $data);
		}
		
		function form_edit_page($id)
		{
			$data['id_page'] = $this->page_model->selectId($id)->row();
			$data['content'] = $this->load->view('admin_edit_page', $data, true);
			$data['content'] = $this->load->view('admin_body',$data,true);
			$this->load->view('admin_pane',$data);
		}

		function edit_post()
		{
			$data['post_judul'] = $this->input->post('judul_post');
			$data['post_isi'] = $this->input->post('isi_post');
			$data['post_tag'] = $this->input->post('tag_post');
			$data['post_kategori'] = $this->input->post('kategori_post');

			$koment = $this->input->post('enable_comment');
			if (isset($koment)) 
			{
				$data['post_enable_comment'] = 1;
			}
			else
			{
				$data['post_enable_comment'] = 0;
			}

			$id = $this->input->post('id');

			$update = $this->input->post('update_post');
			if ($update == 'update_post') 
			{
				$this->post_model->update($data, $id);
				$this->sesuaikan_post();
			}
			else
			{
				$data['post_published'] = 1;
				$this->post_model->update($data, $id);
				$this->sesuaikan_post();
			}

		}
		function edit_page(){
			$data['page_name']=$this->input->post('nama_page');
			$data['page_judul']=$this->input->post('judul_page');
			$data['page_isi']=$this->input->post('isi_page');
			$id = $this->input->post('id');
			$simpan = $this->input->post('simpan_page');
			if($simpan == 'simpan'){
				$this->page_model->update($data,$id);
				$this->sesuaikan_post();
			}
			
		}

		function add_page()
		{
			$data['page_name'] = $this->input->post('nama_page');
			$data['page_judul'] = $this->input->post('judul_page');
			$data['page_isi'] = $this->input->post('isi_page');
			
			$this->form_validation->set_rules('nama_page','Nama page','required');
			$this->form_validation->set_rules('judul_page','Judul page','required');
			$this->form_validation->set_rules('isi_page','Isi page','required');

			$button = $this->input->post('simpan_page');

			if($button == 'simpan')
			{
				if ($this->form_validation->run() == FALSE) 
				{
					
					$data['b'] = $button;
					$data['content'] = $this->load->view('admin_tambah_post',$data, true);
					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else
				{
					$this->page_model->insert($data);
					echo $this->session->set_flashdata('pesan','Page berhasil ditambahkan');
					redirect(site_url('admin_post#menu1'));
				}
			}
			else
			{
				if ($this->form_validation->run() == FALSE) 
				{
					redirect(site_url('admin_post#menu1'));
				}
				else
				{
					$this->page_model->insert($data);
					echo $this->session->set_flashdata('page_pesan','Page berhasil ditambahkan');
					redirect(site_url('admin_post#menu1'));		
				}
			}
		}

		function delete_post($id)
		{
			$this->post_model->delete($id);
			redirect(site_url('admin_post/sesuaikan_post'));
		}
		function delete_page($id)
		{
			$this->page_model->delete($id);
			redirect(site_url('admin_post/sesuaikan_pos#page'));
		}

	}

?>