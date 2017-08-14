<div class="row">
	<div class="col-md-12">
		
		<div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
				<!-- form open here Post here -->
				<?php echo form_open('admin_post/add_post', 'id="post-article"'); ?>
					
					<div class="form-group">
						<img src="D:\game\template vanguard\Narukami\G4G-BT02-003EN-RRR.png" id="foto" name="foto">
					</div>
					<div class="form-group">
						<label for="username" >User name</label>
						<input class="form-control" type="text" id="username" name="username" placeholder="User name">
					</div>
					<div class="form-group">
						<label for="email" >Email</label>
						<input class="form-control" type="text" id="email" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="deskripsi" >Deskripsi</label>
						<textarea class="form-control" id="deskripsi" form="post-article" name="deskripsi" cols="150" rows="10"></textarea>
					</div>

					<div class="form-group">
						
						<input class="form-control"  type="submit" name="simpan" value="simpan">
					</div>
				</form>
			</div>
		</div> 
		
	</div>
	
</div>