
<div id="menu_config">
	</br>
	<?php
		if(!empty($list))
		{
			$i =0;
			$j=0;
			{?>
			<form id='form-menu-config' action="<?php echo site_url('admin-dashboard/menu/update_menu'); ?>" method='post'>
			<ul id="parent-menu">
			<?php
			foreach ($list as $key) {
				
				$id = $key['id'];
				if($key['menu_parent'] == 0)
				
					echo "	
							<li id='menu-$key[menu_name]' >
							<button form=''class='btn btn-default view-sub' target='sub-menu-$key[menu_name]'>click</button>
							<button form=''class='btn btn-default view-parent' target='sub-menu-$key[menu_name]' style='display:none'>clicka</button>
							<input type='number' class='id-menu' name='menu[$i][id]' value='$key[id]' hidden>
							<input type='number' class='order-menu' name='menu[$i][order]' value='$key[menu_order]' hidden>
							$key[menu_name]
							<button form='form-menu-config' type='submit' name='hapus' value='$key[id]'> hapus </button>
							<ul id='sub-menu-$key[menu_name]'>"; 
					$parent = $key['menu_name'];
					foreach ($list as $key1) {
						if($key1['menu_parent'] == $id)
						{
							$j++;
							echo "	<li id='sub-$parent-$key1[menu_name]'class='sub-menu config'>
							<input type='number' class='id-submenu' name='submenu[$j][id]' value='$key1[id]' hidden>
							<input type='number' class='order-submenu' name='submenu[$j][order]' value='$key1[menu_order]' hidden>
							$key1[menu_name];
							<button form='form-menu-config' type='submit' name='hapus' value='$key1[id]'> hapus </button>
							</li>

							";
						}	
					}
					echo "</ul></li>";
					$i++;
				}
			}
			?>
			</ul>
			<button form='form-menu-config' type='submit' name='simpan' value='save'> simpan </button>
			</form>
			<?php
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
		$(".view-parent[target="+$target+"]").css("display","inline");
		
		
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
		$(".view-sub[target="+$target+"]").css("display","inline");
		
		

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
</div>