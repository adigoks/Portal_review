<div class="form-log-u act">
	<div class="font-log container-fluid bg">
		<div class="t-log">
			<h3><b>Beri Kami Saran</b></h3>
			<p><b>Masukan</b>,<b>saran</b> serta <b>kritik</b> yang anda berikan dapat membantu kami untuk memberikan konten yang lebih baik</p>	
		</div>
		<div class="form-log form-bord col-md-4 col-md-offset-1">
			<fieldset>
			<div style="text-align:center;"><?php echo $this->session->flashdata('notification'); ?></div><br/>
			<!-- <div style="text-align:center;"><?php echo validation_errors(); ?></div><br/> -->
				<?php if (isset($user)) {
					$username = $username;
					$email = $email;
				}else{
					$username ='';
					$email ='';
					} ?>
				<form action="<?php echo site_url('page/kirim_saran');?>" method="POSt" id="isi" >
					<div class="form-group">
					<?php echo form_error('username','<div style="color:red">','</div>');?>
					<label for="username">Masukan Username :</label>
					<input class="form-control" type="text" id="username" name="username" value="<?php echo $username; ?>" placeholder="username">
					</div>
					<div class="form-group">
					<?php echo form_error('email','<div style="color:red">','</div>');?>
					<label for="email">Masukan E-mail :</label>
					<input class="form-control" type="e-mail" id="email" name="email" value="<?php echo $email; ?>" placeholder="example@eunha.com">
					</div>
					<div class="form-group">
					<?php echo form_error('pesan','<div style="color:red">','</div>');?>
					<label for="pesan">Tipe Pesan :</label></br>
					<select class="form-control" for="pesan" name="pesan" id="pesan" >
						<option></option>
						<option value="saran">Saran</option>
						<?php if(isset($user)){ ?>
								<option value="add_admin">Daftar admin</option>
							<?php } ?>
						
					</select>
					</div>
					<?php echo form_error('isi','<div style="color:red">','</div>');?>
					<label for="isi">Isi Pesan :</label>
					<textarea rows="7" name="isi" id="isi" class="c-textarea form-control"></textarea><br>
					<input class="btn btn-primary" type="submit" name="saran" value="kirim">
				</form>
			</fieldset>
		</div>
	</div>
</div>