<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Edit Menu</h2>

	<fieldset>
		<form action="<?php echo site_url('admin_menu/edit_menu'); ?>" method="POST">
			
			Nama Menu : 
			<input type="text" name="menu_name" value="<?php echo $name ?>" readonly="readonly" /><br/><br/>
			Tipe Menu : 
			<input type="text" name="menu_tipe" value="<?php echo $tipe ?>" readonly="readonly" /><br/><br/>
			

			<?php if ($tipe == 'external_link'): ?>
				External Link :
			<input type="text" name="url" value="<?php if ($url_name->menu_url_type == 'external_link') {
				echo $url_name->menu_url;
			} else {
				echo "" ;
			}
			 ?>" /><br/><br/>
			<?php endif ?>


			<?php if ($tipe == 'page'): ?>
				Judul Page :
			<select name="url">
				<option value="<?php echo $url_name->menu_url; ?>"><?php if ($url_name->menu_url_type == 'page') {
					echo $url_name->menu_url;
				} else {
					echo "" ;
				}
				 ?></option>
				<option></option>
				<?php foreach ($page_list as $page) 
				{ ?>
					<option value="<?php echo $page->page_judul; ?>"><?php echo $page->page_judul; ?></option>
				<?php } ?>
			</select><br/><br/>
			<?php endif ?>


			<?php if ($tipe == 'post'): ?>
				Judul Post :
			<select name="url">
				<option value="<?php echo $url_name->menu_url; ?>"><?php if ($url_name->menu_url_type == 'post') {
					echo $url_name->menu_url;
				} else {
					echo "" ;
				}
				 ?></option>
				<option></option>
				<?php foreach ($post_list as $post) 
				{ ?>
					<option value="<?php echo $post->post_judul; ?>"><?php echo $post->post_judul; ?></option>
				<?php } ?>
			</select><br/><br/>
			<?php endif ?>


			<?php if ($tipe == 'tag'): ?>
				Nama Tag :
			<select name="url">
				<option value="<?php echo $url_name->menu_url; ?>"><?php if ($url_name->menu_url_type == 'tag') {
					echo $url_name->menu_url;
				} else {
					echo "" ;
				}
				 ?></option>
				<option></option>
				<?php foreach ($post_list as $post) 
				{ ?>
					<option value="<?php echo $post->post_tag; ?>"><?php echo $post->post_tag; ?></option>
				<?php } ?>
			</select><br/><br/>
			<?php endif ?>

			<input type="hidden" name="id" value="<?php echo $url_name->id ?>">
			<input type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>

</body>
</html>