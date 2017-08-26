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
<body >
	<div id="topbar" >
		<a href="<?php echo site_url().$default;?>" target='_blank'>
			<div class="col-md-1 topbar topbar-text-center">
				<span class="glyphicon glyphicon-chevron-left" style="font-size: 30px;"></span>
				
				Kembali	
			</div>
		</a>
		

	</div>
	<div class="row">
		<div class="col-md-12">
		 <iframe class='iframe' src="<?php echo site_url().$target;?>"></iframe> 
		</div>	
	</div>
	
</body>