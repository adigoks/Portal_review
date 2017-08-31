<label class='sr-only' for='option_link'>no</label>
	<select class='form-control' id='option_link' name='option_link'>
		<option></option>
		<?php
			if($kategori != null)
			{
				$obj =json_decode($kategori->attribute_values);
				$i=1;
				foreach ($obj as $key => $value ) {
					$kategori_uri = str_replace(' ', '-', $value);
					?>
					<option value="<?php echo base_url().'kategori/'.$kategori_uri;?>" ><?php echo $value;?></option>
					<?php
				}
			}
		?>
	</select>