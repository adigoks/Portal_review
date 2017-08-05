<head>

	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.min.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.min.css'); ?>
	
</head>
<body>
<div id="topbar">
	
</div>
<div id='main'>
	<div id="sidebar">
		<div id="sidebar-menu">
			<ul>
			  	<li>MENU
			  		<ul>
			    	<li>Tambah</li>
			    	<li>Sesuaikan</li>
			    	</ul>
			    </li>
			  	<li>POST
			    	<ul>
			    	<li>Tambah</li>
			    	<li>Sesuaikan</li>
			    	</ul>
			  	</li>
			  	
			  	<li>TEMA
			    	<ul>
			    	<li>Tampilan</li>
			    	<li>Layout</li>
			    	</ul>
			  	</li>
			  	<li>
			  		MEDIA
			  	</li>
			</ul>
			</br>
			<ul>
			  	<li>Pengaturan
			    </li>
			    <li>Profil</li>
			</ul>

		</div>
	</div>
	<?php
		echo $content;
	?>
	
</div>
<div id="footer">
	
</div>
