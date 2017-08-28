<div class="list-group">
	<h2 class=" ini-tag">
		<span class="bord ini-tag-judul act"><?php echo $id_list->user_name; ?></span>
	</h2>
</div>

<?php foreach ($paging_id as $author) {
		$var['data']=$author;
		$var['id_list1']=$id_list1;
		$this->load->view('author_list',$var);}
?>
<br/>
<?php 
if($page > 1 ){
	$prev_page = $page-1;
?><button class='author-paging btn btn-default' value='<?php echo $page - 1; ?>' onclick="location.href='<?php echo base_url().'post/author/'.$id_list->user_name.'/'.$prev_page;?>'">previous</button>
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
		<button class='author-paging btn btn-default' value='<?php echo $start;?>' onclick="location.href='<?php echo base_url().'post/author/'.$id_list->user_name.'/'.$start;?>'"><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='author-paging btn btn-default' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'post/author/'.$id_list->user_name.'/'.$start;?>'" disabled><?php echo $start; ?></button> 
		<?php	
	}
	
 		
	$start++;
	}
}else{
	for ($i=0; $i < $page_count; $i++) { 
	if($page!=$start)	
	{
		?>
		<button class='author-paging btn btn-default' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'post/author/'.$id_list->user_name.'/'.$start;?>'"><?php echo $start; ?></button> 
		<?php	
	}else{
		?>
		<button class='author-paging btn btn-default' value='<?php echo $start; ?>' onclick="location.href='<?php echo base_url().'post/author/'.$id_list->user_name.'/'.$start;?>'" disabled><?php echo $start; ?></button> 
		<?php	
	}

	$start++;
	}
}

if($page < $page_count){
	$next_page = $page +1;
?>
<button class='author-paging' value='<?php echo $page + 1; ?>' onclick="location.href='<?php echo base_url().'post/author/'.$id_list->user_name.'/'.$next_page;?>'">next</button> 
<?php 
}?>

