<div class="list-group">
	<h2 class="tag-wid">
		<span class="bord ini-tag-judul">POPULER</span>
	</h2>
	<div class="top-d pb">
	<?php $i=0; foreach ($widget as $w) { 

		if ($i < 5) { 
			$i++; ?>

			<div class="number"><h2><?php echo $i; ?>.</h2></div>
			<div class="pop-list-title"><a href="<?php echo base_url().'post/'.$w->post_uri; ?>"><h4><b><?php echo $w->post_judul; ?></b></h5></a></div>

		<?php } 
		} ?>
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
	