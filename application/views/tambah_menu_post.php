<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>

	<fieldset>
		<form action="<?php echo site_url('admin_menu/menu_tambah_post'); ?>" method="POST">
			
			Nama Menu : 
			<input type="text" name="menu_name" value="<?php echo $menu_name ?>" readonly="readonly" /><br/><br/>
			Tipe Menu : 
			<input type="text" name="menu_tipe" value="<?php echo $menu_url_type ?>" readonly="readonly" /><br/><br/>
			Status : 
			<input type="text" name="menu_status" value="<?php if(isset($menu)){echo "submenu dari ".$menu->menu_name;}else{echo "menu utama";} ?>" readonly="readonly" /><br/><br/>
			<input type="number" name="parent" value="<?php if(isset($menu)){echo $menu->id;}else{echo 0;}?>" hidden>
			Judul Post :
			<select name="post">
				<option></option>
				<?php 
				if (!is_null ($post_list)) {
					foreach ($post_list as $post) 
				{ ?>
					
					<option value="<?php echo "post/".$post->post_judul; ?>"><?php echo $post->post_judul; ?></option>

				<?php 
				}} ?>
				
			</select><br/><br/>
			<input type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</body>
</html>