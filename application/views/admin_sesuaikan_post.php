<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li <?php if($page=='post'){echo "class='active'";}?> ><a data-toggle="tab" href="#post">Artikel</a></li>
			<li <?php if($page=='page'){echo "class='active'";}?> ><a data-toggle="tab" href="#page">Halaman Statis</a></li>
		</ul>
		<div class="tab-content">
		    <div id="post" class="tab-pane fade in <?php if($page=='post'){echo "active";}?>">
		    	<div class="col-md-12">
		    		<br>
		    		<H3>POST</H3>
		    		<div id = "post_sesuaikan" style="padding: 5px; border-radius: 5px;background-color: #f9eece;">
					
		    		</div>
		    	</div>
		    	
		    </div>
		    <div id="page" class="tab-pane fade in <?php if($page=='page'){echo "active";}?>">
		    	<div class="col-md-12">
		    		<br>
		    		<H3>PAGE</H3>
		    		<div id = "page_sesuaikan" style="padding: 5px; border-radius: 5px;background-color: #f9eece;">
		    			
		    		</div>
		    		
		    	</div>
		    	
		    </div>
		</div>
		
	</div>
</div>
<script>
$(document).ready(function() {
     //load initial records
    //executes code below when user click on pagination links
    // $("#results").on( "click", ".pagination a", function (e){
    //     e.preventDefault();
    //     $(".loading-div").show(); //show loading element
    //     var page = $(this).attr("data-page"); //get page number from link
    //     $("#results").load("paginasi_post.php",{"page":page}, function(){ //get content from PHP page
    //         $(".loading-div").hide(); //once done, hide loading element
    //     });
        
    // });
    var $page_paging = function (){
	    $('.page-paging').click(function (){
		var $val =$(this).val();
		
		$("#page_sesuaikan *" ).remove();
		var $target = '<?php echo base_url().'admin_post/paginasi_page/';?>'+$val;
		$("#page_sesuaikan" ).load($target,$page_paging);
	});
	}
	var $post_paging = function (){
		$('.post-paging').click(function (){
		var $val =$(this).val();
		
		$("#post_sesuaikan *" ).remove();
		var $target = '<?php echo base_url().'admin_post/paginasi_post/';?>'+$val;
		$("#post_sesuaikan" ).load($target, $post_paging);
	});	
	}
	$("#post_sesuaikan" ).load( "<?php echo base_url()."admin_post/paginasi_post"; ?>",$post_paging); //load initial records
     $("#page_sesuaikan" ).load( "<?php echo base_url()."admin_post/paginasi_page"; ?>",$page_paging);
});


</script>