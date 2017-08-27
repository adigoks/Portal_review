<div>
	<h2>Edit Menu</h2>

	<fieldset>
		<form class="col-md-4 form-horizontal" action="<?php echo site_url('admin_menu/edit_menu'); ?>" method="POST">
			<div class="form-group">
				<label for="menu_name">Nama Menu :</label> 
				<input class="form-control " type="text" name="menu_name" value="<?php echo $name ?>" readonly="readonly" />
			</div>
			<div class="form-group">
				<label for="tipe_name">Tipe Menu :</label> 
				<input class="form-control " type="text" name="menu_tipe"  value="<?php echo $tipe ?>" readonly="readonly" />
			</div>	

			<?php if ($tipe == 'external_link'): ?>
			<div class="form-group">
				<label for="url">External Link :</label> 
				<input class="form-control " type="text" name="url"  value="<?php if ($url_name->menu_url_type == 'external_link') {
				echo $url_name->menu_url;
			} else {
				echo "" ;
			}
			 ?>" />
			</div>	
			<?php endif ?>


			<?php if ($tipe == 'page'): ?>
			<div class="form-group">
				<label for="url">Judul Page :</label>
				<select class="form-control" name="url">
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
			</select> 

			</div>
			<?php endif ?>


			<?php if ($tipe == 'post'): ?>
			<div class="form-group">
				<label for="url">Judul Post :</label> 
				<select class="form-control" name="url">
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
				</select>
			</div>
			<?php endif ?>


			<?php if ($tipe == 'tag'): ?>
			<div class="form-group">
				<label for="url">Nama Tag :</label> 
				<select class="form-control" name="url">
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
				</select>	
			</div>
			<?php endif ?>

			<input type="hidden" name="id" value="<?php echo $url_name->id ?>">
			<input class="btn btn-default" type="submit" name="submit" value="Submit" />
		</form>

	</fieldset>
</div>
