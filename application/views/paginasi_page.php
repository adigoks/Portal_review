<?php echo $this->pagination->create_links();?>
		    			<?php foreach ($post_page as $p) {
							$vari['data']=$p;
							$vari['post_id']=$post_id;
							$this->load->view('admin_post_list2',$vari);}?>
							
							
