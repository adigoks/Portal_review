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
						<label for="daftar-kategori" >Daftar Kategori</label>
							<div class="col-md-3">
								<span style='width:22%;font-size: 16px;' class=' input-group-addon'>Nama Kategori</span>
							</div>
						<span style='font-size: 16px;' class=' input-group-btn '>
							<a class='btn btn-default input-group-btn'>
								<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>						
							</a>
						</span>
					</div>
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
					</div>
					<div class="form-group">
						<label for="tambah-User" >Daftar User</label>
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
						<label for="pesan-masuk" >Pesan Masuk</label>
					</div>
					<div class="form-group">
						<label for="pesan-keluar" >Pesan Keluar</label>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>