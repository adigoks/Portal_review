<div id="top-news" class="md-col-12 act">
	<div class="top-news">
		<?php foreach ($news as $n){?>
		<div class="top-content bg" order='<?php echo $n->post_waktu?>' >
			<div class="top-news-img">
				<?php if ($n->post_img == NULL) { ?>
					<img src="<?php echo base_url();?>image/default/empty_image.png" >
				<?php } else{?>
					<img src="<?php echo base_url().$n->post_img;?>" >
					<?php }?>
				<div class="top-news-title-bg">
				<div class="top-news-title"><a href="<?php echo base_url().'post/'.$n->post_uri; ?>"><h5><b><?php echo $n->post_judul; ?></b></h5></a></div>
				</div>
			</div>

		</div>
		<?php }?>
	
	</div>
</div>