<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/user-style.css"/>
</head>
<div id="kom_paging">
	<?php base_url().'admin-dashboard/post/komentar/'.$post->id; ?>
</div>
<script>
$(document).ready(function() {
	var $komen_paging = function (){
	    $('.komen-paging').click(function (){
		var $val =$(this).val();
		
		var $target = '<?php echo base_url().'admin-dashboard/post/komentar/';?>'+$val+'/'+'<?php echo $post->id;?>';
		$("#kom_paging" ).load($target,$komen_paging);
	});
	}
	console.log('aaaa');
	$("#kom_paging" ).load( "<?php echo base_url().'admin-dashboard/post/komentar/1/'.$post->id;?>",$komen_paging);
	console.log('bbb');
});
</script>