<?php 
	if($identitas == null)
	{
		$img = 'image/default/empty_image.png';
		$val = '';
		$judul = 'example';
		$title = 'example' ;
		$cek = '';//image default kalo nggak ada fotonya
	}else{
		$identitas_value = json_decode($identitas->attribute_values);
		
		if($identitas_value->logo != null){
			$img = $identitas_value->logo;
			$val = $img;
		}else{
			$img = 'image/default/empty_image.png';
			$val = '';
		}
		$judul = $identitas_value->judul;
		$title = $identitas_value->nama ; 	
		$cek = $identitas_value->show;
		
	}
	if(is_null($warna))
	{
		$warna_aksen = '#000000';
		$warna_dasar = '#ffffff';
	}else{
		$warna_value = json_decode($warna->attribute_values);
		$warna_aksen = $warna_value->aksen;
		$warna_dasar = $warna_value->dasar;
	}

	$warna_option = array(
		'Georgia' => 'Georgia, serif',
		'Helvetica' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		'Times New Roman' => '"Times New Roman", Times, serif',
		'Lucida' =>'"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		'Tahoma' => 'Tahoma, Geneva, sans-serif',
		'Trebuchet MS' => '"Trebuchet MS", Helvetica, sans-serif',
		'Courier New' => '"Courier New", Courier, monospace'
		 );
	if(is_null($font))
	{
		$font_type = '"Helvetica Neue",Helvetica,Arial,sans-serif';
		$font_style = 'normal';
		$font_size = '14';
		$font_color = '#000000';
		$font_weight = 'normal';
	}else{
		$font_value = json_decode($font->attribute_values);
		$font_type = $font_value->family;
		$font_style = $font_value->style;
		$font_size = $font_value->size;
		$font_color = $font_value->color;
		$font_weight = $font_value->weight;
	}


		$target = '';
		$default = 'admin-dashboard/tampilan';
?>

<div style="display: flex;align-items: flex-end;">
	<div  style="margin-right: 10px">
		<h4>TAMPILAN</h4>
	</div>
	<div style='margin-bottom: 10px'>
		
		<a href="<?php echo base_url().'admin_preview/?default='.$default.'&target='.$target;?>" >tinjau situs</a>
		
		
	</div>
</div>	
<div >
	<div id='tampilan-accordion' class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#tampilan-accordion' href="#tampilan1">Identitas Situs</a>
				</h4>
				
			</div>
			<div id="tampilan1" class="panel-collapse collapse">
				<div class="panel-body">
					<?php echo form_open('admin_layout/set_identity', 'id="form_identity"'); ?>
						<div class="form-group">
							<label for="image_path" >Logo Situs</label>
							<div style="position: relative;">
								<img id='logo-pic' class="change-pic" src="<?php echo base_url().$img;?>" >
								<a id='change-image-btn' class="c change-image-btn" data-toggle='modal' data-target='#ganti-image' style="display: none">
									<span class="glyphicon">&#xe046;</span>
								</a>
							</div>
							resolusi yang disarankan : 50 x 50 pixel 
							<input id='image_path' type="text" name="image_path" value='<?php echo $val;?>' hidden>
						</div>
						<div class="form-group">
							<label for="judul_post" >Judul Situs</label>
							<input class="form-control" type="text" id="judul_situs" name="judul_situs" placeholder="judul Situs" value="<?php echo $judul;?>">
							Judul situs akan tampil bagian atas di samping kiri logo
						</div>
						<div class="form-group">
							<label for="judul_post" >Nama Situs</label>
							<input class="form-control" type="text" id="nama_situs" name="nama_situs" placeholder="Nama Situs" value="<?php echo $title;?>">
							Nama situs akan tampil bagian title
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name='tampilkan_post_title' value='tampil' <?php if($cek == 'tampil'){echo 'checked';}?>> tampilkan judul post/ page setelah nama situs pada bagian title.
							</label>
						</div>
						<input style='float: right;' type="submit" class="btn btn-primary" name='simpan_identitas' value="simpan">
					<?php echo form_close();?>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#tampilan-accordion' href="#tampilan2">Warna</a>
				</h4>
			</div>
			<div id="tampilan2" class="panel-collapse collapse">
				<div class="panel-body">
					<?php echo form_open('admin_layout/set_warna', 'id="form_warna"'); ?>
						<div class="form-group">
							<label for='warna_aksen'>Aksen</label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default" style="padding-top: 5px;padding-bottom: 4px;">
									<input class='btn btn-default' id="warna_aksen" type="color" name="warna_aksen" style="padding: 0px;" value="<?php echo $warna_aksen;?>">	
									</span>
								</span>
								<input class='form-control' type="text" name="warna_aksen_hex" readonly="" value="<?php echo $warna_aksen;?>">
							</div>
						</div>
						<div class="form-group">
							<label for='warna_aksen'>Warna Dasar</label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default" style="padding-top: 5px;padding-bottom: 4px;">
									<input class='btn btn-default' id="warna_dasar" type="color" name="warna_dasar" style="padding: 0px;" value="<?php echo $warna_dasar;?>">	
									</span>
								</span>
								<input class='form-control' type="text" name="warna_dasar_hex" readonly="" value="<?php echo $warna_dasar;?>">
							</div>
						</div>
						<input style='float: right;' type="submit" class="btn btn-primary" name='simpan_warna' value="simpan">
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#tampilan-accordion' href="#tampilan3">Font</a>
				</h4>
			</div>
			<div id="tampilan3" class="panel-collapse collapse">
				<div class="panel-body">
					<?php echo form_open('admin_layout/set_font', 'id="form_font"'); ?>
						<div class="row">
						<div class="form-group col-md-8">
							<label for='font_type'>Default Font</label>
							<Select id='font_type' class='form-control font-option' name="font_type" >
							<?php
								foreach ($warna_option as $key => $value) {
									?>
									<option value='<?php echo $value;?>' <?php echo ($value == $font_type)? 'selected' : '';?>>
										<?php echo $key;?>
									</option>
									<?php
								}
							?>
								
							</select>
						</div>
						<div class="col-md-4">
							<b>preview</b>
							<div id="font-preview" style='font-family: <?php echo $font_type;?>;font-size: <?php echo $font_size;?>;font-weight: <?php echo $font_weight;?>; font-style: <?php echo $font_style;?>; color: <?php echo $font_color;?>'>
								The quick brown fox jumps over the lazy dog
							</div>
						</div>
						</div>
						<div class="form-group" >
							<label for='font_style'>Font Style</label>
							<br>
							<input type="checkbox" name="font_style" value="italic" <?php echo ($font_style == 'italic')?'checked':'';?>> <i>italic</i>
							<input type="checkbox" name="font_weight" value="bold" <?php echo ($font_weight == 'bold')?'checked':'';?>> <b>bold</b>
						</div>
						<div class="form-group">
							<label for='font_size'>Ukuran Font</label>
							<input class='form-control font-option' type="number" name="font_size" value="<?php echo $font_size;?>">
						</div>
						<div class="form-group">
							<label for='warna_font'>Warna Font</label>
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-default" style="padding-top: 5px;padding-bottom: 4px;">
									<input class='btn btn-default font-option' id="warna_font" type="color" name="font_warna" style="padding: 0px;" value="<?php echo $font_color;?>">	
									</span>
								</span>
								<input class='form-control' type="text" name="warna_font_hex" readonly=""
								value="<?php echo $font_color;?>">
							</div>
						</div>
						nb: warna dan ukuran font hanya akan berlaku pada bagian paragraf. tidak berlaku pada bagian judul, subjudul,link dll.
						<input style='float: right;' type="submit" class="btn btn-primary" name='simpan_font' value="simpan">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
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
<script type="text/javascript">
	
	var $upload = function(){
		$('.loader').css('display','none');

		console.log('duh2');
		$("[name='warna_dasar']").change(function(){
			$("[name='warna_dasar_hex']").val($(this).val());
		});
		$("[name='warna_aksen']").change(function(){
			$("[name='warna_aksen_hex']").val($(this).val());
		});
		$("[name='font_warna']").change(function(){
			$("[name='warna_font_hex']").val($(this).val());
		});

		$("[name='font_type']").change(function(){
			$("#font-preview").css('font-family',$(this).val());
		});

		$("[name='font_style']").change(function(){
			if($(this).prop('checked'))
			{
				$("#font-preview").css('font-style','italic');
			}else{
				$("#font-preview").css('font-style','normal');
			}
			
		});

		$("[name='font_weight']").change(function(){
			if($(this).prop('checked'))
			{
				$("#font-preview").css('font-weight','bold');
			}else{
				$("#font-preview").css('font-weight','normal');
			}
			
		});

		$("[name='font_size']").change(function(){
			$("#font-preview").css('font-size',$(this).val());
		});

		$("[name='font_warna']").change(function(){
			$("#font-preview").css('color',$(this).val());
		});


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
			$("[name='image_path']").val(filepath);
			$('#logo-pic').attr('src', '<?php echo base_url();?>'+filepath);

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
		$('#change-image-btn').css('display','block');
	}
	$(function() {
			
			$("#media-list" ).load( "<?php echo base_url()."admin_media/media_list"; ?>", $upload); //load initial records			
	});
	
	

	
</script>