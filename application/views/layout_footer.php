jumlah baris maksimal 3 buah. jumlah kolom tiap barisnya maksimal 4 buah 
<div id="layout_footer" class="col-md-12 layout layout-def">
	<div>
	<b>FOOTER</b> 
	<button class='add-items' data-target='#footer'>
		<span class="glyphicon glyphicon-plus-sign" ></span>
	</button>

	</div>
	
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#layout_footer > div > .add-items').click(function (){
		var target =$(this).attr('data-target');
		var count = $('.footer-row').length + 1;
		var node = "<div id='footer-row-"+count+"' class='col-md-12 layout footer-row' ><div><b>Baris - "+count+"</b><button class='remove-item' data-target='#footer-row-"+count+"' data-parent='#layout_footer' >"+
				"<span class='glyphicon glyphicon-remove-circle' ></span></button><button class='add-items' data-target='#footer-row-"+count+"'><span class='glyphicon glyphicon-plus-sign' ></span></button></div></div>";
		$('#layout_footer').append(node);
		if($('.footer-row').length >= 3)
		{
			$(this).css('display', 'none');
		}
		return false;
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
			i++
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
		}
		var node = '<div id="footer-column-'+count+'"class="col-md-'+size+' layout footer-column">'+
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
	
</script>
