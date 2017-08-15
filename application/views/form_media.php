
<H3>KELOLA GAMBAR ANDA</H3>

<div class='media-manager-container col-md-12'>

	<div id='media-list' class='col-md-9'> </div>
	<div id='media-option' class='col-md-3'>b </div>
	
</div>

<script type="text/javascript">
	$(document).ready(function() {

		loadMediaList();
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
 	//  var $_paging = function (){
	//     $('.page-paging').click(function (){
	// 	var $val =$(this).val();
		
	// 	$("#page_sesuaikan *" ).remove();
	// 	var $target = '<?php echo base_url().'admin_post/paginasi_page/';?>'+$val;
	// 	$("#page_sesuaikan" ).load($target,$page_paging);
	// });
	// }
	function loadMediaList(){
		$("#media-list" ).load( "<?php echo base_url()."admin_media/media_list"; ?>"); //load initial records	
	}
	
     
});
</script>