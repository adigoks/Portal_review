<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>

	<fieldset>
		<?php echo validation_errors(); ?>
		<form action="<?php echo site_url('admin_menu/menu_tambah_link'); ?>" method="POST">
			
			Nama Menu : 
			<input type="text" name="menu_name" value="<?php echo $menu_name ?>" readonly="readonly" /><br/><br/>
			Tipe Menu : 
			<input type="text" name="menu_tipe" value="<?php echo $menu_url_type ?>" readonly="readonly" /><br/><br/>
			Status : 
			<input type="text" name="menu_status" value="<?php if(isset($menu)){echo "submenu dari ".$menu->menu_name;}else{echo "menu utama";} ?>" readonly="readonly" /><br/><br/>
			<input type="number" name="parent" value="<?php if(isset($menu)){echo $menu->id;}else{echo 0;}?>" hidden>
			External Link :
			<input type="text" name="link" /><br/><br/>
			<input type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</body>
</html>