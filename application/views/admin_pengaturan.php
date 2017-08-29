<div style="display: flex;align-items: flex-end;">
	<div  style="margin-right: 10px">
		<h4>Pengaturan</h4><br/>
	</div>
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
				<?php echo form_open('admin_layout/set_identity', 'id="form_identity"'); ?>
					<div class="form-group">
						<label for="daftar-kategori">Daftar Kategori</label>
							<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama Kategori</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
							</div>
							<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama Kategori</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
							</div>
							<div  style="padding-bottom: 10px;" class="col-md-12">
								<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon'>Nama Kategori</span>
								<a class='btn btn-default col-md-1'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
								</a>
							</div>
					</div><br>
					<div class="form-group">
						<label for="tambah-kategori" >Tambah Kategori</label>
						<input class="form-control" type="text" id="tambah-kategori" name="tambah_kategori" placeholder="Nama Kategori" >
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
				<?php echo form_open('admin_layout/set_identity', 'id="form_identity"'); ?>
					<div class="form-group">
						<label for="daftar-admin" >Daftar Admin</label>
						<?php $this->load->view('paginasi_admin'); ?>
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