<div id="main" class="col-md-12 as ">
	<div class="user-post ">
		<div id="post" class="col-md-8 bord2  h">
			<?php echo $content; ?>
		<!-- akan mengecho post list/ latest main php -->
		</div>
		<div class="col-md-4 widget hw bord2" >
		<!-- akan mengecho widget php -->
			<?php $this->load->view('front_popular'); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		if(window.innerWidth < 420){
			$('#main').removeClass("col-md-12");
			
		}
		else {
			$('#img').show();
		}
		
		
	});
</script>