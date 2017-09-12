<label class='sr-only' for='option_link'>no</label>
	<select class='form-control' id='option_link' name='option_link'>
		<option ></option>
		<option value="<?php echo base_url().'page/login'; ?>">login</option>
		<option value="<?php echo base_url().'page/form_daftar'; ?>">daftar</option>
		<option value="<?php echo base_url().'page/saran'; ?>">saran</option>

			<?php foreach ($page_list as $page) 
			{ ?>
			
				<option value="<?php echo base_url().'page/'.$page->page_judul; ?>"><?php echo $page->page_judul; ?></option>

			<?php } ?>
	</select>