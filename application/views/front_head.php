<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		if(!is_null($identitas)){
			$attr = json_decode($identitas->attribute_values); 
			$nama = $attr->judul;
		}else
		{
			$nama = 'example';
		}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/portal.js"></script>
	<?php echo link_tag('asset/css/bootstrap-theme.css'); ?>
	<?php echo link_tag('asset/css/bootstrap.css'); ?>
	<?php echo link_tag('asset/css/user-style.css'); ?>

	<title><?php echo $nama;?></title>
	 <!-- bagian ini bisa diubah di backend nantinya -->
</head>
