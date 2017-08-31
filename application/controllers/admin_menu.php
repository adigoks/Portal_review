<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/

	class Admin_menu extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->model('menu_model');
			$this->load->model('post_model');
			$this->load->model('page_model');
			$this->load->model('user_model');
			$this->load->model('attribute_model');

		}

		function cek_login()
		{
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}
		
		function index()
		{
			$this->tambah();
			

		}

		function tambah()
		{
			$this->cek_login();

			$menu['parent'] = $this->menu_model->select_by()->result();
			$id = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id)->row();
			$data['content'] = $this->load->view('form_tambah_menu', $menu, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);

		}

		public function menu_edit()
		{
			
			$this->cek_login();

			$this->load->model('menu_model');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->helper('form');
		}


		function menu_tambah()
		{
			# code...
			$a = $this->input->post('menu_tipe');
			

			$this->form_validation->set_rules('menu_name','Nama Menu','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$id_author = $this->session->userdata('id_author');
				$data['usr']=$this->user_model->selectId($id_author)->row();
				$menu['parent'] = $this->menu_model->select_by()->result();

				$data['content'] = $this->load->view('form_tambah_menu', $menu, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$data['menu_name'] = $this->input->post('menu_name');
				$data['menu_url_type'] = $this->input->post('menu_tipe');
				$data['menu_parent'] = $this->input->post('parent');
				$id = $this->input->post('parent');

				if ($a == 'none') 
				{
					$data['menu_order'] = $this->menu_model->select_by($data['menu_parent'])->num_rows() + 1;
					$this->menu_model->insert($data);
					redirect(site_url('admin_menu'));
				}
				else if ($a == 'external_link') 
				{
					$id_author = $this->session->userdata('id_author');
					$data['usr']=$this->user_model->selectId($id_author)->row();
					$data['menu'] = $this->menu_model->selectId($id)->row();
					$data['content'] = $this->load->view('tambah_menu_link', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else if ($a == 'post') 
				{
					$id_author = $this->session->userdata('id_author');
					$data['usr']=$this->user_model->selectId($id_author)->row();
					$data['post_list'] = $this->post_model->showAll()->result();
					$data['menu'] = $this->menu_model->selectId($id)->row();
					$data['content'] = $this->load->view('tambah_menu_post', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else if ($a == 'tag') 
				{
					$id_author = $this->session->userdata('id_author');
					$data['usr']=$this->user_model->selectId($id_author)->row();
					$data['tag_list'] = $this->post_model->showAll()->result();
					$data['menu'] = $this->menu_model->selectId($id)->row();
					$data['content'] = $this->load->view('tambah_menu_tag', $data, true);

					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}
				else if ($a == 'page') 
				{
					$id_author = $this->session->userdata('id_author');
					$data['usr']=$this->user_model->selectId($id_author)->row();
					$data['page_list'] = $this->page_model->showAll()->result();
					$data['menu'] = $this->menu_model->selectId($id)->row();
					$data['content'] = $this->load->view('tambah_menu_page', $data, true);
					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);

				}else if ($a = 'kategori')
				{
					$id_author = $this->session->userdata('id_author');
					$data['usr']=$this->user_model->selectId($id_author)->row();
					$data['kategori'] = $this->attribute_model->selectName('kategori')->row();
					$data['menu'] = $this->menu_model->selectId($id)->row();
					$data['content'] = $this->load->view('tambah_menu_kategori', $data, true);
					$data['content'] =$this->load->view('admin_body', $data,true);
					$this->load->view('admin_pane', $data);
				}


			}
		}

		function menu_tambah_link()
		{
			
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('link');
			$data['menu_parent'] = $this->input->post('parent');
			$data['menu_order'] = $this->menu_model->select_by($data['menu_parent'])->num_rows() + 1;

			$this->form_validation->set_rules('link','External Link','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$id = $this->session->userdata('id_author');
				$data['usr']=$this->user_model->selectId($id)->row();
				$data['menu'] = $this->menu_model->selectId($data['menu_parent'])->row();	
				$data['content'] = $this->load->view('tambah_menu_link', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}

		}

		function menu_tambah_post()
		{
			
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_parent'] = $this->input->post('parent');
			$data['menu_url'] = $this->input->post('post');
			$data['menu_order'] = $this->menu_model->select_by($data['menu_parent'])->num_rows() + 1;
			
			$this->form_validation->set_rules('post','Judul Post','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$id = $this->session->userdata('id_author');
				$data['usr']=$this->user_model->selectId($id)->row();
				$data['post_list'] = $this->post_model->showAll()->result();
				$data['menu'] = $this->menu_model->selectId($data['menu_parent'])->row();
				$data['content'] = $this->load->view('tambah_menu_post', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}

		}

		function menu_tambah_tag()
		{
			
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_parent'] = $this->input->post('parent');
			$data['menu_url'] = $this->input->post('tag');
			$data['menu_order'] = $this->menu_model->select_by($data['menu_parent'])->num_rows() + 1;

			$this->form_validation->set_rules('tag','Nama Tag','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$id = $this->session->userdata('id_author');
				$data['usr']=$this->user_model->selectId($id)->row();
				$data['tag_list'] = $this->post_model->showAll()->result();
				$data['menu'] = $this->menu_model->selectId($data['menu_parent'])->row();
				$data['content'] = $this->load->view('tambah_menu_tag', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}

		}

		function menu_tambah_kategori()
		{
			
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_parent'] = $this->input->post('parent');
			$data['menu_url'] = $this->input->post('kategori');
			$data['menu_order'] = $this->menu_model->select_by($data['menu_parent'])->num_rows() + 1;

			$this->form_validation->set_rules('kategori','Nama kategori','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$id = $this->session->userdata('id_author');
				$data['usr']=$this->user_model->selectId($id)->row();
				$data['kategori'] = $this->attribute_model->selectName('kategori')->row();
				$data['menu'] = $this->menu_model->selectId($data['menu_parent'])->row();
				$data['content'] = $this->load->view('tambah_menu_tag', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}

		}

		function menu_tambah_page()
		{
			
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_parent'] = $this->input->post('parent');
			$data['menu_url'] = $this->input->post('page');
			$data['menu_order'] = $this->menu_model->select_by($data['menu_parent'])->num_rows() + 1;

			$this->form_validation->set_rules('page','Page Judul','required');

			if ($this->form_validation->run()==FALSE) 
			{
				$id = $this->session->userdata('id_author');
				$data['usr']=$this->user_model->selectId($id)->row();
				$data['page_list'] = $this->page_model->showAll()->result();
				$data['menu'] = $this->menu_model->selectId($data['menu_parent'])->row();
				$data['content'] = $this->load->view('tambah_menu_page', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
			else
			{
				$this->menu_model->insert($data);
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}

		}

		public function menu_sesuaikan()
		{
			$this->cek_login();
			$id = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id)->row();
			$menu['list'] = $this->menu_model->selectSort();

			$data['content'] = $this->load->view('menu_config', $menu, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);

		}

		public function update_menu()
		{
			$id = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id)->row();
			$data['id_hapus'] = $this->input->post('hapus');
			$data['menu'] = $this->input->post('menu');
			$data['submenu'] = $this->input->post('submenu');
			$data['simpan'] = $this->input->post('simpan');
			$data['id_edit'] = $this->input->post('edit');
			//var_dump($data['menu']);
			if(isset($data['id_hapus'])){
				$data['menu_list'] = $this->menu_model->selectId($data['id_hapus'])->row();
				$order = $data['menu_list']->menu_order;

				$parent = $data['menu_list']->menu_parent;
				$this->menu_model->delete($data['id_hapus']);
				$menu['parent'] = $this->menu_model->select_by($parent)->result();
				foreach ($menu['parent'] as $key ) {
					if($key->menu_order > $order)
					{
						$iter = $key->menu_order;	
						$iter--;
						echo $iter;
						$value = array(
							'menu_order' => $iter
							);
						$id = $key->id;
						$this->menu_model->update($value,$id);
					}
				}
				$menu['parent'] = $this->menu_model->select_by($data['id_hapus'])->result();
				foreach ($menu['parent'] as $key ) {
					
					$id = $key->id;
					$this->menu_model->delete($id);
					
				}
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}else if (isset($data['simpan'])){
				$data['menu_list'] = $this->menu_model->showAll()->result();
				foreach ($data['menu'] as $key) {
					foreach ($data['menu_list'] as $key1) {
						if(($key['id'] == $key1->id) && ($key['order']!= $key1->menu_order))
						{

							$value = array(
								'menu_order' => $key['order']
								);
							$id = $key1->id;
							$this->menu_model->update($value,$id);
						}
					}
				}
				foreach ($data['submenu'] as $key) {
					foreach ($data['menu_list'] as $key1) {
						if(($key['id'] == $key1->id) && ($key['order']!= $key1->menu_order))
						{

							$value = array(
								'menu_order' => $key['order']
								);
							$id = $key1->id;
							$this->menu_model->update($value,$id);
						}
					}
				}
				redirect(site_url('admin-dashboard/menu/sesuaikan'));
			}
			elseif (isset($data['id_edit'])) {
				$data['list'] = $this->menu_model->showAll()->result();
				$data['id'] = $this->menu_model->selectId($data['id_edit'])->row();
				$data['content'] = $this->load->view('edit_menu', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);
			}
		}

		function edit_next_menu()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$id = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id)->row();
			$id = $this->input->post('id');
			$tipe = $this->input->post('menu_tipe');

			if ($tipe == 'none') {
				$url = '';
				$data['menu_url'] = $url;
				$this->menu_model->update($data, $id);
				$this->menu_sesuaikan();
			} else {
				$data['name'] = $this->input->post('menu_name');
				$data['tipe'] = $this->input->post('menu_tipe');
				$data['page_list'] = $this->page_model->showAll()->result();
				$data['post_list'] = $this->post_model->showAll()->result();
				$data['url_name'] = $this->menu_model->selectId($id)->row();
				$data['kategori'] = $this->attribute_model->selectName('kategori')->row();
				$data['content'] = $this->load->view('edit_menu_next', $data, true);

				$data['content'] =$this->load->view('admin_body', $data,true);
				$this->load->view('admin_pane', $data);

			}
			
		}

		function edit_menu()
		{
			$data['menu_name'] = $this->input->post('menu_name');
			$data['menu_url_type'] = $this->input->post('menu_tipe');
			$data['menu_url'] = $this->input->post('url');
			$id = $this->input->post('id');

			$this->menu_model->update($data, $id);
			$this->menu_sesuaikan();
			
		}

	}

?>