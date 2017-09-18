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
			Hello, <?php echo $usr->user_name; ?>
	</div>
	
	<div class="col-md-9 topbar">
		
	</div>
	<a href="<?php echo base_url().'admin-dashboard/inbox'; ?>" >
		<div class="col-md-1 topbar topbar-text-center">
			<span class="glyphicon glyphicon-envelope" style="font-size: 30px;"></span>
			
				
		</div>
	</a>
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
				          		<p>Pesan</p>
				        	</h4>
				      	</div>
				    </div>
				</div>
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
