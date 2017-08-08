<head>

	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.css'); ?>
	<?php echo link_tag('asset/css/admin-style.css'); ?>
	
</head>
<body>
<div id="topbar">
	
</div>
<div id='main' class="row">
	<div id="sidebar" class="col-md-2" >
		<div class="sidebar">
			<div id="sidebar-menu" >
				<br>
				<div id='menu-accordion' class="panel-group">
				    <div class="panel panel-default">
				      	<div class="panel-heading">
				        	<h4 class="panel-title">
				          		<a data-toggle="collapse" data-parent='#menu-accordion' href="#collapse1">MENU</a>
				        	</h4>
				      	</div>
				    	<div id="collapse1" class="panel-collapse collapse" >
				        	<ul class="list-group">
				          		<li class="list-group-item"><a href="<?=site_url('admin-dashboard/menu');?>">Tambah</a></li>
				          		<li class="list-group-item"><a href="<?=site_url('admin-dashboard/menu/sesuaikan');?>">Sesuaikan</a></li>
				          		
				        	</ul>
				        
				      	</div>
				    </div>
				    <div class="panel panel-default">
				      	<div class="panel-heading">
				        	<h4 class="panel-title">
				          		<a data-toggle="collapse" data-parent='#menu-accordion' href="#collapse2">POST</a>
				        	</h4>
				      	</div>
				    	<div id="collapse2" class="panel-collapse collapse">
				        	<ul class="list-group">
				          		<li class="list-group-item"><a href="<?=site_url('admin-dashboard/post');?>">Tambah</a></li>
				          		<li class="list-group-item"><a href="<?=site_url('admin-dashboard/post/sesuaikan');?>">Sesuaikan</a></li>
				          		
				        	</ul>
				        
				      	</div>
				    </div>
				    <div class="panel panel-default">
				      	<div class="panel-heading">
				        	<h4 class="panel-title">
				          		<a data-toggle="collapse" data-parent='#menu-accordion' href="#collapse3">TEMA</a>
				        	</h4>
				      	</div>
				    	<div id="collapse3" class="panel-collapse collapse">
				        	<ul class="list-group">
				          		<li class="list-group-item">Tampilan</li>
				          		<li class="list-group-item">Layout</li>
				          		
				        	</ul>
				        
				      	</div>
				    </div>
				    <div class="panel panel-default">
				      	<div class="panel-heading">
				        	<h4 class="panel-title">
				          		<a href="#">MEDIA</a>
				        	</h4>
				      	</div>
				    	
				    </div>
				</div>
				
				</br>
				<ul class="list-group">
				  	<li class="list-group-item">Pengaturan
				    </li>
				    <li class="list-group-item">Profil</li>
				</ul>

			</div>
		</div>
		
	</div>
	<?php
	if (isset($content)) {
		echo $content;
	}
		
	?>
	
</div>
<div id="footer">
	<div style="margin: auto;">
		<span style="vertical-align: middle;color: white;">
		<center>&copy; Nama aplikasi</center>
		<center>2017</center>
		</span>
	</div>
</div>
