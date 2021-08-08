<?php
	if (! defined('BASEPATH')) exit('No direct script access allowed');
	
	$base = siteURL()."/themes/new";
	if (file_exists('themes/new/thm.php')){
		include 'themes/new/thm.php';
		}else{
		include 'themes' . DS . '404' . DS . 'index.html'; 
	}

?>