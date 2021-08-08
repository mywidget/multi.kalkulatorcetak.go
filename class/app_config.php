<?php
//CHANGE APPS_ID & APPS_PUBLIC
// $config = array(
	// "APPS_ID"	=> "YOUR_APP_ID",
	// "APPS_PUBLIC"	=> "YOUR_APPS_SECRET",
	// "SITE_API"	=> "https://api.kalkulatorcetak.com"
// );

$config = array(
	"APPS_ID"	=> "673fdc8e-cc8a-45e3-86b6-d3eb16149b45",
	"APPS_PUBLIC"	=> "cca7231e4e28811e1c2e05b1a17c372120a4f0c5b59fc445bc0a2367388bf74a",
	"SITE_API"	=> "https://api.kalkulatorcetak.go"
);

$_URL = $config['SITE_API'].'/apiapp/morea/0/6/'.$config['APPS_ID'].'/'.$config['APPS_PUBLIC']; 
