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

		$this->load->view('front_head',$data);
		
		$this->menu_list($data);
		$this->compose();
		$this->load->view('front_footer');
	}

	public function loadinit()
	{

		$this->load->view('front_head');
		$this->menu_list();
		$this->compose();
		$this->load->view('front_footer');	
	}

	public function compose()
	{
		$data['news'] = $this->post_model->showPublish()->result();
		$data['news2'] = $this->post_model->showPublish2()->result();
		$data['content'] = $this->load->view('front_hot_news',$data,true);

        
		// $data['popular_widget'] = $this->load->view('front_popular_widget',$result,true);
		// $data['widget'] =$this->load->view('front_widget',$data,true);

		// 		 
		$data['latest_main'] =$this->load->view('post_list','',true);

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
		$this->load->view('front_header', $data);
	}



}
