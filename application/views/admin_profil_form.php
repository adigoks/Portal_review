<div class="row">
	<div class="col-md-12">
		
		<div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
				<!-- form open here Post here -->
				<?php echo form_open('admin_profil/update_profil', 'id="post-article"'); ?>
					
					<div class="form-group">
						<img style="border-radius:100%" height="150" width="150" src="<?php echo base_url();?>image/3dbldr.png" >	
					</div>
					<div class="form-group">
						<label for="username" >User name</label>
						<input class="form-control" type="text" id="username" name="username" placeholder="User name" value="<?php echo $user->user_name; ?>">
					</div>
					<div class="form-group">
						<label for="email" >Email</label>
						<input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php echo $user->user_email; ?>">
					</div>
					<div class="form-group">
						<label for="deskripsi" >Deskripsi</label>
						<textarea class="form-control" id="deskripsi" form="post-article" name="deskripsi" cols="150" rows="10"><?php echo $user->user_deskripsi; ?></textarea>
					</div>

					<div class="form-group">
						
						<input type="hidden" name="id" value="<?php echo $user->id; ?>" >
						<input class="form-control"  type="submit" name="simpan" value="simpan">
					</div>
				</form>
			</div>
		</div> 
		
	</div>
	
</div>