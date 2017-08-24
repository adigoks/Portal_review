<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.2.1.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery-ui/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/portal.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/summernote/summernote.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.css'); ?>
	<?php echo link_tag('asset/css/admin-style.css'); ?>
	<?php echo link_tag('asset/summernote/summernote.css');?>
	<title>the title!!</title>
	
</head>
<body>
<div id="topbar" class="row">

	 <div id='preview-site' class="col-md-1 topbar topbar-text-center">
	<?php if($usr->user_profile_img != ''){$image = base_url().$usr->user_profile_img;}else{$image = base_url().'image/default/empty_image.png';}?>
			<!-- <div >
				<div class="topbar-pic-frame">
					<img src="<?php echo $image;?>" class='topbar-pic'>
				</div>
			</div> -->
			<a href="<?php echo base_url().'admin-dashboard';?>">
				<span class="glyphicon glyphicon-home" style="font-size: 30px;"></span>
			</a>
			Hello, <?php echo $this->session->userdata('username');?>
	 </div>
	 
	<a href="<?php echo base_url().'admin_preview/?default=admin-dashboard';?>" target='_blank'>
		<div class="col-md-1 topbar topbar-text-center">
			<span class="glyphicon glyphicon-new-window" style="font-size: 30px;"></span>
			
			tinjau situs	
		</div>
	</a>
	
	<div class="col-md-9 topbar">
		
	</div>
	<div class="col-md-1 topbar">
		<a href="<?php echo site_url('admin_logout/logout');?>">Logout</a>
	</div>
	
</div>
<div id='main' class="row">
	<div id="sidebar" class="col-md-2" >
		<div class="sidebar">
			<div id="sidebar-menu">
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
				          		<li class="list-group-item"><a href="<?=site_url('admin-dashboard/tampilan');?>">Tampilan</a></li>
				          		<li class="list-group-item"><a href="<?=site_url('admin-dashboard/layout');?>"> Layout</a></li>
				          		
				        	</ul>
				        
				      	</div>
				    </div>
				    <div class="panel panel-default">
				      	<div class="panel-heading">
				        	<h4 class="panel-title">
				          		<a href="<?=site_url('admin-dashboard/media');?>">MEDIA</a>
				        	</h4>
				      	</div>
				    	
				    </div>
				</div>
				
				</br>
				<ul class="list-group">
				  	<li class="list-group-item">Pengaturan
				    </li>
				    <li class="list-group-item"><a href="<?=site_url('admin-dashboard/profil');?>">Profil</a></li>
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
