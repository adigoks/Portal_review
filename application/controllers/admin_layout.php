<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_layout extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');

			$this->load->helper('html');
			$this->load->model('layout_model');
			$this->load->model('user_model');
			$this->load->library('session');
			$this->load->model('attribute_model');
			$this->load->library('form_validation');
			$this->load->helper('form');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}

		}

		function index($stat =null)
		{
			$id = $this->session->userdata('id_author');
			$data['usr'] = $this->user_model->selectId($id)->row();

			$data['identitas'] = $this->attribute_model->selectName('identitas_situs')->row();
			$data['warna'] = $this->attribute_model->selectName('tampilan_warna')->row();
			$data['font'] = $this->attribute_model->selectName('tampilan_font')->row();
			
			$data['content'] = $this->load->view('admin_tampilan', $data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function set_identity()
		{
			$data['attribute_name'] = 'identitas_situs';
			$logo = $this->input->post('image_path');

			$judul = $this->input->post('judul_situs');
			$nama = $this->input->post('nama_situs');
			$show = $this->input->post('tampilkan_post_title');
			$value = array(	'logo' => $logo,
							'judul' => $judul,
							'nama' => $nama,
							'show' => $show
					);

			$data['attribute_values'] = json_encode($value);
			
			$identitas = $this->attribute_model->selectName('identitas_situs')->row();
			
			if($identitas == null)
			{
				$this->attribute_model->insert($data);
				redirect(site_url('admin-dashboard/tampilan'));
			}else{
				$id = $identitas->id;
				$this->attribute_model->update($data, $id);
				redirect(site_url('admin-dashboard/tampilan'));
			}
			
		}

		function set_warna()
		{

		}

		function set_font(){

		}

	}

?>