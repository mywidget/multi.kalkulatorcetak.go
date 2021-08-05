<?php
	if (! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	// $GAPPID = $config['APPS_ID'];
	// $jenis = array('secret'=>$config['APPS_SECRET'],'app_id'=>$config['APPS_ID'],'start'=>0,'limit'=>6);
	
	// $sync = curl($config['URL_API'],json_encode($jenis));
	// $gApp = json_decode($sync,true);
	$base = siteURL()."/themes/new";
	if (file_exists('themes/new/thm.php')){
		include 'themes/new/thm.php';
		}else{
		include 'themes' . DS . '404' . DS . 'index.html'; 
	}

?>