<div id="commment">
		<div>
			<div class="f-head-bord">
				<h4><b>commment</b></h4>
			</div>
			<div style="padding-top: 20px;">
				<fieldset>
					<div class="form-horizontal cold-md-5">
					<?php echo form_open('post/komentar', 'id="komen-box"'); ?>
						<div class="thor col-md-1">
						<?php if ($name_user->user_profile_img == NULL) { ?>
							<img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png">
						<?php }else{?>
							<img class="f-img" src="<?php echo base_url().'image/user_profil/'.$name_user->user_profile_img; ?>">
						<?php } ?>
							
						</div>
						<div class="col-md-8" style="padding-bottom: 20px">
							<textarea class=" c-textarea form-control" name="komen_box" form="komen-box" placeholder="join the discusion"></textarea>
							<input class="" type="submit" name="komen" value="Enter"  />
							<input type="hidden" name="post_id" value="<?php echo $post->id; ?>" />
							<input type="hidden" name="post_url" value="<?php echo $post->post_uri; ?>" />
						</div>
					<?php echo form_close(); ?>
					</div>
				</fieldset>
			</div>
		</div>
</div>