<div class="form-log-u act">
	<div class="font-log container-fluid bg">
		<div class="t-log">
			<h2>PROFILE</h2>	
		</div class="prof-pad">
		<fieldset>
		<?php if ($detail_id->user_confirm == 1) { ?>
			<p class="alert alert-success" style="text-align: center"><?php echo $this->session->flashdata('notification'); ?></p><br/>
		<?php }else{ ?>
			<div class="">
				<h5 class="alert alert-warning" style="text-align: center">mohon buka email anda untuk verifikasi akun anda</h5>
			</div>
		<?php } ?>
		<h5 id="sukses" class="" style="text-align:center;"><?php echo $this->session->flashdata('notification'); ?></h5><br/>
		
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('page/update');?>
			<div>
				<div class="col-md-2 pic-prof">
					<div class="preview-img">
					<?php if ($detail_id->user_profile_img == NULL) { ?>
						<img class="img-responsive"  id="preview" src="<?php echo base_url();?>image/default/empty_image.png"><br/>
					<?php }else{?>
						<img class="img-responsive"  id="preview" src="<?php echo base_url().'image/user_profil/'.$detail_id->user_profile_img; ?>"><br/>
					<?php } ?>
					
					</div>
					<label class="btn btn-default">
						pilih gambar profile	<input type="file" name="foto" id="foto" size="100" style="display: none;" /><br/>
					</label><br/><br/>
				</div>
			</div>
			<div class="form-prof col-md-4 col-md-offset-1">
				<div class="form-horizontal">
				<div class="form-group">
					<label for="username1">Username :</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $detail_id->user_name; ?>" /><br/><br/>
				</div>
				<div class="form-group">
						<label class="email1">Valid Email :</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $detail_id->user_email; ?>"/><br/><br/>
				</div>
				<div class="form-group">
					<label for="password_lama">*Password Lama :</label>
					<input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama" /><br/><br/>
				</div>
				<div class="form-group">
					<label for="new_password">*Password Baru:</label>
					<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password Baru" /><br/><br/>
				</div>
				<div class="form-group">
					<label for="re_new_password">*Konfirmasi Password Baru:</label>
					<input type="password" class="form-control" id="re_new_password" name="re_new_password" placeholder="Re-type Password Baru" />
				</div>
				<p>note(*) = hanya isi jika ingin mengganti password </p><br/><br/>
				<div>
					<input class="btn btn-default" type="submit" name="daftar" value="Update" />
				</div>
				</div>
			</div>
			<?php echo form_close();?>
		</fieldset>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#foto").change(function() {
			readImageData(this);
		});
	});

	function readImageData(imgData){
		if (imgData.files && imgData.files[0]) {
			var readerObj = new FileReader();

			readerObj.onload = function(element) {
				$('#preview').attr('src', element.target.result);
			}

			readerObj.readAsDataURL(imgData.files[0]);
		}
	}
</script>