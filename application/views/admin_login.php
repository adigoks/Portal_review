<head>

	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.min.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.min.css'); ?>
	<?php echo link_tag('asset/css/admin-style.css'); ?>
	
</head>
<body >
	
		<div id="container" class="row">
			<div id="login-box" class="col-md-offset-4 col-md-4 ">
				<center><h1>Admin-Page</h1></center>
				<br>
				<div class="col-md-10 col-md-offset-1">
					<!-- form disini  -->
					<?php echo validation_errors(); ?>
					<?php echo form_open('admin_login/login'); ?>
					<div class="form-group">
	    				<label for="user_name" >User Name</label>
						<input type="text" class="form-control" id="user_name" name="user_name" placeholder="user name">
					</div>
					<div class="form-group">
	    				<label for="user_name" >Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<div class="col-md-8">lupa password?</div>
					<div class="col-md-4">
					<input type="submit" value="Masuk" name="login" class="btn btn-default col-md-12">
					</form>
					</div>
				</div>

			</div>	
		</div>
		
	

</body>