<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>

	<fieldset>
		<?php echo validation_errors(); ?>
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

						<input type="submit" name="next" value="Next" />
		</form>

	</fieldset>

</body>
</html>