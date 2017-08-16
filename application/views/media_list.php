<?php 

foreach ($dir as $key => $value) {

	if(is_array($value))
	{
		?>
		<div class="media-item">
			<div class="media-preview">
				<span class="folder-icon glyphicon glyphicon-folder-close"></span>	
			</div>
			<div class='media-checkbox'>
				<input type="checkbox" name="folder[]" value="<?php echo $key?>"> <?php echo $key?>
			</div>
		</div>
		<?php

	}else
	{
		?>
		<div class="media-item" >
			<div class='media-preview'>
				<img class="image-item" src="<?php echo base_url().$directory.'/'.$value;?>" width='150px' >	
			</div>
			<div class='media-checkbox'>
				<input type="checkbox" name="image[]" value="<?php echo $value?>"> <?php echo $value?>
			</div>
		</div>

		<?php
	}
}
?>
		<div class="media-item">
			<div class="media-preview">
				<span class='add-icon glyphicon glyphicon-plus-sign'></span>	
			</div>
		</div>
<?php		

?>