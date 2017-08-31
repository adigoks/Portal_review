<head>

	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.min.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.min.css'); ?>
	<?php echo link_tag('asset/css/admin-style.css'); ?>
	
</head>
<body >
		
		<div id="container" class="row">
			<div id="login-box2" class="col-md-offset-4 col-md-4 container-fluid ">
				<center><h1>Admin-Page</h1></center>
				<center><h3>Lupa Password</h3></center>
				<div style=" padding-top: 10px; text-align: center;">
				<span class="lp-alert alert alert-warning">Silahkan masukan e-mail yang sudah terdaftar!</span></br></br>
				</div>
				<?php  $this->session->flashdata('notification') ?>
				<br>
				<div class="col-md-10 col-md-offset-1 container-fluid ">
					<!-- form disini  -->
					<?php echo validation_errors(); ?>
					<?php echo form_open('admin_login/admin_lupa_pass'); ?>
					<div class="form-group">
	    				<label for="user_name" >User Name</label>
						<input type="text" class="form-control" id="user_name" name="user_name" placeholder="user name">
					</div>
					<div class="form-group">
	    				<label for="email" >E-mail</label>
					<input type="E-mail" class="form-control" id="password" name="email" placeholder="example@gmail.com">
					</div>
					<div class="col-md-4">
					<input type="submit" value="kirim" name="kirim" class="btn btn-default col-md-12">
					</div>
					<?php echo form_close();?>
					<div class="col-md-4">
					<a href="<?php echo site_url('admin_login'); ?>"><input type="submit" value="Kembali" name="login" class="btn btn-primary col-md-12"></a>
					</div>
					</div>
				</div>
			</div>	
		</div>
</body>