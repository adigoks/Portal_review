<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li <?php if($b == 'simpan'){echo '';}
			else{echo 'class ="active"';}?> ><a data-toggle="tab" href="#home">Artikel</a></li>
			<li <?php if($b == 'simpan'){echo 'class = "active"';}
			else{echo '';}?> ><a data-toggle="tab" href="#menu1">Halaman Statis</a></li>
		</ul>
		
		<div class="tab-content">
		    <div id="home" <?php if($b == 'simpan'){echo 'class="tab-pane fade"'; }
			else{echo 'class="tab-pane fade in active"';}?>>
		    	<?php echo $this->session->flashdata('pesan'); ?>
				<h3>Tambah Artikel</h3>
				
				<!-- form open here Post here -->
				<fieldset>
					<?php echo form_open('admin_post/add_post', 'id="post-article"'); ?>
					<div class="form-group">
						<div>
							<?php echo form_error('judul_post','<div style="color:red">','<div>');?>
							<label for="judul_post" >Judul Artikel</label>
							<input class="form-control" type="text" id="judul_post" name="judul_post" placeholder="judul artikel">
						</div>
					</div>
					<div class="form-group">
						<div>
							<?php echo form_error('isi_post','<div style="color:red">','<div>');?>
							<label for="isi_post" >Isi Artikel</label>
							<textarea class="form-control" id="isi_post" form="post-article" name="isi_post" cols="150" rows="10"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="tag_post" >tag</label>
						<input class="form-control" id="tag_post" type="text" name="tag_post" placeholder="tambahkan tag">
					</div>
					<div class="form-group">
						<label for="kategori_post" >kategori</label>
						<select id="kategori" form="post-article" name="kategori_post" class="form-control">
							<option >-</option>
							<!-- list kategori sesuai database -->
							<option >kategori 1</option>
							<option >kategori 2</option>
							<option >kategori 3</option>
							
						</select>
					
					</div>
					<div class="checkbox col-md-12">
						<label>
						<input  type="checkbox" name="enable_comment" value="enable_comment">perbolehkan komentar 
						</label>
					</div>

					<div class="form-group">
						
						<input class="form-control"  type="submit" name="simpan_post" value="simpan post">
					</div>
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="terbitkan_post" value="terbitkan post">
					</div>
			<?php echo form_close();?>
				</fieldset>
				
			</div>
			<div id="menu1" <?php if($b == 'simpan'){echo 'class="tab-pane fade in active"'; }
			else{echo 'class="tab-pane fade"';}?>>
			<?php echo $this->session->flashdata('page_pesan'); ?>
				<h3>Tambah Artikel</h3>
			    <!-- form open here Post here -->
					<fieldset>
					<?php echo form_open('admin_post/add_page', 'id="post-page"'); ?>

			    	<div class="form-group">
						<div>
							<?php echo form_error('nama_page','<div style="color:red">','<div>');?>
							<label for="nama_page" >nama Page</label>
							<input class="form-control" type="text" id="nama_page" name="nama_page" placeholder="judul page">
						</div>
					</div>
			    	<div class="form-group">
						<div>
							<?php echo form_error('judul_page','<div style="color:red">','<div>');?>
							<label for="judul_page" >Judul Page</label>
							<input class="form-control" type="text" id="judul_page" name="judul_page" placeholder="judul page">
						</div>
					</div>
					<div class="form-group">
						<div>
							<?php echo form_error('isi_page','<div style="color:red">','<div>');?>
							<label for="isi_page" >Isi Page</label>
							<textarea class="form-control" id="isi_post" form="post-page" name="isi_page" cols="150" rows="10"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="simpan_page" value="simpan">
					</div>
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="terbitkan_page" value="terbitkan">
					</div>
					
					
				<?php echo form_close();?>
				</fieldset>
			    
			</div>
		</div> 
		
	</div>
	
</div>