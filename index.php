<?php
	//display errors, turn off 4 production
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	//load autoloader
	include('lib/autoloader.php');
	spl_autoload_register(array('Autoload', 'load'));

	//load configuration
	$config = include('config/conf.php');
	$DB = Lib_Database::Instance();
	
	//dispatch address
	$addr = explode('/', $_SERVER['REQUEST_URI']);
	if(empty($addr[1])) $addr[1] = $config['default']['controller'];
	if(empty($addr[2])) $addr[2] = $config['default']['action'];
	$type = "Controller_".$addr[1];
	$controller = new $type($addr);
	$controller->before();
	$controller->$addr[2]();
	$controller->after();
?>
