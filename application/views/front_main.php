<div id="main" class="col-md-12" >
	<div class="col-md-8">
		
		<?php echo $post_main; ?>
		<!-- akan mengecho post list/ latest main php -->
	</div>
	<div class="col-md-4 widget" >
		<!-- akan mengecho widget php -->
		<?php $this->load->view('front_popular'); ?>
		<?php $this->load->view('front_trending'); ?>
	</div>
</div>