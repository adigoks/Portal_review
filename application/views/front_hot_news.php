<div id="top-news" class="md-col-12" style="background-color: black">
	<div class="top-news">
		<?php foreach ($news as $n){?>
		<div class="top-content" order='<?php echo $n->post_waktu?>' >
			<div class="top-news-img">
				<img src="<?php echo base_url();?>image/3dbldr.png" >	
			</div>
			
			<div class="top-news-title"><h5><b><?php echo $n->post_judul; ?></b><h5></div>
		</div>
		<?php }?>
	
	</div>
</div>