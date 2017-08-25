<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('html');
		$this->load->model('menu_model');
		$this->load->model('user_model');
		$this->load->model('attribute_model');
	}

	public function index()
	{
		$data['identitas'] = $this->attribute_model->selectName('identitas_situs')->row();
		$data['warna'] = $this->attribute_model->selectName('tampilan_warna')->row();

		$this->load->view('front_head',$data);
		$data['req_page'] = 1;
		$this->menu_list($data);
		$this->compose($data);
		$this->load->view('front_footer');
	}
	public function initHead($data = null)
	{
		
		$data['identitas'] = $this->attribute_model->selectName('identitas_situs')->row();
		$data['warna'] = $this->attribute_model->selectName('tampilan_warna')->row();

		$this->load->view('front_head',$data);
	}
	public function page($page = 1)
	{
		$data['identitas'] = $this->attribute_model->selectName('identitas_situs')->row();
		$data['warna'] = $this->attribute_model->selectName('tampilan_warna')->row();
		$this->load->view('front_head',$data);
		$data['req_page'] = $page;
		$this->menu_list($data);
		$this->compose($data);
		$this->load->view('front_footer');
	}	

	public function loadinit()
	{

		$this->load->view('front_head');
		$this->menu_list();
		$this->compose();
		$this->load->view('front_footer');	
	}

	public function compose($data=null)
	{
		$data['news'] = $this->post_model->showPublish()->result();
		$data['widget'] = $this->post_model->showPopuler()->result();
		$data['trending'] = $this->post_model->showTrending()->result();
		$data['content'] = $this->load->view('front_hot_news',$data,true);

        
		// $data['popular_widget'] = $this->load->view('front_popular_widget',$result,true);
		// $data['widget'] =$this->load->view('front_widget',$data,true);

		//

		$data['latest_main'] =$this->load->view('post_list','',true);
		$data['post_main'] = $this->paginasi_main($data['req_page']); 

		$data['content'] .= $this->load->view('front_main', $data,true);

		// $data['content'] .=  $this->load->view('front_content',$data,true);
		$this->load->view('front_body', $data);
	}

	public function load_list($page)
	{	
		//query dengan limit dan offset
		//load view dengan data load post
	}

	public function menu_list($data=null)
	{
		$data['menu'] = $this->menu_model->selectSort();
		$id = $this->session->userdata('id_user');
		$data['user'] = $this->user_model->selectId($id)->row();
		$this->load->view('front_header', $data);
	}

	public function paginasi_main($page=1)
	{
		$data['news2'] = $this->post_model->showPublish2()->result();

		$data['perpage'] = 7;
		$offset = ($page - 1) * $data['perpage'];
		
		$data['config'] =array(
			'base_url' =>site_url('Welcome/paginasi_main'),
			'total_rows' =>count($this->post_model->showPublish2()->result()),
			'per_page' =>$data['perpage']);
		$limit['offset'] = $offset;
		$limit['perpage'] = $data['perpage'];
		
		$data['offset'] = $offset;
		$data['total'] = $data['config']['total_rows'];
		$data['page'] = $page;
		$data['paging_post'] = $this->post_model->paging_main($limit)->result();

		return $this->load->view('paginasi_main',$data,true);
	}



}
