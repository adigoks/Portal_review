<div class="form-log-u ">
<div id="" class="font-log ">
	<div class="t-log">
		<h2>Login</h2>	
	</div>
	<div class="form-log col-md-4 col-md-offset-1">
		<fieldset>
			<?php echo validation_errors(); ?>
			<p style="color:red;"><?php echo $this->session->flashdata('notification')?></p>
			<?php echo form_open('page/login');?>
				<div class="form-group">
				<label for="username">Username :</label> 
				<input class="form-control " type="text" id="username" name="username" placeholder="Username" /><br/><br/>
				</div>
				<div class="form-group">
				<label for ="password">Password :</label>
				<input class="form-control" type="password" id="password" name="password" placeholder="Password" /><br/><br/>
				</div>
				<input type="submit" name="login" value="Login" />
			<?php echo form_close();?>
		</fieldset>
	</div>
</div>
</div>
