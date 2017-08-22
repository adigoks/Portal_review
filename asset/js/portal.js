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
})
