<div>
	<h2>Tambahkan Menu</h2>

	<fieldset>
		<?php echo validation_errors(); ?>
		<form class="col-md-4 form-horizontal" action="<?php echo site_url('admin_menu/menu_tambah_tag'); ?>" method="POST">
			<div class="form-group">
					<label class="" for="menu_name">Nama Menu :</label>
					<input class="col-sm-5 form-control" type="text" name="menu_name" value="<?php echo $menu_name ?>" readonly="readonly" />
			</div>
			<div class="form-group">
					<label class="" for="menu_tipe">Tipe Menu :</label>
					<input class="col-sm-5 form-control" type="text" name="menu_tipe" value="<?php echo $menu_url_type ?>" readonly="readonly" />
			</div> 
			<div class="form-group">
					<label class="" for="menu_status">Status :</label>
					<input class="col-sm-5 form-control" type="text" name="menu_status" value="<?php if(isset($menu)){echo "submenu dari ".$menu->menu_name;}else{echo "menu utama";} ?>" readonly="readonly" />
			</div> 
			<div class="form-group">
					<label class="" for="tag">Nama Tag :</label>
					<select class="col-sm-5 form-control" name="tag">
						<option></option>
						<?php foreach ($tag_list as $tag) 
						{ ?>
					
						<option value="<?php echo "tag/".$tag->post_judul; ?>"><?php echo $tag->post_tag; ?></option>

						<?php } ?>
				
						</select>
					
			</div> 
			<input type="number" name="parent" value="<?php if(isset($menu)){echo $menu->id;}else{echo 0;}?>" hidden>
			<input class="btn btn-default" type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>
</div>