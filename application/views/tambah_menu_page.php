<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Tambahkan Menu</h2>

	<fieldset>
		<?php echo validation_errors(); ?>
		<form action="<?php echo site_url('admin_menu/menu_tambah_page'); ?>" method="POST">
			
			Nama Menu : 
			<input type="text" name="menu_name" value="<?php echo $menu_name ?>" readonly="readonly" /><br/><br/>
			Tipe Menu : 
			<input type="text" name="menu_tipe" value="<?php echo $menu_url_type ?>" readonly="readonly" /><br/><br/>
			Judul Page :
			<select name="page">
				<option></option>
				<?php foreach ($page_list as $page) 
				{ ?>
					
					<option value="<?php echo $page->page_judul; ?>"><?php echo $page->page_judul; ?></option>

				<?php } ?>
				
			</select><br/><br/>
			<input type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</body>
</html>