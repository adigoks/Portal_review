<?php
	$target = '';
	$default = 'admin-dashboard/menu/sesuaikan';
?>
<div style="display: flex;align-items: flex-end;">
	<div  style="margin-right: 10px">
		<h4>SESUAIKAN URUTAN MENU ANDA</h4>
	</div>
	<div style='margin-bottom: 10px'>
		
		<a href="<?php echo base_url().'admin_preview/?default='.$default.'&target='.$target;?>" >tinjau situs</a>
		
		
	</div>
</div>
<div id="menu_config" class="col-md-6">
	</br>
	<?php
		if(!empty($list))
		{
			$i =0;
			$j=0;
			{?>
			
			<form id='form-menu-config' action="<?php echo site_url('admin-dashboard/menu/update_menu'); ?>" method='post'>
			
			<ul id="parent-menu" class="panel-group">
			
			<?php
			foreach ($list as $key) {
				
				$id = $key['id'];
				if($key['menu_parent'] == 0)
				
					echo "	
							<li id='menu-$key[menu_name]' class='panel panel-default'>
								<input type='number' class='id-menu' name='menu[$i][id]' value='$key[id]' hidden>
								<input type='number' class='order-menu' name='menu[$i][order]' value='$key[menu_order]' hidden>
								<div class='panel-heading'>
									<a data-toggle='collapse' data-parent='#parent-menu' href='#sub-menu-$key[menu_name]'>
										<button form='' class='btn btn-default view-sub' target='sub-menu-$key[menu_name]'>
											<span class='glyphicon glyphicon-triangle-bottom'></span>
										</button>
										<button form='' class='btn btn-default view-parent' target='sub-menu-$key[menu_name]' style='display:none'>
											<span class='glyphicon glyphicon-triangle-top'></span>
										</button>
									</a>
									
									$key[menu_name]
									<button class='btn btn-default' style='float:right' form='form-menu-config' type='submit' name='hapus' value='$key[id]'> hapus </button>
									<button class='btn btn-default' style='float:right' form='form-menu-config' type='submit' name='edit' value='$key[id]'> edit </button>
								</div>
								
									<ul id='sub-menu-$key[menu_name]' class='panel-collapse collapse'>";

					$parent = $key['menu_name'];
					foreach ($list as $key1) {
						if($key1['menu_parent'] == $id)
						{
							$j++;
							echo "	
									<li id='sub-$parent-$key1[menu_name]'class='sub-menu config'>
										<input type='number' class='id-submenu' name='submenu[$j][id]' value='$key1[id]' hidden>
										<input type='number' class='order-submenu' name='submenu[$j][order]' value='$key1[menu_order]' hidden>
										$key1[menu_name]
										<button class='btn btn-default' style='float:right' form='form-menu-config' type='submit' name='hapus' value='$key1[id]'> hapus </button>
										<button class='btn btn-default' style='float:right' form='form-menu-config' type='submit' name='edit' value='$key1[id]'> edit </button>
									</li>

							";
						}	
					}
					echo "			</ul>
								
							</li>";
					$i++;
				}
			}
			
			echo "
			
			
			</ul>
			<div class='form-group'>
				<input class='btn btn-primary' type='submit' name='simpan' value='save'> 
			</div>
			</form>
			
			</div>";
			
		}else{
			

		}
	?>
	<script type="text/javascript">

	$(".view-sub").click(function(){
		var $target = $(this).attr("target");

		$(".view-sub").each(function(){
			$(this).css('display','inline');
		});
		$(".view-parent").each(function(){
			$(this).css('display','none');
		});
		$(this).css("display","none");
		$(".view-parent[target='"+$target+"']").css("display","inline");
		
		
		$("#parent-menu li").each(function(){
			$(this).addClass('config');
		});

		$("#"+$target+" > li").each(function(){
			if($(this).hasClass('config'))
			{
				$(this).removeClass('config');
			}
		});    
		
		$("#parent-menu").sortable("destroy");

		var $i=0;
		var $orderelements = $('#'+$target+' > li > .order-submenu');
	    $( "#parent-menu" ).sortable({
	      revert: true,
	      items: "li:not(.config)",
	      update : function(event, ui){var $array = $( "#parent-menu" ).sortable('toArray'); $.each($array, function(index,value){var order = index+1; $('#'+value+' > .order-submenu').attr('value',order);})}
	    });
	});


	$(".view-parent").click(function(){
		var $target = $(this).attr("target");

		$(".view-sub").each(function(){
			$(this).css('display','inline');
		});
		$(".view-parent").each(function(){
			$(this).css('display','none');
		});

		$(this).css("display","none");

		$(".view-sub[target='"+$target+"']").css("display","inline");
		
		

		$("#parent-menu li").each(function(){
			$(this).addClass('config');
		});

		$("#parent-menu > li").each(function(){
			if($(this).hasClass('config'))
			{
				$(this).removeClass('config');
			}
		});
		
		$("#parent-menu").sortable("destroy");

		
		var $orderelements = $('#parent-menu > li > .order-menu');
	    $( "#parent-menu" ).sortable({
	      revert: true,
	      items: "li:not(.config)",
	      update : function(event, ui){var $array = $( "#parent-menu" ).sortable('toArray'); $.each($array, function(index,value){var order = index+1; $('#'+value+' > .order-menu').attr('value',order);})}
	    });
    
	});

	$( function() {
		
		

	    $( "#parent-menu" ).sortable({
	      revert: true,
	      items: "li:not(.config)",
	      update : function(event, ui){var $array = $( "#parent-menu" ).sortable('toArray'); $.each($array, function(index,value){var order = index+1; $('#'+value+' > .order-menu').attr('value',order);})}
	    });

     
    });
	</script>
