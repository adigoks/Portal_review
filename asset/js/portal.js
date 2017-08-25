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
                console.log('hai');
               $("#f-con").removeClass("featured-con");
               $("#f-con").addClass("featured-img");
               $img.width($container2.width());
               $img.height($container2.height());
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
