<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#post">Artikel</a></li>
			<li><a data-toggle="tab" href="#page">Halaman Statis</a></li>
		</ul>
		<div class="tab-content">
		    <div id="post" class="tab-pane fade in active">
		    	<div class="col-md-12">
		    		<br>
		    		<H3>POST</H3>
		    		<div style="padding: 5px; border-radius: 5px;background-color: #f9eece;">
		    			
		    			<?php $this->load->view('admin_post_list');?>
		    		</div>
		    	</div>
		    	
		    </div>
		    <div id="page" class="tab-pane fade in">
		    	<div class="col-md-12">
		    		<br>
		    		<H3>PAGE</H3>
		    		<div style="padding: 5px; border-radius: 5px;background-color: #f9eece;">
		    			
		    			<?php $this->load->view('admin_post_list');?>
		    		</div>
		    		
		    	</div>
		    	
		    </div>
		</div>
		
	</div>
</div>