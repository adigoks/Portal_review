<h2 class=" ini-tag">
	<span class="bord ini-tag-judul act"><?php echo $post->post_tag; ?></span>
</h2>

<?php foreach ($paging_tag as $tag) {
		$var['data']=$tag;
		$this->load->view('tag_list',$var);}
?>

<br/>
<?php 
if($page > 1 ){
	$prev_page = $page-1;
?><button class='tag-paging' value='<?php echo $page - 1; ?>' onclick="location.href='<?php echo base_url().'post/tag/'.$post->post_tag.'/'.$prev_page;?>'">previous</button>
<?php
}
if($config['total_rows']% $perpage == 0)
{
	$page_count = 0;
	$total_rows = $config['total_rows'];
	while ( $total_rows>=$perpage) {
		$total_rows -= $perpage;
		$page_count++;
	}
	
}else{
	$page_count = 0;
	$total_rows = $config['total_rows'];
	while ( $total_rows>$perpage) {
		$total_rows -= $perpage;
		$page_count++;
	}
	$page_count = $page_count + 1;
	
}

if($page == 1 )
{
	$start = 1;
}else if ($page == 2)
{
	$start = 1;
}else if($page == $page_count)
{
	$start = $page - 4;
}else if ($page == $page_count - 1) {
	$start = $page - 4;
}else{
	$start = $page - 2;
}


if($page_count>=5)
{
	for ($i=0; $i < 5; $i++) { 
	if($page!=$start)	
	{
		?>
		<button class='tag-paging' value='<?php echo $start;?>' onclick="location.href='<?php echo base_url().'post/tag/'.$post->post_tag.'/'.$start;?>'"><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='tag-paging' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'post/tag/'.$post->post_tag.'/'.$start;?>'" disabled><?php echo $start; ?></button> 
		<?php	
	}
	
 		
	$start++;
	}
}else{
	for ($i=0; $i < $page_count; $i++) { 
	if($page!=$start)	
	{
		?>
		<button class='tag-paging' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'post/tag/'.$post->post_tag.'/'.$start;?>'"><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='tag-paging' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'post/tag/'.$post->post_tag.'/'.$start;?>'" disabled><?php echo $start; ?></button> 
		<?php	
	}

	$start++;
	}
}

if($page < $page_count){
	$next_page = $page +1;
?>
<button class='tag-paging' value='<?php echo $page + 1; ?>' onclick="location.href='<?php echo base_url().'post/tag/'.$post->post_tag.'/'.$next_page;?>'">next</button> 
<?php 
}?>