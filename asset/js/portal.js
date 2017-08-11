window.onload = function(){  

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
    }

    //Change hash for page-reload
    $('.nav-tabs a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
        window.location.hash = e.target.hash;
    }); 

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
        if(($container.width() * 0.6)< $img.height())
        {
            console.log('oiab');
            $img.height($container.width() * 0.6);
                
        }
        console.log('noooo');
    }
    });
    // $img.width( $img.width() * .5 );
    


} 

