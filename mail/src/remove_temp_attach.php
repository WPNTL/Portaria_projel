<?php
	include "../config/config_general.php";
	
	$x = explode('|',$_POST['file']);
	print_r($x);
	foreach($x as $k => $file){
		
		$file_path = $attachment_dir . '/'.  $file;
		if(file_exists($file_path)){
			unlink($file_path);
		}
	}
?>
