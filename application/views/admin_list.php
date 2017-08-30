<div  style="padding-bottom: 10px;" class="col-md-12">
	<span style='width:85%;font-size: 19px;' class='col-md-10 input-group-addon'><?php echo $data->user_name;?></span>
	<?php if ($data->user_level == 1) {?>
		<a class='btn btn-default input-group-btn' data-toggle="modal" data-target="#<?php echo $data->user_name; ?>">
			<span style ='font-size: 13px;'>Admin</span>						
		</a>
	<?php }else{?>
		<a class='btn btn-default input-group-btn' data-toggle="modal" data-target="#<?php echo $data->user_name; ?>">
			<span style ='font-size: 13px;' >User</span>						
		</a>
		<?php } ?>
	</select>
</div>

<div id="<?php echo $data->user_name; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4><?php echo $data->user_name; ?></h4>
			</div>
			<form action="<?php echo site_url('admin_pengaturan/update_level'); ?>" method="POST" class="form_level" id="form_level">
				<div class="modal-body">
				<input type="hidden" name="akun" value="<?php echo $data->user_name;?>" />
					<label>Ubah level account ini menjadi</label><br/>
					<?php if ($data->user_level == 1) { ?>
						<select name="level">
							<option value="1"?>Admin</option>
							<option value="2"?>User</option>
						</select>
					<?php }else{?>
						<select name="level">
							<option value="2"?>User</option>
							<option value="1"?>Admin</option>
						</select>
					<?php } ?>
				</div>
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Simpan Perubahan</button>
			</div>
			</form>
		</div>
	</div>
</div>
