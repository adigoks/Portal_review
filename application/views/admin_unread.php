<div class="form-group">
	<div  style="padding-bottom: 10px;" class="col-md-12">
		<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'><?php echo $data->saran_name; ?></span>
		<input type="hidden" name="id" id="id_pesan" value="<?php echo $data->id; ?>" />
			<a class='btn btn-default col-md-1'>
				<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
			</a>
			<a class='btn btn-default col-md-1 pesan_button'  data-toggle="modal" data-target="#modalBaca<?php echo $data->id; ?>" id="readed" >
				<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open'></span>	
			</a>
		</div>
	</div>
</div>

<div id="modalBaca<?php echo $data->id; ?>" class="modal fade" role="dialog">
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

<script>

$('#readed').click( function (){

			var val = $('#id_pesan').val();

			inbox_readed(val);

		});

function inbox_readed (filename){
			
	  		var oData = new FormData();
	  		oData.append('id_inbox', filename);
			$.ajax({
				method :"POST", 
				url : "<?php echo base_url().'admin_pengaturan/inbox_read'; ?>", 
				data : oData,
				dataType : 'hmtl',
				async :true ,
				processData: false,
				contentType: false,
				timeout: 120000,
				success : function (response){
					console.log(response);
					var res = response;
					$("#pesan" ).load( "<?php echo base_url().'admin_pengaturan/paginasi_unread'; ?>");
					
				},	
				error : function (response)
				{
					console.log(response.responseText);
				}
			});
			
		}

</script>