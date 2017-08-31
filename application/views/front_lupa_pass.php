<div class="form-log-u act">
	<div class="font-log2 container-fluid bg">
	<h1 class="t-log">LUPA PASSWORD</h1><br>
	
	<div class="form-log form-bord col-md-4 col-md-offset-1">
	<fieldset>
		<div style="padding-bottom: 30px;">
		<span class="lp-alert alert alert-warning">Silahkan masukan e-mail yang sudah terdaftar!</span></br></br>
		</div>
		<?php echo $this->session->flashdata('notification')?>
		<form class="form-horizontal col-md-12" action="<?php echo site_url('page/send_lupa_pass'); ?>" method="POST" >
			<?php echo form_error('username','<div style="color:red">','</div>');?>
			<input class="form-control" type="text" id="username" name="username" placeholder="Username"></br>
			<?php echo form_error('email','<div style="color:red">','</div>');?>	
			<input class="form-control" type="e-mail" id="email" name="email" placeholder="E-mail"></br>	
			<input style="" class="btn btn-default" type="submit" name="lupa" value="Kirim">
			<input class="btn btn-primary" type="submit" name="cancel" value="Cancel">
		</form>
	</fieldset>
	</div>
	</div>
</div>