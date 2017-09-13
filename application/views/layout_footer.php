
<div class="col-md-6">jumlah baris maksimal 3 buah. jumlah kolom tiap barisnya maksimal 4 buah. <br>
halaman ini disimpan secara otomatis</div>
<div class="col-md-6">
	<div id='option-box' class="col-md-12">
		
	</div>
</div>

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
			<div id='footer-row-<?php echo $key->id;?>' class='col-md-12 layout footer-row' >
				<input class='row-id' type='text' name='id[]' value='<?php echo $key->id;?>' hidden>
				<input class='row-order' type='text' name='order[]' value='<?php echo $key->layout_order;?>' hidden>
				<div>
				<b><?php echo $key->layout_name;?></b>
				<button class='remove-item' data-target='#footer-row-<?php echo $key->id;?>' data-parent= '#layout_footer' >
				<span class='glyphicon glyphicon-remove-circle' ></span></button>
				<button class='add-items' data-target='#footer-row-<?php echo $key->id;?>' hidden><span class='glyphicon glyphicon-plus-sign' ></span></button>
				</div>
			<?php
			foreach($footer_data as $key1)
			{
				if($key1->layout_parent == $key->id)
				{
					?>
					<div id="footer-column-<?php echo $key1->id;?>" class="col-md-<?php echo $key1->layout_span;?> layout footer-column">
						<input class='column-id' type='text' name="id[]" value='<?php echo $key1->id;?>' hidden>
						<input class='column-parent' type='text' name='parent[]' value='<?php echo $key1->layout_parent;?>' hidden>
						<input class='column-span' type='text' name="span[]" value='<?php echo $key1->layout_span;?>' hidden>
						<input class='column-order' type='text' name='order[]' value='<?php echo $key1->layout_order;?>' hidden>
						<div>
							<b><?php echo $key1->layout_name;?></b>
							<button class='remove-item' data-target='#footer-column-<?php echo $key1->id;?>' data-parent='#footer-row-<?php echo $key->id;?>'>
								<span class='glyphicon glyphicon-remove-circle' ></span>
							</button>
							<button class='add-items' data-target='#footer-column-<?php echo $key1->id;?>' >
								<span class='glyphicon glyphicon-plus-sign' ></span>
							</button>
						</div>
						<?php
							$obj = json_decode($key1->layout_content);
							
							for ($l=0; $l < count($obj) ; $l++) { 
								$m= $l+1;
								?>
								<div id="column-data-<?php echo $key1->id.'-'.$m;?>" class='col-md-12 layout column-data'>
									<input class='data-text' name='text[]' value="<?php echo $obj[$l]->text;?>" hidden>
									<input class='data-link' name='link[]' value='' hidden>
									<div>
									<b><?php echo $obj[$l]->text;?></b> 
									<button class='remove-item' data-target="#column-data-<?php echo $key1->id.'-'.$m;?>" data-parent="#footer-column-<?php echo $key1->id;?>">
										<span class='glyphicon glyphicon-remove-circle' ></span>
									</button>
									</div>
								</div>
								<?php
							}
						?>
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
	if($('.footer-row').length >= 3)
	{
		$('#layout_footer > div > .add-items').css('display', 'none');
	}else{
		$('#layout_footer > div > .add-items').css('display', 'block');
	}
	
	$('.footer-row').each(function(){
		var ini = $(this).children('div');
		
		if($(this).children('.footer-column').length >= 4)
		{
			ini.children('.add-items').css('display', 'none');
		}else{
			ini.children('.add-items').css('display', 'block');
		}
	});

	$('.footer-column').each(function(){
		var ini = $(this).children('div');
		if($(this).children('.column-data').length >= 6)
		{
			ini.children('.add-items').css('display', 'none');
		}else{
			ini.children('.add-items').css('display', 'block');
		}
	})

})


$(document).bind('DOMSubtreeModified', function () {

	$('#layout_footer > div > .add-items').off().click(function (){
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
			var node = "<div id='footer-row-"+id+"' class='col-md-12 layout footer-row' >"+
						"<input class='row-id' type='text' name='id[]' value='"+id+"' hidden>"+
						"<input class='row-order' type='text' name='order[]' value='"+arr['layout_order']+"' hidden>"+
					"<div><b>Baris - "+count+"</b><button class='remove-item' data-target='#footer-row-"+id+"' data-parent= '#layout_footer' >" +
					"<span class='glyphicon glyphicon-remove-circle' ></span></button><button class='add-items' data-target='#footer-row-"+id+"'><span class='glyphicon glyphicon-plus-sign' ></span></button></div></div>";
			$('#layout_footer').append(node);
			if($('.footer-row').length >= 3)
			{
				$(this).css('display', 'none');
			}
			return false;
		});
		
	});

	$('.footer-row > div > .add-items').off().click(function(){
		$(this).prop('disabled',true);
		var target = $(this).attr('data-target');
		var precount = $(target+" .footer-column").length ;
		var count = $(target+" .footer-column").length + 1;
		var ini = $(this);
		var size = 12 / count;
		var data =[];
		data['layout_id'] = [];
		data['layout_span'] = [];
		data['layout_order'] = [];
		var j=0;
		if (count > 1)
		{
			var presize = 12/precount;
			$(target+' .footer-column').each(function(){
				
				$(this).removeClass();
				$(this).addClass('col-md-'+size+' layout footer-column');
				
				$(this).children('.column-span').attr('value',size);
				data['layout_id'][j] = $(this).children('.column-id').val();
				data['layout_span'][j] = $(this).children('.column-span').val();
				data['layout_order'][j] = $(this).children('.column-order').val();

				j++;
			});
			
		}
		var arr = [];
		arr["layout_name"] = "Column - "+count;
		arr["layout_parent"] = $(target+" > [name='id[]']").val();
		
		arr["layout_span"] = size;
		var i = 1;
		$(target+" > .footer-column > [name='order[]']").each(function(){
			$(target+" > .footer-column > [name='order[]']").attr('value',i);
			i++
		});
		arr['layout_order'] = i; 
		var id;
		if(count > 1)
		{
			updateFooter(data, addFooter(arr,function(e){
				$(target+' .footer-column').each(function(){
				
					$(this).removeClass();
					$(this).addClass('col-md-'+size+' layout footer-column');
				});
				id=e;
				var node = '<div id="footer-column-'+id+'"class="col-md-'+size+' layout footer-column">'+
					"<input class='column-id' type='text' name='id[]' value='"+id+"' hidden>"+
					"<input class='column-parent' type='text' name='parent[]' value='"+arr["layout_parent"]+"' hidden>"+
					"<input class='column-span' type='text' name='span[]' value='"+arr["layout_span"]+"' hidden>"+
					"<input class='column-order' type='text' name='order[]' value='"+arr['layout_order']+"' hidden>"+
					"<div>"+
						"<b>Column-"+count+"</b> "+
						"<button class='remove-item' data-target='#footer-column-"+arr["layout_parent"]+'-'+count+"' data-parent='"+target+"'>"+
							"<span class='glyphicon glyphicon-remove-circle' ></span>"+
						"</button>"+
						"<button class='add-items' data-target='#footer-column-"+arr["layout_parent"]+'-'+count+"'>"+
							"<span class='glyphicon glyphicon-plus-sign' ></span>"+
						"</button>"+
					"</div>"+
				"</div>";
				
				$(target).append(node);
				if(count >= 4)
				{
					ini.css('display','none');
				}
				ini.removeAttr('disabled');
				return false;
			}));
		}else{
			addFooter(arr,function(e){
				$(target+' .footer-column').each(function(){
				
					$(this).removeClass();
					$(this).addClass('col-md-'+size+' layout footer-column');
				});
				id=e;
				var node = '<div id="footer-column-'+id+'" class="col-md-'+size+' layout footer-column">'+
					"<input class='column-id' type='text' name='id[]' value='"+id+"' hidden>"+
					"<input class='column-parent' type='text' name='parent[]' value='"+arr["layout_parent"]+"' hidden>"+
					"<input class='column-span' type='text' name='span[]' value='"+arr["layout_span"]+"' hidden>"+
					"<input class='column-order' type='text' name='order[]' value='"+arr['layout_order']+"' hidden>"+
					"<div>"+
						"<b>Column-"+count+"</b> "+
						"<button class='remove-item' data-target='#footer-column-"+arr["layout_parent"]+'-'+count+"' data-parent='"+target+"'>"+
							"<span class='glyphicon glyphicon-remove-circle' ></span>"+
						"</button>"+
						"<button class='add-items' data-target='#footer-column-"+arr["layout_parent"]+'-'+count+"'>"+
							"<span class='glyphicon glyphicon-plus-sign' ></span>"+
						"</button>"+
					"</div>"+
				"</div>";
				
				$(target).append(node);
				if(count >= 4)
				{
					ini.css('display','none');
				}
				ini.removeAttr('disabled');
				return false;
			});
		}
		
	});

	$('.footer-column > div > .add-items').off().click(function(){
		$(this).prop('disabled',true);
		var ini = $(this);
		var target = $(this).attr('data-target');
		var count = $(target+" .column-data").length + 1;
		var parent = $(target+' > .column-id').val();
		var data = [];
		data['layout_id'] = [];
		data['layout_content'] = [];
		var node = "<div id='column-data-"+parent+"-"+count+"'class='col-md-12 layout column-data'>"+
						"<input class='data-text' name='text[]' value='data - "+count+"' hidden>"+
						"<input class='data-link' name='link[]' value=''hidden>"+
						"<div>"+
						"<b>data - "+count+"</b> "+
						"<button class='remove-item' data-target='#column-data-"+parent+"-"+count+"' data-parent='"+target+"'>"+
							"<span class='glyphicon glyphicon-remove-circle' ></span>"+
						"</button>"+
						"</div>"+
					"</div>";
		$(target).append(node);
		data['layout_id'][0] = $(target+' > .column-id').attr('value');
		var i = 0;
		var obj = [];
		$(target+' > .column-data').each(function(){
			
			var text = $(this).children('.data-text').val();
			var link = $(this).children('.data-link').val();
			obj[i] = {"text":text, "link":link};
			
			i++;
		});
		data['layout_content'][0] = JSON.stringify(obj);
		console.log(data);
		updateFooter(data,function(){
			console.log($(target+' > .column-data').length);
			if($(target+' > .column-data').length >= 6){
				ini.css('display','none');
				ini.removeAttr('disabled');
			}else{
				ini.removeAttr('disabled');
			}
			return false;
		});
	});

	$('.footer-row > div > .remove-item').off().click(function(){
		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');
		var count = $(parent+' > .footer-row').length;
		var id = $(target+' > .row-id').val();
		var del_data = {layout_id:id};
		var up_data = [];
		up_data['layout_id'] = [];
		up_data['layout_order'] = [];
		$(target).remove();
		
		count = count - 1 ;
		$(parent+' > div > .add-items').css('display','block');
		var i = 0;
		
		if(count > 0)
		{
			$(parent+' > .footer-row').each(function(){
				j= i+1;
				$(this).children('.row-order').attr('value',j);
				
				up_data['layout_id'][i] = $(this).children('.row-id').val();
				up_data['layout_order'][i]= $(this).children('.row-order').val();
				
				i++;
				
			});
			delFooter(del_data,updateFooter(up_data, function(){
				
				return false;
			}));

		}else{
			delFooter(del_data,function(){
				return false;
			});
		}
		
	});

   	$('.column-data > div > .remove-item').off().click(function(){
   		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');
		var parent_id  = $(parent+' > .column-id').val();
		$(parent+' > div > .add-items').css('display', 'block');
		var i = 0;
		$(target).remove();
		$(parent+'> .column-data').each(function(){
			i++;
			$(this).attr('id', 'column-data-'+parent_id+'-'+i);
			$(this).children('div').children('.remove-item').attr('data-target', '#column-data-'+parent_id+'-'+i);
		});
		var data = [];
		data['layout_id'] = [];
		data['layout_content'] = [];
		data['layout_id'][0] = $(parent+' > .column-id').attr('value');
		console.log(data);
		i = 0;
		var obj = [];
		$(parent+' > .column-data').each(function(){
			
			var text = $(this).children('.data-text').val();
			var link = $(this).children('.data-link').val();
			obj[i] = {"text":text, "link":link};
			
			i++;
		});
		data['layout_content'][0] = JSON.stringify(obj);
		updateFooter(data,function(){
			return false;
		});

   	});

   	$('.footer-column > div > .remove-item').off().click(function(){
		var target = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');
		var precount = $(parent+' .footer-column').length;
		var count = $(parent+' .footer-column').length - 1;
		var size;
		var del_data = [];
		
		del_data['layout_id'] = $(target+' > .column-id').val();
		
		var up_data = [];
		up_data['layout_id'] = [];
		up_data['layout_order'] = [];
		up_data['layout_span'] = [];
		$(target).remove();
		var i=0;
		var j;
		$(parent+' > div > .add-items').css('display','block');
		if(count > 0)
		{
			size = 12/count;

			$(parent+' .footer-column').each(function(){
				j= i+1;
				$(this).children('.column-order').attr('value',j);
				$(this).children('.column-span').attr('value',size);
				up_data['layout_id'][i] = $(this).children('.column-id').val();
				up_data['layout_order'][i]= $(this).children('.column-order').val();
				up_data['layout_span'][i]= $(this).children('.column-span').val();
				i++;
				
			});
			delFooter(del_data,updateFooter(up_data, function(){
				$(parent+' .footer-column').each(function(){
					$(this).removeClass();
					$(this).addClass('col-md-'+size+' layout footer-column');
				});
				return false;
			}))
		}else{
			delFooter(del_data,function(){
				return false;
			});
		}
		console.log('ou');
		


	});

	$('.column-data').off().click(function(){
		var id = $(this).attr('id');
		var text = $(this).children('.data-text').val();
		$('.footer-column').each(function(){
			$(this).removeClass('layout-selected');
		});
		$('.column-data').each(function(){
			$(this).removeClass('layout-selected');
		});
		$(this).addClass('layout-selected');
		var node="<div class='form-inline thin-bottom-gap'>"+
					"<input type='hidden' id='option_target' value='#"+id+"'>"+
					"<div class='form-group'>"+
						"<label class='sr-only' for='option-text'>duh</label>"+
						"<input type='text' class='form-control' id='option-text' name='option-text' value='"+text+"' placeholder='text...'>"+
					"</div> "+
					"<div class='form-group'>"+
						"<label class='sr-only' for='option_tipe'>uh</label>"+
						"<Select class='form-control' id='option_tipe' name='option_tipe'>"+
							"<option value='none'>None</option>"+
							"<option value='external_link'>External Link</option>"+
							"<option value='post'>Post</option>"+
							"<option value='kategori'>Kategori</option>"+
							"<option value='tag'>tag</option>"+
							"<option value='page'>page</option>"+
						"</Select>"+
					"</div> "+
					"<div id='option-item' class='form-group'>"+
						"<label class='sr-only' for='option_link'>no</label>"+
						"<select class='form-control' id='option_link' name='option_link'></select>"+
					"</div> "+
				"</div>"+
				"<button type='submit' id='option_save' class='btn btn-primary' style='float:right'> simpan </button>";

		$('#option-box').html(node);
		return false;
	})

	$('.footer-column').off().click(function(){
		var id = $(this).attr('id');
		var text = $(this).children('div').children('b').text();
		$('.footer-column').each(function(){
			$(this).removeClass('layout-selected');
		});
		$('.column-data').each(function(){
			$(this).removeClass('layout-selected');

		});
		$(this).addClass('layout-selected');
		var node="<div class='form-inline thin-bottom-gap'>"+
					"<input type='hidden' id='option_target' value='#"+id+"'>"+
					"<div class='form-group'>"+
						"<label for='option-text'>Text </label> "+
						"<input type='text' class='form-control' id='option-text' name='option-text' value='"+text+"' placeholder='text...'>"+
					"</div> "+
					
				"</div>"+
				"<button type='submit' id='column_save' class='btn btn-primary' style='float:right'> simpan </button>";

		$('#option-box').html(node);
		return false;
	})

	$('#column_save').off().click(function(){
		var target = $('#option_target').val();
		
		var text = $('#option-text').val();
		var link =$('#option_link').val();
		
		$(target+' > div > b').html(text);
		var data = [];
		data['layout_id'] = [];
		data['layout_name'] = [];
		data['layout_id'][0] = $(target+' > .column-id').attr('value');
		
		data['layout_name'][0] = text;
		console.log(data);
		updateFooter(data,function(){
			return false;
		});
	})
	$('#option_save').off().click(function(){
		var target = $('#option_target').val();
		var parent = $(target).parent().attr('id');
		var text = $('#option-text').val();
		var link =$('#option_link').val();
		$(target+' .data-text').attr('value', text);
		$(target+' .data-link').attr('value', link);
		$(target+' > div > b').html(text);
		var data = [];
		data['layout_id'] = [];
		data['layout_content'] = [];
		data['layout_id'][0] = $('#'+parent+' > .column-id').attr('value');
		var i = 0;
		var obj = [];
		$('#'+parent+' > .column-data').each(function(){
			
			var text = $(this).children('.data-text').val();
			var link = $(this).children('.data-link').val();
			obj[i] = {"text":text, "link":link};
			
			i++;
		});
		data['layout_content'][0] = JSON.stringify(obj);
		console.log(data);
		updateFooter(data,function(){
			return false;
		});
	})

	$('#option_tipe').change(function(){
		var tipe = $(this).val();
		console.log(tipe);
		console.log('more');
		$('#option-item').load("<?php echo base_url()."admin_layout/option_list/"; ?>"+tipe, function(){return false;});
	})
	if($('.footer-row').length >= 3)
	{
		
		$('#layout_footer > div > .add-items').css('display', 'none');
	}else{
		
		$('#layout_footer > div > .add-items').css('display', 'block');
	}
	
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

function delFooter (data , callback){
			
		var oData = new FormData();
		oData.append('id', data['layout_id']);
		

	$.ajax({
		method :"POST", 
		url : "<?php echo base_url()."admin_layout/del_footer"; ?>", 
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

function updateFooter (data , callback){
			
		var oData = new FormData();
		var i;
		if(data['layout_id'] != null){
			for (i = 0; i < data['layout_id'].length; i++) {
				oData.append('id[]', data['layout_id'][i]);
			}
		}
		if(data['layout_name'] != null){
			for (i = 0; i < data['layout_name'].length; i++) {
				oData.append('layout_name[]', data['layout_name'][i]);
			}
		}
		if(data['layout_parent'] != null){
			for (i = 0; i < data['layout_parent'].length; i++) {
				oData.append('layout_parent[]', data['layout_parent'][i]);
			}
		}
		if(data['layout_span'] != null){
			for (i = 0; i < data['layout_span'].length; i++) {
				oData.append('layout_span[]', data['layout_span'][i]);
			}
		}
		if(data['layout_order'] != null){
			for (i = 0; i < data['layout_order'].length; i++) {
				oData.append('layout_order[]', data['layout_order'][i]);
			}
		}
		if(data['layout_content'] != null){
			for (var i = 0; i < data['layout_content'].length; i++) {
				oData.append('layout_content[]', data['layout_content'][i]);
			}
		}

		
		console.log(data);

	$.ajax({
		method :"POST", 
		url : "<?php echo base_url()."admin_layout/update_footer"; ?>", 
		data : oData,
		dataType : 'json',
		async :true ,
		processData: false,
		contentType: false,
		timeout: 120000,
		success : function (response){
			console.log(response);
			
			var result = response;
			if (callback && typeof(callback) === "function") {
			  callback( );
			}
		},	
		error : function (response)
		{
			console.log(response);
			console.log(response.responseText);
		}
	});
	
}
	
</script>
