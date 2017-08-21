
<H3>Kelola Gambar Anda</H3>
<?php 
	if(isset($error)){
		echo  'oi';
	}
	
	if(isset($success)){
		echo "berhasil";
	}
?>
<div class="uplaod-status"></div>
<div class='media-manager-container col-md-12'>

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
			<button id='open-file' type="button" class="btn btn-default" disabled>open</button>
			<button id='rename-file' type="button" class="btn btn-default" data-toggle='modal' data-target='#rename' disabled>rename</button>
			<button id='del-file' type="button" class="btn btn-default" disabled>delete</button>
		</div>
	</div>
	<div class='loader'><div></div></div>
</div>

<div id='rename' class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Rename file</h4>
			</div>
			<div class="modal-body">
				<p>Ubah nama file yang anda inginkan</p>
				<div class="input-group">
					<input class="form-control" type="text" name="nama-file">
					<span id='file-ext' class='input-group-addon'></span>
				</div>
			</div>
			<div class="modal-footer">
				<button id='rename-button' type="button" class="btn btn-default" data-dismiss="modal">rename</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	
	var $upload = function(){
		$('.loader').css('display','none');

		console.log('duh2');

		$('#del-file').off().click(function(){
			
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
		$('#rename-button').click(function(){
			var oldName;
			$('.media-checkbox > input').each(function(){
				console.log('cek');
				if($(this).prop('checked')){
					oldName = $(this).val();
				}
			});
			if($("[name='nama-file']").val() != '')
			{
				var newName = $("[name='nama-file']").val() + $('#file-ext').text();
				renameFile(oldName,newName);
			}
		});
		$("[name='nama-file']").keyup( function(){
			if($("[name='nama-file']").val() != '')
			{
				$('#rename-button').prop('disabled',false);
			}else{
				$('#rename-button').prop('disabled',true);
			}
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
						alert('file gagal di upload! pastikan ukuran file kurang dari 2,5 MB dan merupakan file image.');
						$("#media-list" ).load( "<?php echo base_url().'admin_media/media_list'; ?>", $upload);
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
					$('#open-file').prop('disabled',true);
					$('#rename-file').prop('disabled',true);
					$('#del-file').prop('disabled',true);
					$('#filename-info').text('...');
					$('#filetype-info').text('...');
					$('#filesize-info').text('...');
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
					$('#open-file').prop('disabled',true);
					$('#rename-file').prop('disabled',true);
					$('#del-file').prop('disabled',true);
					$('#filename-info').text('...');
					$('#filetype-info').text('...');
					$('#filesize-info').text('...');
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