<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>

	<fieldset>
		<?php echo validation_errors(); ?>
		<form action="<?php echo site_url('admin_menu/menu_tambah_tag'); ?>" method="POST">
			
			Nama Menu : 
			<input type="text" name="menu_name" value="<?php echo $menu_name ?>" readonly="readonly" /><br/><br/>
			Tipe Menu : 
			<input type="text" name="menu_tipe" value="<?php echo $menu_url_type ?>" readonly="readonly" /><br/><br/>
			Nama Tag :
			<select name="tag">
				<option></option>
				<?php foreach ($tag_list as $tag) 
				{ ?>
					
					<option value="<?php echo $tag->post_judul; ?>"><?php echo $tag->post_tag; ?></option>

				<?php } ?>
				
			</select><br/><br/>
			<input type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</body>
</html>