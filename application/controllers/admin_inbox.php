<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Admin_inbox extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->model('saran_model');
		if ($this->session->userdata('logged_in') == FALSE) 
		{
			redirect(site_url('admin_login'));
		}
	}

	public function index()
	{
		// $id = $this->session->userdata('id_author');
		// $data['usr']=$this->user_model->selectId($id)->row();
		// $this->load->view('admin_inbox', $data);
		$this->paginasi_inbox();	
	}

	public function paginasi_inbox($page=1)
	{
		$id = $this->session->userdata('id_author');
		$data['usr']=$this->user_model->selectId($id)->row();

		$data['perpage'] = 5;
		$offset = ($page - 1) * $data['perpage'];

		$data['config']=array(
			'base_url'=>site_url('admin_dashboard/inbox'),
			'total_rows'=>count($this->saran_model->showAll()->result()),
			'per_page'=> $data['perpage']);
		$limit['offset'] = $offset;
		$limit['perpage'] = $data['perpage'];
		$data['offset'] = $offset;
		$data['total'] = $data['config']['total_rows'];
		$data['page']=$page;
		$data['paging_unread'] = $this->saran_model->paginasi_unread($limit)->result();

		$data['content'] = $this->load->view('paginasi_unread', $data, true);
		$data['content'] =$this->load->view('admin_body', $data,true);
		$this->load->view('admin_inbox', $data);
	}

	public function inbox_read()
	{
		$id = $this->input->post('id_inbox');
		// $pesan = $this->saran_model->selectId($id)->row();
		$data['saran_readed'] = 1;
		$this->saran_model->update($data,$id);
	}

	public function delete($id)
	{
		// $id = $this->input->post('id');
		$this->saran_model->delete($id);
		redirect(site_url('admin_inbox'));
	}
}

?>