<div>
	<div class="f-head f-head-bord">
		<h6>Tags 
		<?php
			if($post->post_tag != ''){
				$arr = json_decode($post->post_tag);
				for($i=0;$i<count($arr);$i++)
				{
					$tag_uri = str_replace(' ', '-', $arr[$i]);
		?>
		<a href="<?php echo base_url().'tag/'.$tag_uri; ?>"><?php echo $arr[$i]; ?></a>
		<?php
				}
			}
		?>
		</h6>
		<h1><?php echo $post->post_judul; ?></h1>
		<div class=" thor col-md-1">
			<?php if ($post->post_img == '') { ?>
				<a><img class="f-img" src="<?php echo base_url();?>image/default/empty_image.png" ></a>
			<?php } else{?>
				<a><img class="f-img" src="<?php echo base_url().$post->user_profile_img;?>" ></a>
			<?php }?>
		</div>

		<div class="thor2">
			<div style="display: inline-block;">
				<h4>By <a href="<?php echo base_url().'post/author/'.$post->user_name; ?>"><?php echo $post->user_name; ?></a></h4>
				<h5><?php $date=$post->post_waktu; echo date("d/m/y",strtotime($date));?></h5>	
			</div>
			<div style="float: right">
				<h4><a href="<?php echo base_url().'kategori/'.str_replace(' ', '-', $post->post_kategori); ?>"><?php echo $post->post_kategori; ?></a></h4>
			</div>
		</div>
	</div>

	<div id="f-post">
		<div class="f-f-pad">
			<div id="f-con" class="featured-con">
				<?php if ($post->post_img == NULL) { ?>
					<img  src="<?php echo base_url();?>image/default/empty_image.png" >
				<?php } else{?>
					<img  src="<?php echo base_url().$post->post_img;?>" >
				<?php }?>
			</div>
		</div>
	</div>
	<div class="img-r par">
		<?php echo $post->post_isi;?>	
	</div>
	<div class="col-md-12 container-fluid">
	<div class="f-head-bord">
				<h4><b>commment</b></h4>
			</div>
	<?php if($post->post_enable_comment == 1){
		if (!isset($_SESSION['logged'])) {

			if (!isset($komentar) || $komentar->komen_post != NULL)
			$this->load->view('front_comment_off'); {?>
				<div id="komen_paging">
				</div>
				<!-- $this->load->view('paginasi_komen'); -->

			<?php }
		}
		else{	
			$this->load->view('front_comment');
			if (!isset($komentar) || $komentar->komen_post == NULL ) {?>
				<p>Jadilah yang pertama berkomentar di Artikel ini</p>

			<?php }else{ ?>
				<div id="komen_paging">
					
				</div>
				<!-- $this->load->view('paginasi_komen'); -->
			<?php }	
		}
	} ?>	
	</div>
</div>

<script>
$(document).ready(function() {
	var $komen_paging = function (){
	    $('.komen-paging').click(function (){
		var $val =$(this).val();
		
		var $target = '<?php echo base_url().'post/paging/';?>'+$val+'/'+'<?php echo $post->id;?>';
		$("#komen_paging" ).load($target,$komen_paging);
	});
	}
	console.log('aaaa');
	$("#komen_paging" ).load( "<?php echo base_url().'post/paging/1/'.$post->id;?>",$komen_paging);
});
</script>