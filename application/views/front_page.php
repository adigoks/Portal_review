<div id="main" class="col-md-12 as act" >
	<div class="user-post h lead bg">
		<div class="text-page">
		<?php
			if($page != null){
			?>
			<h3><?php echo $page->page_judul;?></h3>
			<br><?php echo $page->page_isi;?><br>
			<?php
			}else{
			?>
			<h3>Halaman Tidak di Temukan</h3>
			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
			<?php
			}
			?>
		</div>
	</div>
</div>