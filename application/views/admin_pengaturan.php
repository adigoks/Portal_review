<div style="display: flex;align-items: flex-end;">
	<div  style="margin-right: 10px">
		<h4>Pengaturan</h4><br/>
	</div>
</div>

<div>
	<?php echo $this->session->flashdata('pesan'); ?>
</div>
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

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#pengaturan-accordion' href="#pengaturan2">Permission</a>
				</h4>
			</div>
		</div>

		<div id="pengaturan2" class="panel-collapse collapse">
			<div class="panel-body">
				
				<?php echo form_open('admin_pengaturan', 'id="form_identity"'); ?>
					<div class="form-group">
						<label for="daftar-admin" >Daftar Admin</label>
							<div id = "admin_paging">
		    			
		    				</div>
					</div>

					<div class="form-group">
						<label for="tambah-User" >Daftar User</label>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:85%;font-size: 19px;' class='col-md-10 input-group-addon'>Nama User</span>
								<select style="width: 15%;" class="form-control col-md-1">
									<option>user</option>
									<option>admin</option>
								</select>
						</div><div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:85%;font-size: 19px;' class='col-md-10 input-group-addon'>Nama User</span>
								<select style="width: 15%;" class="form-control col-md-1">
									<option>user</option>
									<option>admin</option>
								</select>
						</div>
					</div>
					<input style='float: right;' type="submit" class="btn btn-primary" name='update' value="Update">
				<?php echo form_close();?>
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
				<?php echo form_open('admin_layout/set_identity', 'id="form_identity"'); ?>
					<div class="form-group">
						<label for="daftar-akun" >Daftar Akun</label>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-edit'></span>						
								</a>
						</div>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-edit'></span>						
								</a>
						</div>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-edit'></span>						
								</a>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent='#pengaturan-accordion' href="#pengaturan4">Pesan</a>
				</h4>
			</div>
		</div>

		<div id="pengaturan4" class="panel-collapse collapse">
			<div class="panel-body">
				<?php echo form_open('admin_layout/set_identity', 'id="form_identity"'); ?>
					<div class="form-group">
						<label for="pesan-masuk">Pesan Belum Terbaca </label>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open' data-toggle="modal" data-target="#modalBaca"></span>	
								</a>
						</div>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open'  data-toggle="modal" data-target="#modalBaca"></span>	
								</a>
						</div>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open'  data-toggle="modal" data-target="#modalBaca"></span>	
								</a>
						</div>
					</div>
					<div class="form-group">
						<label for="pesan-keluar">Pesan Terbaca</label>

						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open'  data-toggle="modal" data-target="#modalBaca"></span>	
								</a>
						</div>
						<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:82%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama User</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-eye-open'  data-toggle="modal" data-target="#modalBaca"></span>	
								</a>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
		<div id="modalBaca" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
						<h4>Nama user</h4>
				</div>
				<div class="modal-body">
					<h6>Dari : eunha@gmail.com</h6>
					<p>isi pesan dan saran isi pesan dan saran isi pesan dan saran isi pesan dan saran isi pesan dan saran
					isi pesan dan saran isi pesan dan saranisi pesan dan saran</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>
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
	$("#admin_paging" ).load( "<?php echo base_url().'admin_pengaturan/permission_admin'; ?>",$admin_paging);
});
</script>