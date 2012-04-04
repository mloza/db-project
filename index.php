<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$dir = '/var/www';
	$addr = explode('/', str_replace(__DIR__,'', $dir.$_SERVER['REQUEST_URI']));
	
	$type = "Controller_".$addr[0];
	$controller = new $addr[0];
?>


<h1>Works!</h1>
