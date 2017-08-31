<label class='sr-only' for='option_link'>no</label>
	<select class='form-control' id='option_link' name='option_link'>
		<option></option>
		<?php 
		$arr =array();

		foreach ($tag_list as $tag) 
		{ 
			$jsonarr = json_decode($tag->post_tag);
			for($i=0;$i<count($jsonarr);$i++)
			{
				if(!in_array($jsonarr[$i], $arr))
				{
					array_push($arr, $jsonarr[$i]);
				}
			}
		}
		for($i=0;$i<count($arr);$i++)
		{
			$tag_uri = str_replace(' ', '-', $arr[$i]);
			?>
			<option value="<?php echo base_url()."tag/".$tag_uri; ?>"><?php echo $arr[$i]; ?></option>
			<?php  
		}
		?>
	</select>