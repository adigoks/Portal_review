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
			$this->load->model('user_model');
			$this->load->model('attribute_model');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
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

	}

?>