<div id="" class="container-fluid">
		<div>
		<?php if ($data->komen_parent == 0) { ?>
			<div class="thor col-md-1 col-md-offset-1">
			<?php if ($data->user_profile_img == NULL) { ?>
				<img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png">
			<?php }else{ ?>
				<img class="f-img" src="<?php echo base_url().'image/user_profil/'.$data->user_profile_img; ?>">
			<?php } ?>
				
			</div>
			<div class="col-md-10" style="padding-bottom: 20px">
			<div class="user-com" >
				<h5><b><?php echo $data->user_name;?> &#8226;&nbsp;</b></h5> 
			</div>
			<div>
				<h5><?php $date=$data->komen_waktu; echo date("d - F - Y, l H:i:s",strtotime($date)); ?></h5>
			</div>
				<div class="comment-isi">
					<?php echo $data->komen_isi; ?>
				</div>

				<?php if(isset($_SESSION['logged'])){ ?>

				<div id="reply" class="rp-comment"><a>Reply</a></div>
				<?php }  ?>
				<div>	
					<?php $i=0; {
						if($i < 3){
							$i++; ?>
					<div id="<?php echo $i ?>" class="comment-r ">
					<?php }?>
						<div>
							<div style="padding-top: 20px;">
								<fieldset>
								<div class="form-horizontal cold-md-5">
									<?php echo form_open('post/balas', 'id="komen-box"'); ?>
										<div class="thor col-sm-1">
											<?php if (!isset($name_user) || $name_user->user_profile_img == NULL) { ?>
												<img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png">
											<?php }else{ ?>
												<img class="f-img" src="<?php echo base_url().'image/user_profil/'.$name_user->user_profile_img; ?>">
											<?php } ?>
										</div>
										<div class="col-md-8 col-md-offset-1" style="padding-bottom: 20px">
											<textarea class=" c-textarea form-control" id="komen-box" name="reply" placeholder="join the discusion"></textarea>
											<input class="" type="submit" name="balas" value="Balas"  />
											<input type="hidden" name="balas_id" value="<?php echo $data->komentar_id; ?>" />
											<input type="hidden" name="post_id" value="<?php echo $data_uri->id; ?>" />
											<input type="hidden" name="post_url" value="<?php echo $data_uri->post_uri; ?>" />
										</div>
									<?php echo form_close(); ?>
									</form>
								</div>
								</fieldset>
							</div>
						</div>
					</div>
					<?php }  ?>

					<?php if (isset($balas)) {
					 foreach ($balas as $data2) {
					 	if ($data2->komen_parent == $data->komentar_id) { ?>
					 
							<div id="coment-rp">
								<div class="thor col-md-1 col-md-offset-1">
									<?php if ($data2->user_profile_img == NULL) { ?>
										<img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png">
									<?php }else{ ?>
										<img class="f-img" src="<?php echo base_url().'image/user_profil/'.$data2->user_profile_img; ?>">
									<?php } ?>
								</div>
								<div class="col-md-10" style="padding-bottom: 20px">
								<div class="user-com" >
									<h5><b><?php echo $data2->user_name; ?> &#8226;&nbsp;</b></h5> 
								</div>
								<div>
									<h5><?php $date=$data2->komen_waktu; echo date("d - F - Y, l H:i:s",strtotime($date)); ?></h5>
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