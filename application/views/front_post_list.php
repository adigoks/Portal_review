<div class="list-group">
	<?php foreach($news2 as $n2) {?>
		<div class="top-news2">
			<div id="img" class="post-list-img">
				<img height="135" src="<?php echo base_url();?>image/3dbldr.png" >	
			</div>
			<div class="post-list-title"><a><h4><b><?php echo $n2->post_judul;?></b></h5></a></div>
			<div class="post-list-title"><a><h5><b><?php echo $n2->post_judul;?></b></h6></a></div>
			<div class="post-list-title"><h6><b><?php $w=$n2->post_waktu; echo date("d/m/y",strtotime($w));?></b></h6></div>
		</div>
	<?php }?>	
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
	