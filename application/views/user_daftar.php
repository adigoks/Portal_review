<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="" class="">
		<div>
			<h2>Daftar</h2>	
		</div>

		<div class="">
			<fieldset>
				<?php echo validation_errors(); ?>
				<p style="color:red;"><?php echo $this->session->flashdata('notification')?></p>
				<?php echo form_open_multipart('page/daftar');?>
					Username :
					<input type="text" id="username" name="username" placeholder="Username" /><br/><br/>
					Password :
					<input type="password" id="password" name="password" placeholder="Password" /><br/><br/>
					Re-enter Password :
					<input type="password" id="re-password" name="re_password" placeholder="Re-enter Password" /><br/><br/>
					<div class="email">
						Valid Email :
						<input type="email" id="email" name="email" placeholder="Email" />
						<h5>*Email akan digunakan sebagai validasi akun</h5><br/>
					</div>
					<img style="border:100%" height="120" width="120" src="<?php echo base_url();?>image/3dbldr.png"><br/>
					<input type="file" name="foto" size="100" /><br/><br/>
					<input type="submit" name="daftar" value="Daftar" />

				<?php echo form_close();?>
			</fieldset>
		</div>
	</div>

</body>
</html>