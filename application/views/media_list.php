<?php 
?>
		<div class="media-item">
			<div class="media-upload">
				<form method="post" enctype="multipart/form-data" name="form-up-img" id="form-up-img">
					<label for='my-img-selector'>
					<span class='add-icon glyphicon glyphicon-plus-sign'></span>
					<input id="my-img-selector" name="userimg[]" type="file" accept='.gif, .jpg, .png' multiple style="display: none;" >
					</label>
				</form>
			</div>
		</div>
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
				<input type="checkbox" name="folder[]" value="<?php echo $key?>"> 
				<div><?php echo $key?></div>
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
				<input type="checkbox" name="image[]" value="<?php echo $value?>"> 
				<div><?php echo $value?></div>
			</div>
		</div>

		<?php
	}
}
		

?>