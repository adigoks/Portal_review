<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>

	<fieldset>
		<?php echo validation_errors(); ?>
		<form action="<?php echo site_url('admin_menu/menu_tambah_post'); ?>" method="POST">
			
			Nama Menu : 
			<input type="text" name="menu_name" value="<?php echo $menu_name ?>" readonly="readonly" /><br/><br/>
			Tipe Menu : 
			<input type="text" name="menu_tipe" value="<?php echo $menu_url_type ?>" readonly="readonly" /><br/><br/>
			Status : 
			<input type="text" name="menu_status" value="<?php echo $menu->menu_name ?>" readonly="readonly" /><br/><br/>
			Judul Post :
			<select name="post">
				<option></option>
				<?php foreach ($post_list as $post) 
				{ ?>
					
					<option value="<?php echo $post->post_judul; ?>"><?php echo $post->post_judul; ?></option>

				<?php } ?>
				
			</select><br/><br/>
			<input type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</body>
</html>