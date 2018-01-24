<div class="row">

<?php if ($user->user_confirm == 1) { ?>
	<p class="alert alert-success" style="text-align: center"><?php echo $this->session->flashdata('notification'); ?></p><br/>
		<?php }else{ ?>
		<div class="">
			<h5 class="alert alert-warning" style="text-align: center">mohon buka email anda untuk verifikasi akun anda</h5>
		</div>
	<h5 id="sukses" class="" style="text-align:center;"><?php echo $this->session->flashdata('notification'); ?></h5><br/>
	<h5 id="sukses" class="" style="text-align:center;"><?php echo validation_errors(); ?></h5><br/>
<?php } ?>

	<div class="col-md-12">
		
		<div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
				<!-- form open here Post here -->
				<?php echo form_open('admin_profil/update_profil', 'id="post-article"'); ?>
					<?php 
						if($user->user_profile_img == '')
						{
							$img = 'image/default/blank-profile.png';
							$val = ''; //image default kalo nggak ada fotonya
						}else{
							$img = $user->user_profile_img;
							$val = $img;
						}
					?>
					<div class="form-group">
						
						<img id='profile-pic' class="profile-pic" src="<?php echo base_url().$img;?>" >
						<a class="c btn-md" data-toggle='modal' data-target='#ganti-image'>
							<span class="btn2 glyphicon">&#xe046;</span>
						</a>
						<input id='image-path' type="text" name="image-path" value='<?php echo $val;?>' hidden>
					</div>
					<div class="form-group">
						<label for="username" >User name</label>
						<input class="form-control" type="text" id="username" name="username" placeholder="User name" value="<?php echo $user->user_name; ?>">
					</div>
					<div class="form-group">
						<label for="email" >Email</label>
						<input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php echo $user->user_email; ?>">
					</div>
					<div class="form-group">
						<label for="deskripsi" >Deskripsi</label>
						<textarea class="form-control" id="deskripsi" form="post-article" name="deskripsi" cols="150" rows="10"><?php echo $user->user_deskripsi; ?></textarea>
					</div>

					<div class="form-group">
						
						<input type="hidden" name="id" value="<?php echo $user->id; ?>" >
						<input class="form-control"  type="submit" name="simpan" value="simpan">
					</div>
				</form>
				<div id="ganti-image" class="modal fade">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Ganti Image</h4>
							</div>
							<div class="modal-body">
								
								<div class='media-manager-container row'>

									<div id='media-list' class='col-md-9'> </div>
									<div id='media-option' class='col-md-3'>
										<div class='media-info'>
											<div>
												<h4>Nama</h4>
												<div id="filename-info" class="file-info"> ...</div>
											</div>
											
											<div>
												<h4>Tipe file</h4>
												<div id="filetype-info" class="file-info"> ...</div>
											</div>
											<div>
												<h4>Ukuran</h4>
												<div id="filesize-info" class="file-info"> ...</div>
											</div>
											
										</div>
										<div class="media-action">
											<button id='open-file' type="button" class="btn btn-default" data-dismiss='modal' disabled>open</button>
											
											<button id='del-file' type="button" class="btn btn-default" disabled>delete</button>
										</div>
									</div>
									<div class='loader'><div></div></div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div> 
		
	</div>
	
</div>
<script type="text/javascript">
	
	var $upload = function(){
		$('.loader').css('display','none');

		console.log('duh2');

		$('#del-file').click(function(){

			var array = new Array();
			$('.media-checkbox > input').each(function(){
				
				console.log('cek');
				if($(this).prop('checked')){
					array.push($(this).val());
				}
			});
			if(confirm('Apakah anda yakin untuk menghapus file ini?'))
			{
				deleteFile(array);
			}
			event.preventDefault();
		});

		$('#rename-file').click(function(){
			var val;
			$('.media-checkbox > input').each(function(){
				
				if($(this).prop('checked')){
					val = $(this).val();
				}
			});
			var name = val.substring(0, val.lastIndexOf('.'));
			var type = '.'+ val.split('.').pop();
			console.log(name);
			console.log(type);
			$("[name='nama-file']").val(name);
			$('#file-ext').text(type);
		});
		$('#open-file').click(function(){
			var filepath;
			$('.media-checkbox > input').each(function(){
				console.log('cek');
				if($(this).prop('checked')){
					filepath = $(this).val();
				}
			});
			<?php
			$id = $this->session->userdata('id_author');
			$user = $this->user_model->selectId($id)->row();
			$name = $user->user_name;
			?>
			filepath = 'image/'+'<?php echo md5($name.$id);?>'+'/'+filepath;
			$("[name='image-path']").val(filepath);
			$('#profile-pic').attr('src', '<?php echo base_url();?>'+filepath);

		});
		
		$('.media-preview').click( function (){
			console.log('duh1');
			$('.media-checkbox > input').each(function(){
				$(this).prop('checked',false);
			});
			var val = $(this).next().find('input').val() ;
			$(this).next().find('input').prop('checked', true);
			$('.media-item').each(function(){
				$(this).css('border-radius', '5px');
				$(this).css('border', '2px solid #8e8e8e');
			})

			$(this).parent().css('border-radius', '8px');
			$(this).parent().css('border', '5px solid #8e8e8e');

			$('#open-file').prop('disabled',false);
			$('#rename-file').prop('disabled',false);
			$('#del-file').prop('disabled',false);

			getDetail(val);
		});

		$('.media-checkbox > input').click(function(){
			var count = 0;
			var val;
			$('.media-checkbox > input').each(function(){
				
				console.log('cek');
				if($(this).prop('checked')){
					$(this).parent().parent().css('border-radius', '8px');
					$(this).parent().parent().css('border', '5px solid #8e8e8e');
					count++;
					val = $(this).val();
				}else{
					$(this).parent().parent().css('border-radius', '5px');
					$(this).parent().parent().css('border', '2px solid #8e8e8e');
				}
			});
			if(count == 0)
			{
				$('#open-file').prop('disabled',true);
				$('#rename-file').prop('disabled',true);
				$('#del-file').prop('disabled',true);
				$('#filename-info').text('...');
				$('#filetype-info').text('...');
				$('#filesize-info').text('...');
			}else if (count == 1)
			{
				$('#open-file').prop('disabled',false);
				$('#rename-file').prop('disabled',false);
				$('#del-file').prop('disabled',false);
				getDetail(val);
			}else{
				$('#open-file').prop('disabled',true);
				$('#rename-file').prop('disabled',true);
				$('#del-file').prop('disabled',false);
				$('#filename-info').text('...');
				$('#filetype-info').text('...');
				$('#filesize-info').text('...');
			}
			
		});

		$('#my-img-selector').on('change',function(event){
			event.preventDefault();
			var $form = $('#form-up-img').get(0);
			console.log('proses uplaod dimulai');
			console.log(this.files[0].name);
			var oOutput = $('.uplaod-status');
	  		var oData = new FormData($form);
	  		
			console.log(oData);
			$.ajax({
				method :"POST", 
				url : "<?php echo base_url()."admin_media/do_upload"; ?>", 
				data : oData,
				dataType : 'json',
				async :true ,
				processData: false,
	            contentType: false,
	            timeout: 120000,
				success : function (response){
					console.log(response);
					var res = response;
					if (res.status == 'ok') {
						console.log(res.status);
			  		oOutput.innerHTML = "Uploaded!";
						$("#media-list" ).load( "<?php echo base_url().'admin_media/media_list'; ?>", $upload);
					} else {
						console.log(res.error_message);
					oOutput.innerHTML = "Error " + res.error_message + " occurred when trying to upload your file.<br \/>";
					}
				},	
				error : function (response)
				{
					console.log(response.responseText);
				}
			});
			$('.loader').css('display','block');
		});	

		function getDetail (filename){
			
	  		var oData = new FormData();
	  		oData.append('file_name', filename);
			$.ajax({
				method :"POST", 
				url : "<?php echo base_url()."admin_media/detail"; ?>", 
				data : oData,
				dataType : 'json',
				async :true ,
				processData: false,
				contentType: false,
				timeout: 120000,
				success : function (response){
					console.log(response);
					var res = response;

					var size = res.size;
					var stringsize;
					 if(size>1048576)
					{
						size = parseFloat(size / 1048576).toFixed(3);
						stringsize = size+' MB';
					}else if(size>1024)
					{
						size = parseFloat(size / 1024).toFixed(3);
						stringsize = size+' KB';
					}else{
						stringsize = size+' B';
					}
					$('#filename-info').text(filename);
					$('#filetype-info').text(res.type+' '+res.mime);
					$('#filesize-info').text(stringsize);
				},	
				error : function (response)
				{
					console.log(response.responseText);
				}
			});
			
		}

		function deleteFile (filename) {
			console.log(filename)

			var oData = new FormData();
			var length = filename.length;
			for (var i = 0; i < length; i++) {
				console.log(filename[i]);
				oData.append('file_name[]', filename[i]);
			}
	  		// oData.append('file_name', filename);
			$.ajax({
				method :"POST", 
				url : "<?php echo base_url()."admin_media/delete"; ?>", 
				data : oData,
				dataType : 'json',
				async :true ,
				processData: false,
				contentType: false,
				timeout: 120000,
				success : function (response){
					console.log(response);
					$("#media-list" ).load( "<?php echo base_url().'admin_media/media_list'; ?>", $upload);
				},	
				error : function (response)
				{
					console.log(response.responseText);
				}
			});
			$('.loader').css('display','block');
			
		}

		function renameFile (oldname, newname){
			
	  		var oData = new FormData();
	  		oData.append('old_name', oldname);
	  		oData.append('new_name', newname);
			$.ajax({
				method :"POST", 
				url : "<?php echo base_url()."admin_media/rename"; ?>", 
				data : oData,
				dataType : 'json',
				async :true ,
				processData: false,
				contentType: false,
				timeout: 120000,
				success : function (response){
					console.log(response);
					$("#media-list" ).load( "<?php echo base_url().'admin_media/media_list'; ?>", $upload);
				},	
				error : function (response)
				{
					console.log(response.responseText);
				}
			});
			$('.loader').css('display','block');
		}

	}
	$(function() {
			
			$("#media-list" ).load( "<?php echo base_url()."admin_media/media_list"; ?>", $upload); //load initial records			
	});
	
	

	
</script>