<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Admin_media extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->library('session');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		function index($status=array())
		{
			
			$data['content'] = $this->load->view('form_media', $status, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function sortDirToArray($dir) {
  
			$result = array();

			$cdir = scandir($dir);

			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..","index.html")))
				{
					if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
					{
						$result[] = $value;
					}
				}
			}

			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..","index.html")))
				{
					if (!is_dir($dir . DIRECTORY_SEPARATOR . $value))
					{
						$result[] = $value;
					}
				}
			}
			return $result;
		} 

		function dirToArray($dir)
		{
			$result = array();

			$cdir = $this->sortDirToArray($dir);
			foreach ($cdir as $key => $value)
			{
				if (!in_array($value,array(".","..","index.html")))
				{
					if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
					{
						//kode untuk menampilkan folder - fitur di tiadakan :v
						// $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
					}else
					{
						$result[] = $value;
					}
				}
			}

			return $result;
		}

		function media_list($directory='image'){
			
			$data['directory'] = $directory;
			$data['dir'] = $this->dirToArray($directory);

			echo $this->load->view('media_list', $data, true);
		}

		function do_upload(){
				
			if(isset($_FILES['userimg']))
			{
				
				$img = $_FILES['userimg'];
        	
        		$file_name = $img['name'];
				$file_type = $img['type'];
				$file_size = $img['size'];
				$length = count($file_name);
				for ($i=0; $i < $length; $i++) { 
					if(($file_size[$i] <= 2560000) && ($file_type[$i] == 'image/jpeg' || $file_type[$i] == 'image/png' || $file_type[$i] == 'image/gif'))
					{
						$name = str_replace(" ", "-", $file_name[$i]);
						$file_tmp_name = $img['tmp_name'][$i];
						if($file_name)
						{
							move_uploaded_file($file_tmp_name, "./image/$name");	
						}
					}
					else{
						echo json_encode(array('status'=> 'error', 'error_message' => 3 ));
						return 0;
					}
				}

            	echo json_encode(array('status' => 'ok'));
			}else{
				echo json_encode(array('status'=> 'error', 'error_message' => 'error nggak ada file' ));
			}           
		}

		function detail(){
			$file = 'image/'.$this->input->post('file_name');

			$data = array('size' => filesize($file), 'mime' => mime_content_type($file) , 'type' => filetype($file));
			echo json_encode($data);
		}

		function delete(){
			$file = $this->input->post('file_name');
			for ($i=0; $i < count($file); $i++) { 
				unlink('image/'.$file[$i]);
			}
			echo json_encode(array('status' => 'ok'));
			
		}

		function rename(){
			$old = 'image/'.$this->input->post('old_name');
			$new = 'image/'.$this->input->post('new_name');
			rename($old, $new);
			echo json_encode(array('old' => $old, 'new'=> $new));
		}
	}


?>