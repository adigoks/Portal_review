<div class="list-group">
		<div class="top-news2">
			<div id="img" class="post-list-img">
				<?php if ($data->post_img == NULL) { ?>
					<img height="135" src="<?php echo base_url();?>image/default/empty_image.png" >
				<?php } else{?>
					<img height="135" src="<?php echo base_url().$data->post_img;?>" >
					<?php }?>	
			</div>
			<div class="post-list-title"><a href="<?php echo base_url().'post/'.$data->post_uri; ?>"><h4><b><?php echo $data->post_judul;?></b></h5></a></div>
			<div class="post-list-title"><a href="<?php echo base_url().'post/author/'.$data->user_name; ?>"><h5><b><?php echo $data->user_name; ?></b></h6></a></div>
			<div class="post-list-title"><h6><b><?php $w=$data->post_waktu; echo date("d/m/y",strtotime($w));?></b></h6></div>
		</div>	
</div>	

<script type="text/javascript">
	$(document).ready(function(){
		if(window.innerWidth < 500){
			  $('#img').hide();	
		}
		else {
			$('#img').show();
		}
		
		
	});
</script>
	