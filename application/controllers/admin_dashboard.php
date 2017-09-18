<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_dashboard extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->model('user_model');
			$this->load->model('logf_model');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		public function index()
		{
			$id = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id)->row();
			$start = date('Y-m-d H:i:s', strtotime('-7 days'));
			$logView = $this->logf_model->dailyView($start)->result();
			foreach ($logView as $key ) {
				$tanggal = $key->tanggal;
				$data['view'][$tanggal] = $key->count;
			}
			$limit = date('Y-m-d', strtotime('-7 days'));
			$data['limit'] = $limit;
			$day = 7;
			while (strtotime($limit) <= strtotime(date('Y-m-d'))) {
				if(!isset($data['view'][$limit]))
				{
					$data['view'][$limit] = 0;
				}
				$day--;
				$limit = date('Y-m-d', strtotime('-'.$day.' days'));
				
			}
			$data['page_view'] = $this->logf_model->pageView($start)->result();
			$start = date('Y-m-d 00:00:00');
			$data['people_visit'] = $this->logf_model->peopleVisit($start)->row();
			$data['content'] = $this->load->view('admin_dashboard',$data,true);
			$this->load->view('admin_pane',$data);
			
		}
	}

?>