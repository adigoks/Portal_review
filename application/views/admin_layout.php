<?php 
		$target = '';
		$default = 'admin-dashboard/layout';
?>
<div style="display: flex;align-items: flex-end;">
	<div  style="margin-right: 10px">
		<h4>LAYOUT</h4>
	</div>
	<div style='margin-bottom: 10px'>
		
		<a href="<?php echo base_url().'admin_preview/?default='.$default.'&target='.$target;?>" >tinjau situs</a>
		
		
	</div>
</div>
<div id='document' class="col-md-12 layout layout-doc">
	<b>Document</b> 
	
	<div id='header-layout' class="col-md-12 layout layout-def">
		<div><b>HEADER</b> 
			
		</div> 
		<div id='header-title' class="col-md-6 layout layout-def">
			<b>TITLE</b> 
			<a href="">
				<span class="glyphicon glyphicon-edit" style="float: right;"></span>
			</a>
		</div>
		<div id='header-menu' class="col-md-6 layout layout-def" >
			<b>MENU</b> 
			<a href="">
				<span class="glyphicon glyphicon-edit" style="float: right;"></span>
			</a>
		</div>
	</div>
	<div id='content-layout' class="col-md-12 layout layout-def">
		<div><b>KONTEN</b> 
			
		</div>
		<div id='content-featured' class="col-md-12 layout layout-def">
			<a href="">
				<b>FEATURED VIEW</b> <span class="glyphicon glyphicon-edit" style="float: right;"></span>
			</a>
		</div>
		<div id='content-main' class="col-md-8 layout layout-def">
			<b>MAIN KONTEN</b> 
			<a href="">
				<span class="glyphicon glyphicon-edit" style="float: right;"></span>
			</a>
		</div>
		<div id='content-widget' class="col-md-4 layout layout-def">
			<b>WIDGET</b>
			<a href=""> 
				<span class="glyphicon glyphicon-edit" style="float: right;"></span>
			</a>
		</div>
	</div>
	<div id='footer-layout' class="col-md-12 layout layout-def">
	<b>FOOTER</b> 
	<a href="layout/footer"> 
		<span class="glyphicon glyphicon-edit" style="float: right;"></span>
	</a>
		
	</div>

</div>

