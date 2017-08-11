<?php echo $offset ; echo $total;?>
		    			<?php foreach ($post as $p) {
							$var['data']=$p;
							$var['post_id']=$post_id;
							$this->load->view('admin_post_list',$var);}?>

