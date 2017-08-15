<?php 
if($page > 1 ){
?><button class='post-paging' value='<?php echo $page - 1; ?>'>previous</button>
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
		<button class='post-paging' value='<?php echo $start; ?>'><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='post-paging' value='<?php echo $start; ?>' disabled><?php echo $start; ?></button> 
		<?php	
	}
	
 		
	$start++;
	}
}else{
	for ($i=0; $i < $page_count; $i++) { 
	if($page!=$start)	
	{
		?>
		<button class='post-paging' value='<?php echo $start; ?>'><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='post-paging' value='<?php echo $start; ?>' disabled><?php echo $start; ?></button> 
		<?php	
	}

	$start++;
	}
}

if($page < $page_count){
?>
<button class='post-paging' value='<?php echo $page + 1; ?>'>next</button> 
<?php 
}
	foreach ($post as $p) {
		$var['data']=$p;
		$var['post_id']=$post_id;
		$this->load->view('admin_post_list',$var);}?>

