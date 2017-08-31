<div id="footer" class="col-md-12 container-fluid ">

<?php 

$id = $footer_parent->id;
$layout = $footer_data;

		foreach ($layout as $row) {

				if ($row->layout_parent == $id)
				{
					?>
					<div id='footer-row-<?php echo $row->layout_order;?>' class='col-md-<?php echo $row->layout_span;?>  footer-row'>

					<?php
					foreach ($layout as $column ) 
					{

						if($column->layout_parent == $row->id)
						{
							?>
						<div id="footer-column-<?php echo $column->id;?>" class='col-md-<?php echo $column->layout_span;?>  footer-column'>
							<h3><?php echo $column->layout_name;?></h3>
							<ul>
						<?php
							$obj = json_decode($column->layout_content);
							
							for ($i=0; $i < count($obj) ; $i++) { 
								$j= $i+1;
								?>
								<li><a href="<?php if($obj[$i]->link!=''){echo $obj[$i]->link;}?>"> <?php echo $obj[$i]->text;?> </a></li>
								<?php
							}
						?>
							</ul>
						</div>
							<?php
						}
					}

					?>
					</div>
					<?php
				}
				
			}
?>

	<!-- <div id="f1" class="footer-1 col-md-3">
		<h3>Section</h3>
		<ul>
			<li><a>Review</a></li>
			<li><a>Interview</a></li>
			<li><a>Deals</a></li>
			<li><a>Exclusive</a></li>
			<li><a>Video</a></li>
			<li><a>Entertaiment</a></li>
		</ul>
	</div>
	<div id="f2" class="footer-2 col-md-3">
		<h3>Topics</h3>
		<ul >
			<li><a>Hardware</a></li>
			<li><a>Gaming</a></li>
			<li><a>Mobile</a></li>
			<li><a>Software</a></li>
			<li><a>Web</a></li>
		</ul>
	</div>
	<div id="f3" class="footer-3 col-md-3">
		<h3>About Us</h3>
		<ul >
			<li><a>About</a></li>
			<li><a>Advertise</a></li>
			<li><a>Contact</a></li>
			<li><a>Tip Us</a></li>
			<li><a>Careers</a></li>
			<li><a>Terms of Use</a></li>
			<li><a>Privacy & Cookie Policy</a></li>
		</ul>
	</div>
	<div id="f4" class="footer-4 col-md-3">
		<h3>Follow Us</h3>
		<ul >
			<li><a>Facebook</a></li>
			<li><a>Twitter</a></li>
			<li><a>Youtube</a></li>
		</ul>
	</div>
	<div id="f5" class="footer-5">
			<p>
				<a>About</a> &bull;
				<a>Advertise</a> &bull;
				<a>Contact</a> &bull;
				<a>Tip Us</a>&bull;
				<a>Careers</a>
			</p>
			<p>	
				<a>Terms of Use</a>&bull;
				<a>Privacy & Cookie Policy</a>	
			</p>
			
	</div> -->
</div>

<script type="text/javascript">
	// $(document).ready(function(){
	// 	if(window.innerWidth < 500){
	// 		$('#f1').hide();
	// 		$('#f2').hide();
	// 		$('#f3').hide();
	// 		$('#f4').hide();
	// 		$('#f5').show();
	// 	}
	// 	else if(window.innerWidth < 769){
	// 		$('#f1').hide();
	// 		$('#f2').hide();
	// 		$('#f3').hide();
	// 		$('#f4').hide();
	// 		$('#f5').show();
	// 	}
	// 	else{
	// 		$('#f5').hide();
	// 	}
	// })
</script>