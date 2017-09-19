<div id="" class="container-fluid ">

		<div style="padding-top: 10px; padding-bottom: 10px">
		<?php if ($data->komen_parent == 0) { ?>
			<div class="thor col-md-1 col-md-offset-1">
			<?php if ($data->user_profile_img == NULL) { ?>
				<img class="f-img" src="<?php echo base_url();?>image/default/blank-profile.png">
			<?php }else{ ?>
				<img class="f-img" src="<?php echo base_url().'image/user_profil/'.$data->user_profile_img; ?>">
			<?php } ?>
				
			</div>
			<div class="col-md-10" style="padding-bottom: 20px;">
			<div class="user-com" >
				<h5><b><?php echo $data->user_name;?> &#8226;&nbsp;</b></h5> 
			</div>
			<div>
				<h5><?php $date=$data->komen_waktu; echo date("d - F - Y, l H:i:s",strtotime($date)); ?></h5>
			</div>
			<div>
				<a class="close col-md-6" href="<?php echo base_url().'admin-dashboard/post/komentar/delete/'.$data->komentar_id;?>" onclick="return popups();">&times;</a>
			</div>
				<div class="comment-isi" style="padding-bottom: 10px;">
					<?php echo $data->komen_isi; ?>
				</div>

				<?php if(isset($_SESSION['logged'])){ ?>
				
				<?php } ?>
				
					<?php }  ?>

					<?php if (isset($balas) || $data->komentar_id == $balas->komen_parent) {
					 foreach ($balas as $data2) {
					 	if ($data2->komen_parent == $data->komentar_id) { ?>
					 
							<div id="coment-rp">
								<div class="thor col-md-1">
									<?php if ($data2->user_profile_img == NULL) { ?>
										<img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png">
									<?php }else{ ?>
										<img class="f-img" src="<?php echo base_url().'image/user_profil/'.$data2->user_profile_img; ?>">
									<?php } ?>
								</div>
								<div class="col-md-10 col-md-offset-1" style="padding-bottom: 20px; margin-left: 3%;">
								<div class="user-com" >
									<h5><b><?php echo $data2->user_name; ?> &#8226;&nbsp;</b></h5> 
								</div>
								<div>
									<h5><?php $date=$data->komen_waktu; echo date("d - F - Y, l H:i:s",strtotime($date)); ?></h5>
								</div>
								<div>
									<a class="close col-md-6" href="<?php echo base_url().'admin-dashboard/post/komentar/delete/'.$data2->komentar_id; ?>" onclick="return popups();" >&times;</a>
								</div>
									<div class="comment-isi">
										<?php echo $data2->komen_isi; ?>
									</div>
								</div>
							</div>
					<?php } }} ?>

				</div>	
			</div>
		</div>
</div>
<script>
	function popups(){
		q=confirm("Apakah anda yakin ingin menghapus komentar ini?");
		if( q!= true)
		{
				return false;
		}
	}
</script>