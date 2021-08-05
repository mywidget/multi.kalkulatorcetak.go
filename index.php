<?php
define("BASEPATH", 'index.php');
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('FOLDER', 'class');

include __DIR__ .  DS . FOLDER . DS . 'filter.inc.php';
include __DIR__ .  DS . FOLDER . DS . 'app_config.php';
define('BASE_URL', $host);
include __DIR__ .  DS . FOLDER . DS . 'template.inc.php';
?>