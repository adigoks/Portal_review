jumlah baris maksimal 3 buah. jumlah kolom tiap barisnya maksimal 4 buah. <br>
halaman ini disimpan secara otomatis

<div id="layout_footer" class="col-md-12 layout layout-def">
	<input type="number" name="id[]" value='<?php echo $footer_parent->id;?>' hidden>
	<div>
	<b>FOOTER</b> 
	
	<button class='add-items' data-target='#footer' hidden>
		<span class="glyphicon glyphicon-plus-sign" ></span>
	</button>

	</div>
	<?php
		$i=1;
		foreach ($footer_data as $key ) {

		if($key->layout_parent == $footer_parent->id)
		{
			$j=1;
			?>
			<div id='footer-row-<?php echo $i;?>' class='col-md-12 layout footer-row' >
				<input type='number' name='id[]' value='<?php echo $key->id;?>' hidden>
				<input type='number' name='order[]' value='<?php echo $key->layout_order;?>' hidden>
				<div>
				<b><?php echo $key->layout_name;?></b>
				<button class='remove-item' data-target='#footer-row-<?php echo $i;?>' data-parent= '#layout_footer' >
				<span class='glyphicon glyphicon-remove-circle' ></span></button>
				<button class='add-items' data-target='#footer-row-<?php echo $i;?>'><span class='glyphicon glyphicon-plus-sign' ></span></button>
				</div>
			<?php
			foreach($footer_data as $key1)
			{
				if($key1->layout_parent == $key->id)
				{
					?>
					<div id="footer-column-<?php echo $j;?>" class="col-md-<?php echo $key1->layout_span;?> layout footer-column">
						<input type="number" name="id[]" value='<?php echo $key1->id;?>' hidden>
						<input type="number" name="parent[]" value='<?php echo $key1->layout_parent;?>' hidden>
						<input type="number" name="span[]" value='<?php echo $key1->layout_span;?>' hidden>
						<div>
							<b><?php echo $key1->layout_name;?></b>
							<button class='remove-item' data-target='#footer-column-<?php echo $j;?>' data-parent='footer-row-<?php echo $i;?>'>
								<span class='glyphicon glyphicon-remove-circle' ></span>
							</button>
							<button class='add-items' data-target='#footer-column-<?php echo $j;?>' >
								<span class='glyphicon glyphicon-plus-sign' ></span>
							</button>
						</div>
					</div>
					<?php
					$j++;
				}
			}
			

			?>	
			</div>
			<?php
			$i++;
		}
		}
	?>
	
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('#layout_footer > div > .add-items').click(function (){
		var target =$(this).attr('data-target');
		var count = $('.footer-row').length + 1;
		var arr = [];
		arr["layout_name"] = "Baris - "+count;
		arr["layout_parent"] = $("#layout_footer > [name='id[]']").val();
		arr["layout_span"] = 12;
		var i = 1;
		$(".footer-row > [name='order[]']").each(function(){
			$(".footer-row > [name='order[]']").val(i);
			i++
		});
		arr['layout_order'] = i; 
		var id;
		addFooter(arr,function(e){
			id = e;
			console.log(id);
			var node = "<div id='footer-row-"+count+"' class='col-md-12 layout footer-row' >"+
						"<input type='number' name='id[]' value='"+id+"' hidden>"+
						"<input type='number' name='order[]' value='"+arr['layout_order']+"' hidden>"+
					"<div><b>Baris - "+count+"</b><button class='remove-item' data-target='#footer-row-"+count+"' data-parent= '#layout_footer' >" +
					"<span class='glyphicon glyphicon-remove-circle' ></span></button><button class='add-items' data-target='#footer-row-"+count+"'><span class='glyphicon glyphicon-plus-sign' ></span></button></div></div>";
			$('#layout_footer').append(node);
			if($('.footer-row').length >= 3)
			{
				$(this).css('display', 'none');
			}
			return false;
		});
		
	});

	$('.footer-row > div > .remove-item').click(function(){
		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');
		$(target).remove();
		$(parent+' > div > .add-items').css('display','block');
		var i = 1;
		$(parent+' > footer-row').each(function(){
			$(this).attr('id',''+i);
			$(this+' > div > ');
			i++
		});
		return false;
	});

	$('.footer-row > div > .add-items').click(function(){
		var target = $(this).attr('data-target');
		var precount = $(target+" .footer-column").length ;
		var count = $(target+" .footer-column").length + 1;
		var size = 12 / count;

		if (count > 1)
		{
			var presize = 12/precount;
			$(target+' .footer-column').each(function(){
				$(this).removeClass('col-md-'+presize);
				$(this).addClass('col-md-'+size);
			})
		}
		var node = '<div id="footer-column-'+count+'"class="col-md-'+size+' layout footer-column">'+
			"<div>"+
				"<b>Column-"+count+"</b> "+
				"<button class='remove-item' data-target='#footer-column-"+count+"' data-parent='"+target+"'>"+
					"<span class='glyphicon glyphicon-remove-circle' ></span>"+
				"</button>"+
				"<button class='add-items' data-target='#footer-column-"+count+"' >"+
					"<span class='glyphicon glyphicon-plus-sign' ></span>"+
				"</button>"+
			"</div>"+
		"</div>";
		$(target).append(node);

		return false;
	});

	if($('.footer-row').length >= 3)
	{
		console.log('oh');
		$('#layout_footer > div > .add-items').css('display', 'none');
	}else{
		console.log('aoh');
		$('#layout_footer > div > .add-items').css('display', 'block');
	}

})


$(document).bind('DOMSubtreeModified', function () {
   $('.footer-row > div > .remove-item').off().click(function(){
		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');
		$(target).remove();
		$(parent+' > div > .add-items').css('display','block');
		var i = 1;
		$(parent+' > .footer-row').each(function(){
			$(this).attr('id','footer-row-'+i);
			i++;
		});
		i=1;
		$(parent+' > .footer-row > div > b').each(function(){
			$(this).html('Baris - '+i);
			i++;
		});
		i=0;
		p=0;
		$(parent+' > .footer-row > div > button').each(function(){
			if(i%2 == 0)
			{
				p++;
				$(this).attr('data-target', '#footer-row-'+p);
			}else{
				$(this).attr('data-target', '#footer-row-'+p);
			}
			
			i++;
			
		})
		return false;
	});

   	$('.footer-column > div > .remove-item').off().click(function(){
		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');
		var precount = $(parent+' .footer-column').length;
		var count = $(parent+' .footer-column').length - 1;
		var size;
		$(target).remove();
		$(parent+' > div > .add-items').css('display','block');
		if(count > 0)
		{
			size = 12/count;
			$(parent+' .footer-column').each(function(){
				$(this).removeClass();
				$(this).addClass('col-md-'+size+' layout footer-column');
			});
		}
		console.log('ou');
		


	});

	$('.footer-row > div > .add-items').off().click(function(){
		var target = $(this).attr('data-target');
		var precount = $(target+" .footer-column").length ;
		var count = $(target+" .footer-column").length + 1;
		var size = 12 / count;
		if (count > 1)
		{
			var presize = 12/precount;
			$(target+' .footer-column').each(function(){
				$(this).removeClass();
				$(this).addClass('col-md-'+size+' layout footer-column');
			})
			$(target+" .footer-column [name='span[]']").each(function(){
				
				$(this).val(size);
			})
		}
		var arr = [];
		arr["layout_name"] = "Column - "+count;
		arr["layout_parent"] = $(target+" > [name='id[]']").val();
		console.log(arr["layout_parent"]);
		arr["layout_span"] = size;
		var i = 1;
		$(target+" > .footer-column > [name='order[]']").each(function(){
			$(target+" > .footer-column > [name='order[]']").val(i);
			i++
		});
		arr['layout_order'] = i; 
		var id;
		id = addFooter(arr,function(e){
			id=e;
			var node = '<div id="footer-column-'+count+'"class="col-md-'+size+' layout footer-column">'+
				"<input type='number' name='id[]' value='"+id+"' hidden>"+
				"<input type='number' name='parent[]' value='"+arr["layout_parent"]+"' hidden>"+
				"<input type='number' name='span[]' value='"+arr["layout_span"]+"' hidden>"+
				"<div>"+
					"<b>Column-"+count+"</b> "+
					"<button class='remove-item' data-target='#footer-column-"+count+"' data-parent='"+target+"'>"+
						"<span class='glyphicon glyphicon-remove-circle' ></span>"+
					"</button>"+
					"<button class='add-items' data-target='#footer-column-"+count+"'>"+
						"<span class='glyphicon glyphicon-plus-sign' ></span>"+
					"</button>"+
				"</div>"+
			"</div>";
			$(target).append(node);
			if(count >= 4)
			{
				$(this).css('display','none');
			}
			return false;
		});
		
		
	});
});

function addFooter (data , callback){
			
		var oData = new FormData();
		oData.append('layout_name', data['layout_name']);
		oData.append('layout_parent', data['layout_parent']);
		oData.append('layout_span', data['layout_span']);
		oData.append('layout_order', data['layout_order']);
		oData.append('layout_content', data['layout_content']);

	$.ajax({
		method :"POST", 
		url : "<?php echo base_url()."admin_layout/add_footer"; ?>", 
		data : oData,
		dataType : 'json',
		async :true ,
		processData: false,
		contentType: false,
		timeout: 120000,
		success : function (response){
			console.log(response);
			console.log(response.id_layout);
			var result = response;
			if (callback && typeof(callback) === "function") {
			  callback(result.id_layout);
			}
		},	
		error : function (response)
		{
			console.log(response.responseText);
		}
	});
	
}
	
</script>
