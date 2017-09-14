<div id="commment">
		<div>
			<div style="padding-top: 20px;">
				<fieldset>
					<div class="form-horizontal cold-md-5">
						<div class="thor col-md-1">
							<img class="f-img" src="<?php echo base_url();?>image/default/blank-profile.png">
						</div>
						<div class="col-md-8 text-comment" style="padding-bottom: 20px">
							<textarea class=" c-textarea form-control" name="komen_box" form="komen-box" placeholder="join the discusion"></textarea>
							<div class="c-submit">
							<input class="btn btn-default" type="submit" name="komen" value="Enter" data-toggle="modal" data-target="#comment-modal"  />
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
</div>

<div id="comment-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h4>Silahkan Login untuk komentar !</h4>
			</div>
			<div class="modal-footer">
				<a href="<?php echo site_url('page/form_login'); ?>"><input type="submit" value="Login" class="btn btn-primary"></input></a>
			</div>
		</div>
	</div>
</div>