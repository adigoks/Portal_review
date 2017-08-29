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
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		public function index()
		{
			$id = $this->session->userdata('id_author');
			$data['usr'] = $this->user_model->selectId($id)->row();
			$this->daftar_admin();
			$data['content'] = $this->load->view('admin_pengaturan', $data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		public function daftar_admin($page=1){
			$data['admin'] = $this->user_model->select_admin()->result(); 

			$data['perpage'] = 3;
			$offset = ($page - 1) * $data['perpage'];
		
			$data['config']=array('base_url'=>site_url('admin_dahsboard/pengaturan'),
					  	'total_rows'=>count($this->user_model->select_admin()->result()),
					  	'per_page'=>$data['perpage']);

			$limit['offset'] = $offset;
			$limit['perpage'] = $data['perpage'];

			$data['offset'] = $offset;
			$data['total'] = $data['config']['total_rows'];
			$data['page'] = $page;
			$data['paging_post'] = $this->user_model->pagination_admin($limit)->result();
			return $this->load->view('paginasi_admin',$data,true);			
		}

	}

?>