
<div>
	<h2>Tambahkan Menu</h2><br/>
	<?php echo validation_errors(); ?>
	<fieldset>
		<form class="form-horizontal col-md-4" action="<?php echo site_url('admin_menu/menu_tambah'); ?>" method="POST">
			<div class="form-group">
					<label class="" for="menu_name">Nama Menu :</label>
					<input class="col-sm-5 form-control" type="text" name="menu_name" />
			</div>
			<div class="form-group">
					<label class="" for="menu_name">Tipe Menu :</label>
					<Select class="col-sm-5 form-control"  name="menu_tipe">
							<option value="none">None</option>
							<option value="external_link">External Link</option>
							<option value="post">Post</option>
							<option value="kategori">Kategori</option>
							<option value="tag">tag</option>
							<option value="page">page</option>
						</Select><br/><br/>
			</div>
			<div class="form-group">
					<label class="" for="menu_name">Status :</label>
					<select class="col-sm-5 form-control" name="parent" >
						<option>Menu Utama</option>
						<?php foreach ($parent as $menu) 
						{ ?>
							<option value="<?php echo $menu->id; ?>">Sub Menu dari <?php echo " ".$menu->menu_name; ?></option>
						<?php } ?>
					 </select>
			</div> 	
						<input class="btn-default btn" type="submit" name="next" value="Next" />
		</form>
	</fieldset>
</div>