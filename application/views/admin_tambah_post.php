<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li <?php if($b == 'simpan'){echo '';}
			else{echo 'class ="active"';}?> ><a data-toggle="tab" href="#home">Artikel</a></li>
			<li <?php if($b == 'simpan'){echo 'class = "active"';}
			else{echo '';}?> ><a data-toggle="tab" href="#menu1">Halaman Statis</a></li>
		</ul>
		
		<div class="tab-content">
		    <div id="home" <?php if($b == 'simpan'){echo 'class="tab-pane fade"'; }
			else{echo 'class="tab-pane fade in active"';}?>>
		    	<?php echo $this->session->flashdata('pesan'); ?>
				<h3>Tambah Artikel</h3>
				
				<!-- form open here Post here -->
				<fieldset>
					<?php echo form_open('admin_post/add_post', 'id="post-article"'); ?>
					<div class="form-group">
						<div>
							
							<label for="gambar_post" >Gambar Artikel</label>
							<div style="position: relative;">
								<img id='article-pic' class='change-pic' src="<?php echo base_url().'image/default/empty_image.png';?>" >
								<a id='change-image-btn' class="c change-image-btn" data-toggle='modal' data-target='#add-image' style="display: none">
									<span class="glyphicon">&#xe046;</span>
								</a>
							</div>
							resolusi yang disarankan : 700 x 300 pixel
							<input type="text" id="gambar_post" name="gambar_post" hidden>
						</div>
					</div>
					<div class="form-group">
						<div>
							<?php echo form_error('judul_post','<div style="color:red">','<div>');?>
							<label for="judul_post" >Judul Artikel</label>
							<input class="form-control" type="text" id="judul_post" name="judul_post" placeholder="judul artikel">
						</div>
					</div>
					<div class="form-group">
						<div>
							<?php echo form_error('isi_post','<div style="color:red">','<div>');?>
							<label for="isi_post" >Isi Artikel</label>
							<div class="wysiwyg"></div>
							<input type="text"  id="isi_post" name="isi_post" cols="150" rows="10" hidden>
						</div>
					</div>
					
					<label for="tag_post" >tag</label>
					<div class="form-group">
						<div class="form-inline">
							<div id="tag-col">
								
							</div>
							<input class="form-control" form='' id="tag_post" type="text" name="tag_post[]" placeholder="tambahkan tag" style="width:200px">
							<button id='add-tag' class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span></button>
							
						</div>
						tekan tombol + untuk menambahkan tag
					</div>
					
					<div class="form-group">
						<label for="kategori_post" >kategori</label>
						<select id="kategori" form="post-article" name="kategori_post" class="form-control">
							<option >-</option>
							<!-- list kategori sesuai database -->
							<option >kategori 1</option>
							<option >kategori 2</option>
							<option >kategori 3</option>
							
						</select>
					
					</div>
					<div class="checkbox col-md-12">
						<label>
						<input  type="checkbox" name="enable_comment" value="enable_comment">perbolehkan komentar 
						</label>
					</div>

					<div class="form-group">
						
						<input class="form-control"  type="submit" name="simpan_post" value="simpan post">
					</div>
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="terbitkan_post" value="terbitkan post">
					</div>
			<?php echo form_close();?>
				</fieldset>
				
			</div>
			<div id="menu1" <?php if($b == 'simpan'){echo 'class="tab-pane fade in active"'; }
			else{echo 'class="tab-pane fade"';}?>>
			<?php echo $this->session->flashdata('page_pesan'); ?>
				<h3>Tambah Artikel</h3>
			    <!-- form open here Post here -->
					<fieldset>
					<?php echo form_open('admin_post/add_page', 'id="post-page"'); ?>

			    	<div class="form-group">
						<div>
							<?php echo form_error('nama_page','<div style="color:red">','<div>');?>
							<label for="nama_page" >nama Page</label>
							<input class="form-control" type="text" id="nama_page" name="nama_page" placeholder="judul page">
						</div>
					</div>
			    	<div class="form-group">
						<div>
							<?php echo form_error('judul_page','<div style="color:red">','<div>');?>
							<label for="judul_page" >Judul Page</label>
							<input class="form-control" type="text" id="judul_page" name="judul_page" placeholder="judul page">
						</div>
					</div>
					<div class="form-group">
						<div>
							<?php echo form_error('isi_page','<div style="color:red">','<div>');?>
							<div class="wysiwyg"></div>
							<input type="text" id="isi_page"  name="isi_page" cols="150" rows="10" hidden>
						</div>
					</div>
					
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="simpan_page" value="simpan">
					</div>
					<div class="form-group">
						
						<input class="form-control"  type="submit" name="terbitkan_page" value="terbitkan">
					</div>
					
					
				<?php echo form_close();?>
				</fieldset>
			    
			</div>
		</div> 
		
	</div>
	
</div>
<div id="add-image" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambahkan Image</h4>
			</div>
			<div class="modal-body">
				
				<div class='media-manager-container row'>
					<div id='link-img' class="col-md-12">
						<div class="input-group">
							<input class='form-control' type="text" name="link-image" placeholder="link image...">
							<span class="input-group-btn">
								<button id='open-link' class="btn btn-default" data-dismiss='modal' disabled="">tambah</button>
							</span>
						</div>
						<hr>
					</div>
					
					
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
							<button id='open-featured' type="button" class="btn btn-default" data-dismiss='modal' disabled >open</button>
							<button id='del-file' type="button" class="btn btn-default" disabled>delete</button>
						</div>
					</div>
					<div class='loader'><div></div></div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<script type="text/javascript">



	$(document).ready(function() {
		
				

		var InsImg = function (context) {
			var ui = $.summernote.ui;

			// create button
			var button = ui.button({
				contents: "<i class='note-icon-picture'></i>",
				tooltip: 'image',
				click: function () {
				// invoke insertText method with 'hello' on editor module.
				$('#link-img').css('display','block');
				$('#open-file').addClass('btn');
				$('#open-file').prop('hidden',false);
				$('#open-featured').prop('hidden',true);
				$('#open-featured').removeClass('btn');

				$('#add-image').modal('show');
				$("[name='link-image']").val('');
				
				$('#open-file').off().click(function(event){
					var filepath = '';
					
					$('.media-checkbox > input').each(function(){
						console.log('cek');
						if($(this).prop('checked')){
							filepath = $(this).val();
						}
					});

					filepath = 'image/'+filepath;
					context.invoke('editor.insertImage', '<?php echo base_url();?>'+filepath);
					event.preventDefault();
				});
				$('#open-link').off().click(function(){
					var filepath = $("[name='link-image']").val();
					console.log(filepath);
					context.invoke('editor.insertImage', filepath);	
				});
				}
			});

			return button.render();   // return button as jquery object
		}

		$('.wysiwyg').summernote({
		  	height: 300,                 // set editor height
			minHeight: 300,             // set minimum height of editor
			maxHeight: 600,             // set maximum height of editor
			focus: true,
			toolbar: [
				['style', ['style']],
				['undoredo',['undo','redo']],

				['fontstyle', ['bold','italic','underline','clear']],
				['fontname',['fontname']],
				['fontcolor',['color']],
				['paragraph',['ul','ol','paragraph']],
				['tables',['table']],
				['insert',['link','img','video']],
				['misc',['fullscreen', 'codeview', 'help']]

			],

			buttons: {
				img: InsImg
			}     
		});


		$("[name='simpan_post']").click(function(){
			var val = $('.wysiwyg').eq(0).summernote('code');
			$('#isi_post').val(val);
		});
		$("[name='terbitkan_post']").click(function(){
			var val = $('.wysiwyg').eq(0).summernote('code');
			$('#isi_post').val(val);
		});
		$("[name='simpan_page']").click(function(){
			var val = $('.wysiwyg').eq(1).summernote('code');
			$('#isi_page').val(val);
		});
		$("[name='terbitkan_page']").click(function(){
			var val = $('.wysiwyg').eq(1).summernote('code');
			$('#isi_page').val(val);
		});

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
		
		$("[name='link-image']").keyup( function(){
			if($("[name='link-image']").val() != '')
			{
				$('#open-link').prop('disabled',false);
			}else{
				$('#open-link').prop('disabled',true);
			}
		});
		$('#change-image-btn').click(function(){
			$('#open-featured').prop('hidden', false);
			$('#open-featured').addClass('btn');
			$('#open-file').prop('hidden',true);
			$('#open-file').removeClass('btn');
			$('#link-img').css('display','none');
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
			$('#open-featured').prop('disabled',false);
			$('#del-file').prop('disabled',false);

			getDetail(val);
		});
		$('#open-featured').off().click(function(){
			var filepath;
			$('.media-checkbox > input').each(function(){
				console.log('cek');
				if($(this).prop('checked')){
					filepath = $(this).val();
				}
			});
			filepath = 'image/'+filepath;
			$("[name='gambar_post']").val(filepath);
			$('#article-pic').attr('src', '<?php echo base_url();?>'+filepath);
		})
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
				$('#open-featured').prop('disabled',true);
				$('#del-file').prop('disabled',true);
				$('#filename-info').text('...');
				$('#filetype-info').text('...');
				$('#filesize-info').text('...');
			}else if (count == 1)
			{
				$('#open-file').prop('disabled',false);
				$('#open-featured').prop('disabled',false);
				$('#del-file').prop('disabled',false);
				getDetail(val);
			}else{
				$('#open-file').prop('disabled',true);
				$('#open-featured').prop('disabled',true);
				$('#del-file').prop('disabled',false);
				$('#filename-info').text('...');
				$('#filetype-info').text('...');
				$('#filesize-info').text('...');
			}
			
		});

		$('#my-img-selector').on('change',function(event){
			event.preventDefault();
			var $form = $('#form-up-img').get(0);
			console.log('proses upload dimulai');
			console.log(this.files[0].name);
			var oOutput = $('.upload-status');
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

		$('#change-image-btn').css('display','block');
	}
	
	$("#media-list" ).load( "<?php echo base_url()."admin_media/media_list"; ?>", $upload);
	});




</script>