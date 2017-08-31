<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'><?php echo $data->user_name;?></span>
								<a class='btn btn-default col-md-1' data-toggle="modal" data-target="#<?php echo $data->id; ?>">
								<span style ='font-size: 16px;' class='glyphicon glyphicon-edit'></span>						
								</a>
</div>

<div id="<?php echo $data->id; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4><?php echo $data->user_name; ?></h4>

			</div>
			<form action="<?php echo site_url('admin_pengaturan/ubah_pass'); ?>" method="POST" class="form_level" id="form_level">
				<div class="modal-body">
				<input type="hidden" name="email" value="<?php echo $data->user_email;?>" />
				<input type="hidden" name="id" value="<?php echo $data->id;?>" />
					<h5>Apakah anda yakin ?</h5>
				</div>
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">ya</button>
				<button class="btn btn-default" data-dismiss="modal">tidak</button>
			</div>
			</form>
		</div>
	</div>
</div>