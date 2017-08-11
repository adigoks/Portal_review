<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>
	<?php echo validation_errors(); ?>
	<fieldset>
		<form action="<?php echo site_url('admin_menu/menu_tambah'); ?>" method="POST">
			
			Nama Menu : <input type="text" name="menu_name" /><br/><br/>
			Tipe Menu : <Select  name="menu_tipe">
							<option value="none">None</option>
							<option value="external_link">External Link</option>
							<option value="post">Post</option>
							<option value="kategori">Kategori</option>
							<option value="tag">tag</option>
							<option value="page">page</option>
						</Select><br/><br/>
			Status : <select name="parent" >
						<option>Menu Utama</option>
						<?php foreach ($parent as $menu) 
						{ ?>
							<option value="<?php echo $menu->id; ?>">Sub Menu dari <?php echo " ".$menu->menu_name; ?></option>
						<?php } ?>
					 </select><br/><br/>	
						<input type="submit" name="next" value="Next" />
		</form>

	</fieldset>

</body>
</html>