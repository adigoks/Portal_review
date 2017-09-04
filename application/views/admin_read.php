<?php if ($data->saran_readed == 1 ) { ?>

<div class="form-group">
	<div  style="padding-bottom: 10px;" class="col-md-12">
		<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'><?php echo $data->saran_name; ?></span>
			<a class='btn btn-default col-md-1'>
				<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
			</a>
			<a class='btn btn-default col-md-1' data-toggle="modal" data-target="#modalBaca">
				<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open' ></span>	
			</a>
		</div>
	</div>
</div>

	<?php } ?>

<div id="modalBaca" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4><?php echo $data->saran_name; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $data->saran_isi; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>