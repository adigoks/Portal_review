
<div style="margin-bottom: 10px;">
	<div class='input-group input-group-lg'>
		<span class=' input-group-addon' style="border-bottom-left-radius: 0">
		</span>
		<!-- <span style='font-size: 16px; ' class='input-group-btn'>
			
				<a href="#"  style='border-radius: 0' class="btn btn-default input-group-btn">
					
				</a>
			
		</span> -->
		<span style='width:90%;background-color: white ;font-size: 16px;border-bottom-right-radius: 0;' class=' input-group-addon'><?php echo $data->post_judul; ?></span>
		<!-- <span style='width:8%;font-size: 16px;' class=' input-group-btn '>
			<a href='#'  class='btn btn-primary input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-comment'></span>						
			</a>
			<a href='#'  class='btn btn-primary input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-edit'></span>						
			</a>
			<a href='#'  class='btn btn-primary input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
			</a>	
			<a href='#'  class='btn btn-primary input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-new-window'></span>						
			</a>	
		</span> -->
	</div>

	<div class='input-group input-group-lg'>
		
		<span style='border-top-left-radius: 0;width:22%;font-size: 16px;' class='input-group-addon'>
			
				<!-- <a href="#"  class="btn btn-default input-group-btn" style='border-top-left-radius: 0;'>
					
				</a> -->
				
				<?php $date=$data->post_waktu; echo date("d/m/y",strtotime($date));?>
		</span>
		<span style='width:22%;font-size: 16px;' class=' input-group-addon'><?php foreach($post_id as $id){echo $id->user_name;} ?></span>
		<span style='font-size: 16px;' class=' input-group-btn '>
			<a href='#'  class='btn btn-default input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-comment'></span>						
			</a>
			<a href='<?php echo site_url('admin_post/form_edit_post/'.$data->id); ?>'  class='btn btn-default input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-edit'></span>						
			</a>
			<a onclick="return popups();" href='<?php echo site_url('admin_post/delete_post/'.$data->id); ?>'  class='btn btn-default input-group-btn'>
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
			</a>	
			<a href='#'  class='btn btn-default input-group-btn' style="border-top-right-radius: 0;">
				
				<span style ='font-size: 16px;' class='glyphicon glyphicon-new-window'></span>						
			</a>	
		</span>
	</div>
</div>
<script>
	function popups(){
		q=confirm("Apakah anda yakin ingin menghapus Post ini?");
		if( q!= true)
		{
				return false;
		}
	}
</script>

