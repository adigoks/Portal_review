<div>
	<h2>Tambahkan Menu</h2>

	<fieldset>
		<form class="form-horizontal col-md-4" action="<?php echo site_url('admin_menu/menu_tambah_post'); ?>" method="POST">
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
					<input class="col-sm-5 form-control" type="text" name="menu_name" value="<?php if(isset($menu)){echo "submenu dari ".$menu->menu_name;}else{echo "menu utama";} ?>" readonly="readonly" />
			</div>
			<input type="number" name="parent" value="<?php if(isset($menu)){echo $menu->id;}else{echo 0;}?>" hidden>
			<div class="form-group">
					<label class="" for="post">Judul Post :</label>
					<select class="col-sm-5 form-control" name="post">
						<option></option>
						<?php 
						if (!is_null ($post_list)) {
						foreach ($post_list as $post) 
						{ ?>
					
						<option value="<?php echo "post/".$post->post_uri; ?>"><?php echo $post->post_judul; ?></option>

						<?php 
						}} ?>
				
			</select>
			</div>
			<input class="btn btn-default" type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</div>