<div id="" class="container-fluid ">

		<div style="padding-top: 10px; padding-bottom: 10px">
		<?php if ($data->komen_parent == 0) { ?>
			<div class="thor col-md-1 col-md-offset-1">
			<?php if ($data->user_profile_img == NULL) { ?>
				<img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png">
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
				<div class="comment-isi" style="padding-bottom: 10px;">
					<?php echo $data->komen_isi; ?>
				</div>

				<?php if(isset($_SESSION['logged'])){ ?>
				<div  class="rp-comment reply_button" target="<?php echo $data->komentar_id; ?>"><a>Reply</a></div>
				<?php } ?>
				<div id="balas" class="c-reply">	
					<div id="<?php echo $data->komentar_id; ?>" class="comment-r">
					
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
										<div class="col-md-8 col-md-offset-1" style="padding-bottom: 20px; margin-left:3%;">
											<textarea class=" c-textarea2 form-control" id="komen-box" name="reply" placeholder="join the discusion"></textarea>
											<div class="c-submit2">
											<input class="btn btn-default" type="submit" name="balas" value="Balas"  />
											</div>
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