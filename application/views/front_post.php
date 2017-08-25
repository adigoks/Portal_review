<div>
	<div class="f-head f-head-bord">
		<h6>Tags <a href="<?php echo base_url().'post/tag/'.$post->post_tag; ?>"><?php echo $post->post_tag; ?></a></h6>
		<h1><?php echo $post->post_judul; ?></h1>
		<div class=" thor col-md-1">
			<?php if ($post->post_img == "") { ?>
				<a><img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png" ></a>
			<?php } else{?>
				<a><img class="f-img" src="<?php echo base_url().$post->user_profile_img;?>" ></a>
			<?php }?>
		</div>
		<div class="thor2">
			<h4>By <a href="<?php echo base_url().'post/author/'.$post->user_name; ?>"><?php echo $post->user_name; ?></a></h4>
			<h5><?php $date=$post->post_waktu; echo date("d/m/y",strtotime($date));?></h5>
		</div>
	</div>

	<div id="f-post">
		<div class="f-f-pad">
			<div id="f-con" class="featured-con">
				<?php if ($post->post_img == NULL) { ?>
					<img  src="<?php echo base_url();?>image/default/empty_image.png" >
				<?php } else{?>
					<img  src="<?php echo base_url().$post->post_img;?>" >
				<?php }?>
			</div>
		</div>
	</div>
	<div class="img-r par">
		<?php echo $post->post_isi;?>	
	</div>
	
</div>
