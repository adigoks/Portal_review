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
		}

		function index()
		{
			$this->profil();
		}

		function profil()
		{
			$id = $this->session->userdata('id_author');
			$data['user'] = $this->user_model->selectId($id)->row();
			$data['content'] = $this->load->view('admin_profil_form', $data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function update_profil()
		{
			$data['user_name'] = $this->input->post('username');
			$data['user_email'] = $this->input->post('email');
			$data['user_deskripsi'] = $this->input->post('deskripsi');
			$id = $this->input->post('id');

			$this->user_model->update($data,$id);
			redirect(site_url('admin_profil'));
		}

	}

?>