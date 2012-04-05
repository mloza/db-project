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
//$addr = explode('/', $_SERVER['REQUEST_URI']);
preg_match('@'.$config['url']."(?P<controller>[^./]+)(/(?P<action>[^./]+))?(/(?P<param1>[^./]+))?(/(?P<param2>[^./]+))?@i", $_SERVER['REQUEST_URI'], $addr);

if(empty($addr['controller'])) $addr['controller'] = $config['default']['controller'];
if(empty($addr['action'])) $addr['action'] = $config['default']['action'];

$type = "Controller_".$addr['controller'];
$addr['action'] = 'action_'.$addr['action'];
$controller = new $type($addr);
$controller->before();
if(!empty($addr['param2']))
	$controller->$addr['action']($addr['param1'],$addr['param2']);
elseif (!empty($addr['param1']))
	$controller->$addr['action']($addr['param1']);
else
	$controller->$addr['action']();
$controller->after();
