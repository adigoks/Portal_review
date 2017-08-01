<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller
{
	public function __construct()
	{
		parent:: __contruct();
		$this->load->helper('url');
		$this->load->model('user_m/user_model');
	}
	
	public function index()
	{
		$this->load->view('user_view');
	}
	
	public function post_comment()
	{
		$data['nama']= $this->input->post('nama');
		$data['komentar']= $this->input->post('komentar');
		$data['date']
		$data['time']
		$this->user_model->insert($data);
	}
}