<div class="list-group" id="author_paging">
	
	<div class="top-news2 pb">
		<div id="img" class="post-list-img">
		<?php if ($data->post_img == NULL) { ?>
			<img height="135" src="<?php echo base_url();?>image/default/empty_image.png" >
		<?php } else{?>	
			<img height="135" src="<?php echo base_url().$data->post_img;?>" >
		<?php }?>
		</div>
		<div class="post-list-title"><a href="<?php echo base_url().'post/'.$data->post_uri; ?>"><h4><b><?php echo $data->post_judul ?></b></h5></a></div>
		<div class="post-list-title"><h6><b><?php $date=$data->post_waktu; echo date("d/m/y",strtotime($date));?></b></h6></div>
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
	