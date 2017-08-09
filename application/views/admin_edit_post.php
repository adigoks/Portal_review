<div class="row">
	<div class="col-md-12">

		<div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
				<h3>Edit Artikel</h3>

				<!-- form open here Post here -->
				<?php echo form_open('admin_post/edit_post', 'id="post-article"'); ?>
			
					<div class="form-group">
						<label for="judul_post" >Judul Artikel</label>
						<input class="form-control" type="text" id="judul_post" name="judul_post" placeholder="judul artikel" value="<?php echo $id_post->post_judul;?>">
					</div>
					<div class="form-group">
						<label for="isi_post" >Isi Artikel</label>
						<textarea class="form-control" id="isi_post" form="post-article" name="isi_post" cols="150" rows="10"><?php echo $id_post->post_isi;?></textarea>
					</div>
					<div class="form-group">
						<label for="tag_post" >tag</label>
						<input class="form-control" id="tag_post" type="text" name="tag_post" value="<?php echo $id_post->post_tag;?>" placeholder="tambahkan tag">
					</div>
					<div class="form-group">
						<label for="kategori_post" >kategori</label>
						<select id="kategori" form="post-article" name="kategori_post" class="form-control">
							<option value="<?php echo $a=$id_post->post_kategori;?>"><?php echo $a;?></option>
							<option>-</option>
							<!-- list kategori sesuai database -->
							<option >kategori 1</option>
							<option >kategori 2</option>
							<option >kategori 3</option>
							
						</select>
					
					</div>
					<div class="checkbox col-md-12">
						<label>
						<input  type="checkbox" name="enable_comment" value="enable_comment" <?php if ($id_post->post_enable_comment == 1) echo "checked='checked'"; ?> >perbolehkan komentar 
						</label>
					</div>

					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $id_post->id; ?>">
						<input class="form-control"  type="submit" name="update_post" value="update post">
					</div>
					<div class="form-group">
						<?php if ($id_post->post_published == 0) 
						{ ?>

							<input class="form-control"  type="submit" name="terbitkan_post" value="terbitkan post">

						<?php } ?>
						
					</div>
				</form>
			</div>			
					
				</form>
			</div>
		</div> 
		
	</div>
	
</div>