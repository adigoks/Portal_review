<div class="col-md-12">
	<div class="col-md-7">
		<div>
			<h2>Daftar</h2>	
		</div>

		<div>
			<fieldset>
				<?php echo $this->session->flashdata('notification')?>
				<div class="form-horizontal">
				<?php echo form_open_multipart('page/daftar');?>
				<div class="form-group">
					<label for="username1">Username :</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" /><br/><br/>
				</div>
				<div class="form-group">
					<label for="password1">Password :</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" /><br/><br/>
				</div>
				<div class="form-group">
					<label class="repas">Re-enter Password :</label>
					<input type="password" class="form-control" id="re-password" name="re_password" placeholder="Re-enter Password" /><br/><br/>
				</div>
				<div class="form-group">
						<label class="email1">Valid Email :</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" />
						<h5>*Email akan digunakan sebagai validasi akun</h5><br/>
				</div>
				<div class="preview-img">
					<img style="border:100%" class="img-responsive" height="200" width="200" id="preview" src="<?php echo base_url();?>image/3dbldr.png"><br/>
				</div>
				<div class="form-group">
					<input type="file" name="foto" id="foto" size="100" /><br/><br/>
				</div>
					<input type="submit" name="daftar" value="Daftar" />

				<?php echo form_close();?>
				</div>
			</fieldset>
		</div>
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