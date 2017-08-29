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
			$this->init_def_layout();

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
			$data['attribute_name'] = 'tampilan_warna';
			$aksen = $this->input->post('warna_aksen');

			$dasar = $this->input->post('warna_dasar');
			$value = array(	'aksen' => $aksen,
							'dasar' => $dasar
					);

			$data['attribute_values'] = json_encode($value);
			
			$warna = $this->attribute_model->selectName('tampilan_warna')->row();
			
			if($warna == null)
			{
				$this->attribute_model->insert($data);
				redirect(site_url('admin-dashboard/tampilan'));
			}else{
				$id = $warna->id;
				$this->attribute_model->update($data, $id);
				redirect(site_url('admin-dashboard/tampilan'));
			}
		}

		function set_font(){

		}

		function layout(){

			$id = $this->session->userdata('id_author');
			$data['usr'] = $this->user_model->selectId($id)->row();
			
			$data['content'] = $this->load->view('admin_layout', '', true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function footer(){
			$data['footer_data'] = $this->layout_model->showAll()->result();
			$data['footer_parent'] = $this->layout_model->selectName('footer_layout')->row();
			$id = $this->session->userdata('id_author');
			$data['usr'] = $this->user_model->selectId($id)->row();
			$data['footer_data'] = $this->genfooterData($data['footer_data'], $data['footer_parent']->id);
			
			$data['content'] = $this->load->view('layout_footer', $data, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function add_footer(){
			$data['layout_name'] = $this->input->post('layout_name');
			$data['layout_order'] = $this->input->post('layout_order');
			$data['layout_span'] = $this->input->post('layout_span');
			$data['layout_parent'] = $this->input->post('layout_parent');
			$data['layout_content'] = $this->input->post('layout_content');
			if($data['layout_order'] == 'undefined')
			{
				$data['layout_order'] = '';
			}
			if($data['layout_content'] == 'undefined')
			{
				$data['layout_content'] = '';
			}
			$id = $this->layout_model->insert($data);
			//var_dump($data);
			echo json_encode(array('id_layout' => $id));
		}

		function init_def_layout(){
			if($this->layout_model->selectName('footer_layout')->row() == null)
			{

				$data['layout_name'] = 'footer_layout';
				$data['layout_parent'] = 0;
				$data['layout_span'] = 12;
				$this->layout_model->insert($data);
			}

			if($this->layout_model->selectName('header_layout')->row() == null)
			{

				$data['layout_name'] = 'header_layout';
				$data['layout_parent'] = 0;
				$data['layout_span'] = 12;
				$this->layout_model->insert($data);
			}
		}

		function genfooterData($data=array(),$id)
		{
			$array = array();
			
			foreach ($data as $row) {

				if ($row->layout_parent == $id)
				{
					array_push($array,$row);
					foreach ($data as $column ) 
					{
						if($column->layout_parent == $row->id)
						{
							array_push($array, $column);
						}
					}
				}
				
			}
			return $array;
		}
	}

?>