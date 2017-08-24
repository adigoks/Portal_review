<div class="form-log-u">
	<div class="font-log container-fluid">
		<div class="t-log">
			<h2>PROFILE</h2>	
		</div class="prof-pad">
		<div>
		<div class="col-md-2 pic-prof">
				<div class="preview-img">
					<img class="img-responsive"  id="preview" src="<?php echo base_url();?>image/default/empty_image.png"><br/>
				</div>
				<label class="btn btn-default">
					pilih gambar profile	<input type="file" name="foto" id="foto" size="100" style="display: none;" /><br/>
				</label><br/><br/>
		</div>
		</div>
		<div class="form-prof col-md-4 col-md-offset-1">
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
						<label class="email1">Valid Email :</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" />
				</div>
				<div>
					<input class="btn btn-default" type="submit" name="daftar" value="Update" />
				</div>
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