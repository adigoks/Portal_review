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

		function index()
		{
			$id = $this->session->userdata('id_author');
			$data['usr'] = $this->user_model->selectId($id)->row();

			$data['identitas'] = $this->attribute_model->selectName('identitas_situs')->row();
			$data['warna'] = $this->attribute_model->selectName('tampilan_warna')->row();
			$data['font'] = $this->attribute_model->selectName('tampilan_font')->row();

			$data['content'] = $this->load->view('admin_tampilan', '', true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function set_identity()
		{
			// $value = array(	'logo' => ,
			// 				'judul' =>,
			// 				'nama' =>,
			// 				'show' =>
			// 		);
			// $data['attribut_values'] = json_encode($value);
		}

		function set_warna()
		{

		}

		function set_font(){

		}

	}

?>