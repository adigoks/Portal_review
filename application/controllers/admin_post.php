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
			$this->load->model('attribute_model');
			$this->load->model(array('post_model','user_model','page_model','komentar_model'));
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
			$id_author = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id_author)->row();
			$button ='';
			$data['b'] = $button;
			$data['kategori'] = $this->attribute_model->selectName('kategori')->row();
			$data['content'] = $this->load->view('admin_tambah_post',$data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}


		function sesuaikan_post($page='post')
		{
			$id_author = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id_author)->row();
			$data['page'] = $page;
			$data['content'] = $this->load->view('admin_sesuaikan_post',$data,true);

			
			$data['content'] =$this->load->view('admin_body', $data,true);
			
			$this->load->view('admin_pane', $data);
		}
		
		function paginasi_post($page=1)
		{

			
			$a=$this->session->userdata('id_author');
			$level=$this->session->userdata('level');
			$id=intval($a);
			$data['post_id']=$this->post_model->selectId($id)->result();
			$data['user_id']=$this->user_model->selectId($id)->result();
			$data['user'] = $this->user_model->showAll()->result();
			
						#paginasi
			$data['perpage'] =10;
			$offset = ($page - 1) * $data['perpage'];
			
			if ($level == 0) {
				$data['config'] = array(
							'base_url'=>site_url('admin_post/paginasi_post'),
							'total_rows'=>count($this->post_model->showAll($id)->result()),
							'per_page'=>$data['perpage']);
				$limit['offset'] = $offset;
				$limit['perpage'] =$data['perpage'];

				$data['offset']=$offset;
				$data['total']=$data['config']['total_rows'];
				$data['page']=$page;
				$data['post'] = $this->post_model->paging_super($limit)->result();
				echo $this->load->view('paginasi_post',$data,true);
			}
			else{
				$data['config'] = array(
							'base_url'=>site_url('admin_post/paginasi_post'),
							'total_rows'=>count($this->post_model->showAll_post($id)->result()),
							'per_page'=>$data['perpage']);
				$limit['offset'] = $offset;
				$limit['perpage'] =$data['perpage'];

				$data['offset']=$offset;
				$data['total']=$data['config']['total_rows'];
				$data['page']=$page;
				$data['post'] = $this->post_model->paging($limit, $id)->result();
				echo $this->load->view('paginasi_post',$data,true);
			}
		}
		
		function paginasi_page($page=1){

			$data['post_page']=$this->page_model->showAll()->result();

			$a=$this->session->userdata('id_author');
			$b=intval($a);
			$data['post_id']=$this->user_model->selectId($b)->result();

			$data['perpage'] =10;
			$offset = ($page - 1) * $data['perpage'];
			$data['config'] = array(
							'base_url'=>site_url('admin_post/paginasi_page'),
							'total_rows'=>count($this->page_model->showAll()->result()),
							'per_page'=>$data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] =$data['perpage'];

			$data['offset']=$offset;
			$data['total']=$data['config']['total_rows'];
			$data['page'] =$page;
			$data['post_page'] = $this->page_model->pagination($limit)->result();
			echo $this->load->view('paginasi_page',$data,true);
		}

		function add_post()
		{
			
			$data['post_img'] = $this->input->post('gambar_post');
			$data['post_judul'] = $this->input->post('judul_post');
			$data['post_uri'] = str_replace(' ', '-', $data['post_judul']); 

			$data['post_uri'] = preg_replace('/[^A-Za-z0-9\-]/', '', $data['post_uri']);
			$data['post_isi'] = $this->input->post('isi_post');
			$data['post_tag'] = json_encode($this->input->post('tag_post'));
			var_dump($data['post_tag']);
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
					$id_author = $this->session->userdata('id_author');
					$data['usr']=$this->user_model->selectId($id_author)->row();
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
			$id_author = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id_author)->row();
			$data['id_post'] = $this->post_model->selectId($id)->row();
			$data['kategori'] = $this->attribute_model->selectName('kategori')->row();
			$data['content'] = $this->load->view('admin_edit_post', $data, true);

			$data['content'] =$this->load->view('admin_body', $data, true);
			$this->load->view('admin_pane', $data);
		}

		function paginasi_edit_komen($page=1,$id)
		{
			$data['post']= $this->post_model->selectId($id)->row();

			$id_user = $this->session->userdata('id_user');
			$data['name_user'] = $this->user_model->selectId($id_user)->row();

			$koment = $data['post']->id;
			$total = count($this->komentar_model->select_komentar_post($koment)->row());

			if ($total > 0) {
				$data['komentar'] = $this->komentar_model->select_komentar_post($koment)->row();
				$data['balas'] = $this->komentar_model->select_komentar_balas()->result();
			}

			$data['perpage'] = 3;
			$offset = ($page - 1) * $data['perpage'];
					
			$data['config'] =array(
				'base_url' =>site_url('admin_post/paginasi_edit_komen'),
				'total_rows' =>count($this->komentar_model->select_komentar_post($koment)->result()),
				'per_page' =>$data['perpage']);
			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];
					
			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page'] = $page;
			$data['paging_kom'] = $this->komentar_model->paging_komen($limit, $koment)->result();
			echo $this->load->view('paginasi_edit_komen',$data, true);
		}
		
		function view_edit_komen($id){
			$data['post']= $this->post_model->selectId($id)->row();
			$id_user = $this->session->userdata('id_user');
			$data['name_user'] = $this->user_model->selectId($id_user)->row();

			$koment = $data['post']->id;
			$total = count($this->komentar_model->select_komentar_post($koment)->row());

			$id_author = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id_author)->row();
			$data['id_page'] = $this->page_model->selectId($id)->row();
			$data['content'] = $this->load->view('post_komen', $data, true);
			$data['content'] = $this->load->view('admin_body',$data,true);
			$this->load->view('admin_pane',$data);
		}

		function form_edit_page($id)
		{

			$id_author = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id_author)->row();
			$data['id_page'] = $this->page_model->selectId($id)->row();
			$data['content'] = $this->load->view('admin_edit_page', $data, true);
			$data['content'] = $this->load->view('admin_body',$data,true);
			$this->load->view('admin_pane',$data);
		}

		function edit_post()
		{
			$data['post_img'] = $this->input->post('gambar_post');
			$data['post_judul'] = $this->input->post('judul_post');
			$data['post_uri'] = str_replace(' ', '-', $this->input->post('url_post')); 

			$data['post_uri'] = preg_replace('/[^A-Za-z0-9\-]/', '', $data['post_uri']);
			$data['post_isi'] = $this->input->post('isi_post');
			$data['post_tag'] = json_encode($this->input->post('tag_post'));
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
			$terbit = $this->input->post('terbitkan_page');
			if($simpan == 'simpan'){

				$this->page_model->update($data,$id);
				$this->sesuaikan_post();
			}

			if(isset($terbit))
			{
				$this->sesuaikan_post();
			}
			
		}

		function add_page()
		{
			$id_author = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id_author)->row();
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
			$this->sesuaikan_post('page');
		}
		function del_com($id)
		{
			// if (!isset($id)==NULL) {

				$id_komen=$this->komentar_model->selectId($id)->row();
				$id2=$id_komen->komen_parent;
				
				if ($id2 > 0) {
					$this->komentar_model->delete($id);
					$this->session->set_flashdata('pesan','komen sudah terhapus');
					$this->view_edit_komen($id_komen->komen_post);
				}
				else {
					$a=$id_komen->komen_parent;
					$b=$this->komentar_model->select_parent($a)->result();
					
					foreach ($b as $key) {

						
						$this->komentar_model->delete_child($id2);
					}

					$this->komentar_model->delete($id);
					$this->session->set_flashdata('pesan','komen sudah terhapus');
					$this->view_edit_komen($id_komen->komen_post);
					// $this->view_edit_komen($id_komen->komen_post);
				}
			// }
		}

	}

?>