<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Edit Menu</h2>
	<fieldset>
		<form action="<?php echo site_url('admin_menu/edit_next_menu'); ?>" method="POST">
			
			Nama Menu : <input type="text" name="menu_name" value="<?php echo $id->menu_name; ?>" /><br/><br/>
			Tipe Menu : <Select name="menu_tipe" >
							<option value="<?php echo $id->menu_url_type; ?>"><?php echo $id->menu_url_type; ?></option>
							<option value="none">None</option>
							<option value="external_link">External Link</option>
							<option value="post">Post</option>
							<option value="kategori">Kategori</option>
							<option value="tag">tag</option>
							<option value="page">page</option>
					 </select><br/><br/>
					 	<input type="hidden" name="id" value="<?php echo $id->id ?>">	
						<input type="submit" name="next" value="Next" />
		</form>

	</fieldset>

</body>
</html>