<div>

	<h2>Edit Menu</h2>
	<fieldset>
		<form class="col-md-4 form-horizontal" action="<?php echo site_url('admin_menu/edit_next_menu'); ?>" method="POST">
			<div class="form-group">
				<label for="menu_name">Nama Menu :</label> 
				<input class="form-control " type="text" name="menu_name" placeholder="Nama Menu" value="<?php echo $id->menu_name; ?>" />
			</div>
			<div class="form-group">
				<label for="menu_name">Tipe Menu :</label> 
				<Select class="form-control" name="menu_tipe" >
							<option value="<?php echo $id->menu_url_type; ?>"><?php echo $id->menu_url_type; ?></option>
							<option value="none">None</option>
							<option value="external_link">External Link</option>
							<option value="post">Post</option>
							<option value="kategori">Kategori</option>
							<option value="tag">tag</option>
							<option value="page">page</option>
					 </select>
			</div>
			
					 	<input type="hidden" name="id" value="<?php echo $id->id ?>">	
						<input class="btn btn-default" type="submit" name="next" value="Next" />
		</form>

	</fieldset>

</div>