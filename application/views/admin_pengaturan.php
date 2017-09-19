<div style="display: flex;align-items: flex-end;">
	<div  style="margin-right: 10px">
		<h4>Pengaturan</h4><br/>
	</div>
</div>
<?php if($this->session->flashdata('pesan') != null) {?>
<div class="alert alert-success">
	<?php echo $this->session->flashdata('pesan'); ?>
</div>
<?php }?>
<div>
	<div id='pengaturan-accordion' class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#pengaturan-accordion' href="#pengaturan1">Kategori</a>
				</h4>
			</div>
		</div>

		<div id="pengaturan1" class="panel-collapse collapse">
			<div class="panel-body">
				<?php echo form_open('admin_pengaturan/update_kategori', 'id="form_identity"'); ?>
					<div class="form-group" id='kategori-list'>
						<input type="number" name="id_kategori" value="<?php if($kategori != null)
								{echo $kategori->id;}?>" hidden>
						<label for="daftar-kategori">Daftar Kategori</label>
							<?php 
								if($kategori != null)
								{
									$obj =json_decode($kategori->attribute_values);
									$i=1;
									foreach ($obj as $key => $value ) {
									?>
							
							<div id='kategori-item-<?php echo $i;?>' style='padding-bottom: 10px;' class='col-md-12 kategori-item'>
								<input type='text' name='kategori_value[]' value='<?php echo $value;?>' hidden>
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon kategori-value'><?php echo $value;?></span>
								<button form='' class='btn btn-default col-md-1' target='#kategori-item-<?php echo $i;?>' value='simpan'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</button>
							</div>
									<?php	# code...
									$i++;
									}
									
								}

							?>
							
					</div><br>
					<div class="form-group">
						<label for="new-kategori" >Tambah Kategori</label>
						<div class="input-group">
    						<input type="text" class="form-control" name='new-kategori' placeholder="Tambah Kategori...">
    						<span class="input-group-btn">
    							<button id='add-kategori' form="" class="btn btn-default" type="button">Tambah</button>
    						</span>
						</div>
					</div>
					
					<input style='float: right;' type="submit" class="btn btn-primary" name='simpan-kategori' value="simpan">
				<?php echo form_close();?>
			</div>
		</div>

		<?php if ($usr->user_level == 0) { ?>
		<div class="panel panel-default" id="pengaturan_permission">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#pengaturan-accordion' href="#pengaturan2">Permission</a>
				</h4>
			</div>
		</div>

		<div id="pengaturan2" class="panel-collapse collapse">
			<div class="panel-body">
				
					<div class="form-group">
						<div class="alert alert-warning">
							<p>
								Fitur ini digunakan untuk merubah hak akses user
							</p>
						</div>
						<label for="daftar-admin" >Daftar Akun</label>
							<div id = "admin_paging">
		    			
		    				</div>
					</div>

			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#pengaturan-accordion' href="#pengaturan3">Ubah Password</a>
				</h4>
			</div>
		</div>

		<div id="pengaturan3" class="panel-collapse collapse">
			<div class="panel-body">
	
					<div class="form-group">
						<div class="alert alert-warning">
							<p>
								Berisi list user dan admin yang meminta reset password
							</p>
						</div>
						<label for="daftar-akun" >Daftar Akun</label>
						<div id = "pass_reset">
							
						</div>
					</div>
			</div>
		</div>
		<?php } ?>
		
	</div>
</div>

<script>
$(document).ready(function() {
	var $admin_paging = function (){
	    $('.admin-paging').click(function (){
		var $val =$(this).val();
		
		$("#admin_paging *" ).remove();
		var $target = '<?php echo base_url().'admin_pengaturan/permission_admin/';?>'+$val;
		$("#admin_paging" ).load($target,$admin_paging);
	});  
	}
	var $pass_reset = function (){
	    $('.pass-reset').click(function (){
		var $val =$(this).val();
		
		$("#pass_reset *" ).remove();
		var $target = '<?php echo base_url().'admin_pengaturan/permission_admin/';?>'+$val;
		$("#pass_reset" ).load($target,$pass_reset);
	});  
	}

	var $pesan = function (){
	    $('.unread').click(function (){
		var $val =$(this).val();
		
		$("#pesan *" ).remove();
		var $target = '<?php echo base_url().'admin_pengaturan/paginasi_unread/';?>'+$val;
		$("#pesan" ).load($target,$pesan);
	});  
	}

	$("#admin_paging" ).load( "<?php echo base_url().'admin_pengaturan/permission_admin'; ?>",$admin_paging);
	$("#pass_reset" ).load( "<?php echo base_url().'admin_pengaturan/admin_ubah_password'; ?>",$pass_reset);
	$("#pesan" ).load( "<?php echo base_url().'admin_pengaturan/paginasi_unread'; ?>",$pesan);
});
</script>