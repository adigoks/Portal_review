$(document).ready(function(){

    var tag_counter =1;
    $('#add-tag').click(function(e){
        
        // e.stopImmediatePropagation();
        if($('#tag_post').val()!=''){
            console.log('oh');

            var val = $('#tag_post').val();
            val = val.replace(/[^a-zA-Z0-9 ]/g, "");
            $('#tag-col').append("<div class='tag-item' id='tag-item-"+tag_counter+"'><input  class='tag-value' type='text' name='tag_post[]' value='"+val+"' readonly><a class='remove-tag' href='' target='tag-item-"+tag_counter+"' ><span class='glyphicon glyphicon-remove-circle'></span></a></div>");
            $('#tag_post').val('');
            tag_counter++;
        }
        return false;
    });

    $('.tag-item a').click(function(e){
        // e.preventDefault();
        
        var selector = $(this).attr('target');
        console.log(selector);
        $('#'+selector).remove();
        return false;
    });

    $('#add-kategori').off().click(function(e){
        if($("[name='new-kategori']").val() != ''){
            var i = 1;
            $('.kategori-item').each(function(){
                $(this).attr('id', 'kategori-item-'+i);
                $(this).find('button').attr('target', '#kategori-item-'+i);
                i++;
            })
            var value = $("[name='new-kategori']").val();
            $('#kategori-list').append("<div id='kategori-item-"+i+"' style='padding-bottom: 10px;' class='col-md-12 kategori-item'>"+
                                    "<input type='text' name='kategori_value[]' value='"+value+"' hidden>"+
                                    "<span style='width:90%;font-size: 16px;' class='col-md-1 input-group-addon kategori-value'>"+value+"</span>"+
                                    "<button form='' class='btn btn-default col-md-1'  target='#kategori-item-"+i+"' name='tambah-kategori' value='simpan'>"+
                                    "<span style ='font-size: 16px;' class='glyphicon glyphicon-remove'></span>"+
                                    "</button>"+
                                "</div>");
            
        }
        return false;
        
    })

    $('.kategori-item > button').off().click(function(){
        var target = $(this).attr('target');
        $(target).remove();
        
        var i = 1;
        $('.kategori-item').each(function(){
            $(this).attr('id', 'kategori-item-'+i);
            $(this).find('button').attr('target', '#kategori-item-'+i);
            i++;
        });
        return false;
    })
})

$(document).bind('DOMSubtreeModified', function () {
   $('.tag-item a').click(function(e){
        // e.preventDefault();
        
        var selector = $(this).attr('target');
        console.log(selector);
        $('#'+selector).remove();
        return false;
    });

    $('.kategori-item > button').off().click(function(){
        var target = $(this).attr('target');
        $(target).remove();
        
        var i = 1;
        $('.kategori-item').each(function(){
            $(this).attr('id', 'kategori-item-'+i);
            $(this).find('button').attr('target', '#kategori-item-'+i);
            i++;
        });
        return false;
    })

});


$(window).on('load',function() {
    
    var url = document.location.toString();

     $( ".top-news-img" ).each( function() {
        
        var $div = $(this);
        var $container = $(".top-content");
        $div.width($container.width());
        $div.height($container.width() * 0.6);
    });

    $( ".top-news-img img" ).each( function() {
    var $img = $( this );
    
    var $container = $(".top-content");
    var $scale = $img.height()/$img.width();
    if($scale < 0.6 )
    {
        

        if($container.width()< $img.width())
        {
            
            $img.width($container.width());
                
        }
        
    }else
    {

        if(($container.width() * 0.6) < $img.height())
        {
            console.log('oiab');
            $img.height($container.width() * 0.6);
                
        }
        
    }
    });

    $("#f-post #f-con img").each(function() {
        var $img = $(this);
        var $container = $("#f-post");
        var $container2 = $("#f-con");

        var $img_height = $img.prop('naturalHeight');
        var $img_width = $img.prop('naturalWidth');
        var $con_width = $container.width();
        var $con_width2 = $container2.width();
        var $con_height = $container.height();
        var $con_height2 = $container2.height();

        if( $con_height2 < $img_height){
            $img.prop('naturalHeight');
            $img.width($container.width());
            console.log('yol'); 
            if ($img_height < $img_width){
                console.log('hai');
               $("#f-con").removeClass("featured-con");
               $("#f-con").addClass("featured-img");
               $img.width($container2.width());
               $img.height($container2.height());
            }               
        }
        else if ($img_height < $img_width){
               $("#f-con").removeClass("featured-con");
               $("#f-con").addClass("featured-img");
               $img.width($container.width());
               console.log('hai');
               $img.height($container2.height());
                console.log('hai');
            }                

    });

    $(".img-r img").each(function() {
        var $img = $(this);
        var $con = $(".img-r");

        var img_height = $img.prop('naturalHeight');
        var img_width = $img.prop('naturalWidth');
        var $con_width = $con.width();
        var $con_height = $con.height();
        if($con_width < img_width){
          
            $img.width($con.width());  
        } 
    });
    // $img.width( $img.width() * .5 );
    
    if (url.match('#')) {
        if( url.split('#')[1] != null){
            $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');    
        } 
    }else{}

    //Change hash for page-reload
    if( url.split('#')[1] != null){
        $('.nav-tabs a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
            window.location.hash = e.target.hash;
        }); 
           
    }
    
    $("#reply").click(function(){
        $("#comment-r").toggle("slow");
    });
   

});

$(window).on('resize', function(){

    $( ".top-news-img" ).each( function() {
        
        var $div = $(this);
        var $container = $(".top-content");
        $div.width($container.width());
        $div.height($container.width() * 0.6);
    });

    $( ".top-news-img img" ).each( function() {
    var $img = $( this );
    
    var $container = $(".top-content");
    var $scale = $img.height()/$img.width();
    if($scale < 0.6 )
    {
        

        if($container.width()< $img.width())
        {
            
            $img.width($container.width());
                
        }
        
    }else
    {

        if(($container.width() * 0.6) < $img.prop('naturalHeight'))
        {
            
            $img.height($container.width() * 0.6);
                
        }
        
    }
    });

    $("#f-post img").each(function() {
        var $img = $(this);
        var $container = $("#f-post");
        $img.width($container.width());
        



    });
})
