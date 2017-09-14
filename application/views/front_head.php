<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		if(!is_null($identitas)){
			$attr = json_decode($identitas->attribute_values); 
			$nama = $attr->judul;
			if($attr->show == 'tampil')
			{
				if(isset($post))
				{
					$nama = $nama.' - '.$post->post_judul;	
				}
			}
		}else
		{
			$nama = 'example';
		}
		if(is_null($warna))
		{
			$warna_aksen = '#ffffff';
			$warna_dasar = '#ffffff';
		}else{
			$warna_value = json_decode($warna->attribute_values);
			$warna_aksen = $warna_value->aksen;
			$warna_dasar = $warna_value->dasar;
		}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/portal.js"></script>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/user-style.css"/>
	<meta property="og:url"           content="http://[::1]/portal2/post/eunha-is-love" />
  	<meta property="og:type"          content="website" />
  	<meta property="og:title"         content="Your Website Title" />
  	<meta property="og:description"   content="Your description" />
  	<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
	
	<style type="text/css">
		.bg{
			background-color: <?php echo $warna_dasar;?>;
		}
		body{
			background-color: <?php echo $warna_dasar;?>;
		}
		.act{
			background-color: <?php echo $warna_aksen;?>;
		}
	</style>
	 
	<title><?php echo $nama;?></title>
	 <!-- bagian ini bisa diubah di backend nantinya -->
</head>
