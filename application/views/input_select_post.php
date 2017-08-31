<label class='sr-only' for='option_link'>no</label>
	<select class='form-control' id='option_link' name='option_link'>
		<option></option>
		<?php 
		if (!is_null ($post_list)) {
		foreach ($post_list as $post) 
		{ ?>
	
		<option value="<?php echo base_url()."post/".$post->post_uri; ?>"><?php echo $post->post_judul; ?></option>

		<?php 
		}} ?>
	</select>