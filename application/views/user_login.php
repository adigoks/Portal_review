<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="" class="">
		<div>
			<h2>Login</h2>	
		</div>

		<div class="">
			<fieldset>
				<?php echo validation_errors(); ?>
				<p style="color:red;"><?php echo $this->session->flashdata('notification')?></p>
				<?php echo form_open('page/login');?>
					Username :
					<input type="text" id="username" name="username" placeholder="Username" /><br/><br/>
					Password :
					<input type="password" id="password" name="password" placeholder="Password" /><br/><br/>
					<input type="submit" name="login" value="Login" />

				<?php echo form_close();?>
			</fieldset>
		</div>
	</div>

</body>
</html>