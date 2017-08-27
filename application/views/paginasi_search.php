<h2 class="ini-tag">

	hasil pencarian untuk <?php echo $post;?> ..
</h2>

<?php foreach ($paging_search as $search) {
		$var['data']=$search;
		$this->load->view('tag_list',$var);}
?>

<br/>
<?php 
$post = str_replace(' ', '+', $post);
if($page > 1 ){
	$prev_page = $page-1;
?><button class='tag-paging btn btn-default' value='<?php echo $page - 1; ?>' onclick="location.href='<?php echo base_url().'search/'.$post.'/'.$prev_page;?>'">previous</button>
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
	if($page_count<5)
	{
		$start = 1;
	}else{
		$start = $page - 4;
	}
}else if ($page == $page_count - 1) {
	if($page_count <5)
	{
		$start = 1;
	}else{
		$start = $page - 3;
	}
}else{
	$start = $page - 2;
}


if($page_count>=5)
{
	for ($i=0; $i < 5; $i++) { 
	if($page!=$start)	
	{
		?>
		<button class='tag-paging btn btn-default' value='<?php echo $start;?>' onclick="location.href='<?php echo base_url().'search/'.$post.'/'.$start;?>'"><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='tag-paging btn btn-default' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'search/'.$post.'/'.$start;?>'" disabled><?php echo $start; ?></button> 
		<?php	
	}
	
 		
	$start++;
	}
}else{
	for ($i=0; $i < $page_count; $i++) { 
	if($page!=$start)	
	{
		?>
		<button class='tag-paging btn btn-default' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'search/'.$post.'/'.$start;?>'"><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='tag-paging btn btn-default' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'search/'.$post.'/'.$start;?>'" disabled><?php echo $start; ?></button> 
		<?php	
	}

	$start++;
	}
}

if($page < $page_count){
	$next_page = $page +1;
?>
<button class='tag-paging btn btn-default' value='<?php echo $page + 1; ?>' onclick="location.href='<?php echo base_url().'post/search/'.$post.'/'.$next_page;?>'">next</button> 
<?php 
}?>