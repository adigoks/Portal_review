<body >
<?php if(!is_null($identitas)){
			$attr = json_decode($identitas->attribute_values); 
			$judul = $attr->judul;
			$img = base_url(). $attr->logo;
		}else
		{
			$judul = 'example';
		}
?>
<div id="header" class="row" style="margin: 0">
	<div class="logo-menu">
		<div class="col-md-5 med-5">
			<!-- ++++++++++++++++++++++++++++++++++++++++++++++ -->
			<!-- title ini bisa di ubah di bagian tema/tampilan -->
			
			<div style="display: flex;align-items: center;">
				<a href="<?php echo base_url();?>">
				<div style="display: flex;align-items: center;">
				<?php if(isset($img))
				{?>
				<div style="height: 50px;width: 50px;border-radius:10px;overflow: hidden;">
					<img class='logo' src="<?php echo $img;?>">
				</div><?php
				}
				?>
				<div style="margin-left: 5px;">
					<h2>
						<?php echo $judul;?>
					</h2>
				</div>
				</div>
				</a>
			</div>
			<!-- ++++++++++++++++++++++++++++++++++++++++++++++ -->
		</div>
		<div id="menu-bar" class="col-md-7 med-7">
			<div id="menu">
				<ul class="menu">
					<?php foreach ($menu as $list) { if ($list['menu_parent']== 0) { ?>
						<li><div class="menu_utama"><a href="#"><h4><?php echo $list['menu_name']; ?></h4></a></div>
					<?php } ?>
						<ul class="dropdown_list">
							<?php foreach ($menu as $list1) { if ($list['id'] == $list1['menu_parent']) { ?>
								<li><a href="#"><h4><?php echo $list1['menu_name']; ?></h4></a></li>								
							<?php } ?>
							<?php } ?>						
						</ul>
						</li>
					<?php } ?>

					<li class="more"><center><a data-toggle="collapse" href="#top-expand"><span class="glyphicon glyphicon-triangle-bottom"></span></a></center></li>
				</ul>
			</div>
			<div id="mh" class="mhc">
				<a><h3>MENU</h3></a>
			</div>
		</div>
	</div>
	<div id="top-expand" class="col-md-12 collapse">
		
			<div id="top-bar" style="font-size: 14px;">
				<div style="display: flex;width: 100%;">
					<div class="col-md-9 med-9">
						<div class="input-group ">
							
							<input type="text" class='form-control' id="search" name="search" placeholder="cari..." style="box-shadow: none;">
							<span class="input-group-btn">
								<button type="submit" name="" class="btn btn-default" style="border-left-style: none;box-shadow: none; " >
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</span>
						</div>	
					</div>
					<div class="col-md-3 med-3" >
						<div class="log-req">
						<?php if ($this->session->userdata('logged') == FALSE) { ?>
							<a href="<?php echo site_url('page/form_login'); ?>">Masuk</a> atau <a href="<?php echo site_url('page/form_daftar'); ?>">daftar...</a> 
						<?php } else { ?>
							<a href="<?php echo site_url('page/form_profile'); ?>"><?php echo $this->session->userdata('username'); ?></a>   <a href="<?php echo site_url('page/logout'); ?>">Logout</a>
							<?php } ?>		
						</div>
						<div>
							<a class="log-btn" href="#"><span class="glyphicon glyphicon-log-in"></span></a>
						</div>
					</div>
				</div>	
			</div>
		
	</div>

	
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		if(window.innerWidth < 500){
			$('#menu').hide();
			$('#mh').show();
		}
		else{
			$('#menu').show();
		}
		$('#mh').click(function() {
			$('#menu').slideToggle();
			
			});
	});
</script>

