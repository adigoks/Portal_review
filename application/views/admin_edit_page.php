<div class="row">
	<div class="col-md-12">
		
				<h3>Tambah Artikel</h3>
			    <!-- form open here Post here -->
			    <?php echo form_open('admin_post/edit_page', 'id="post-page"'); ?>

			    	<div class="form-group">
			    	
			    	 
			    		<label for="nama_page" >nama Page</label>
						<input class="form-control" type="text" id="nama_page" name="nama_page" placeholder="nama page" value="<?php echo $id_page->page_name;?>">
					</div>
			    	<div class="form-group">
			    		<label for="judul_page" >Judul Page</label>
						<input class="form-control" type="text" id="judul_page" name="judul_page" placeholder="judul page" value="<?php echo $id_page->page_judul;?>">
					</div>
					<div class="form-group">
						<label for="isi_page" >Isi Page</label>
						<textarea class="form-control" id="isi_post" form="post-page" name="isi_page" cols="150" rows="10"><?php echo $id_page->page_isi;?></textarea>
						<input type="hidden" name="id" value="<?php echo $id_page->id; ?>">
					</div>
					
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="simpan_page" value="simpan">
					</div>
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="terbitkan_page" value="terbitkan">
					</div>
					
					
				</form>
		</div> 
		
	</div>