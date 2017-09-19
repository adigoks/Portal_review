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
			$this->load->library('image_lib');
			$this->load->model('user_model');
			if ($this->session->userdata('logged_in') == FALSE) 
			{
				redirect(site_url('admin_login'));
			}
		}

		function index($status=array())
		{
			$id = $this->session->userdata('id_author');
			$data['usr']=$this->user_model->selectId($id)->row();
			$data['content'] = $this->load->view('form_media', $status, true);

			$data['content'] =$this->load->view('admin_body', $data,true);
			$this->load->view('admin_pane', $data);
		}

		function getUserDir(){
			$id = $this->session->userdata('id_author');
			$user = $this->user_model->selectId($id)->row();
			$name = $user->user_name;
			$directory = "image/".md5($name.$id)."/";
			return $directory;
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

		function media_list(){
			$id = $this->session->userdata('id_author');
			$user = $this->user_model->selectId($id)->row();
			$name = $user->user_name;
			$directory = "image/".md5($name.$id);
			if(!is_dir($directory))
			{
				mkdir($directory);
			}
			$directory = "image/".md5($name.$id)."/thumbnail";
			if(!is_dir($directory))
			{
				mkdir($directory);
			}
			$data['directory'] = $directory;
			$data['dir'] = $this->dirToArray($directory);

			echo $this->load->view('media_list', $data, true);
		}

		function do_upload(){
			$id = $this->session->userdata('id_author');
			$user = $this->user_model->selectId($id)->row();
			$name = $user->user_name;
			$user_name = $name;
			$directory = "./image/".md5($user_name.$id);
			if(!is_dir($directory))
			{
				mkdir($directory);
			}
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
						$new_name = $name;
						$file_tmp_name = $img['tmp_name'][$i];
						$x = 1 ;
						while (file_exists($directory."/$name")) {
							$pathinf = pathinfo($directory."/$new_name");
							
							$name = $pathinf['filename'].'_('.$x.').'.$pathinf['extension'];

							$x++;
						}
						
						move_uploaded_file($file_tmp_name, $directory."/$name");
						$size = getimagesize($directory."/$name");
						$newdir = "./image/".md5($user_name.$id)."/thumbnail";
						if(!is_dir($newdir))
						{

							mkdir($newdir);
						}	
						$thumbcfg['width'] = 150;
						$thumbcfg['height'] = 150;
						$thumbcfg['new_image'] = $newdir."/$name" ;
						$thumbcfg['source_image'] = $directory."/$name";
						$this->image_lib->initialize($thumbcfg);
						$this->image_lib->resize();
						
					}
					else{
						echo json_encode(array('status'=> 'error', 'error_message' => 3	 ));
						return 0;
					}
				}

            	echo json_encode(array('status' => 'ok'));
			}else{
				echo json_encode(array('status'=> 'error', 'error_message' => 'error nggak ada file' ));
			}           
		}

		function detail(){
			$dir = $this->getUserDir();
			$file = $dir.$this->input->post('file_name');

			$data = array('size' => filesize($file), 'mime' => mime_content_type($file) , 'type' => filetype($file));
			echo json_encode($data);
		}

		function delete(){
			$dir = $this->getUserDir();
			$thumbdir = $dir."thumbnail/";
			$file = $this->input->post('file_name');
			for ($i=0; $i < count($file); $i++) { 
				unlink($dir.$file[$i]);
				unlink($thumbdir.$file[$i]);
			}
			echo json_encode(array('status' => 'ok'));
			
		}

		function rename(){
			$dir = $this->getUserDir();
			$thumbdir = $dir."thumbnail/";
			$old = $this->input->post('old_name');
			$new = $this->input->post('new_name');
			$olddir = './'.$dir.$old;
			$newdir = './'.$dir.$new;
			$status = rename($olddir, $newdir);
			$olddir = './'.$thumbdir.$old;
			$newdir = './'.$thumbdir.$new;
			$status = rename($olddir, $newdir);
			echo json_encode(array('status_rn'=> $status,'old' => $old, 'new'=> $new));
		}
	}


?>