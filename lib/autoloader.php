<?php

class Autoload {
	static function load($classname) {
		//echo $classname;
		$file = explode('_', $classname);
		$filename = './'.$file[0].'/'.$file[1].'.php';
		if(file_exists($filename)) require_once($filename);
		else throw new Exception('Nie mogê znaleŸæ podanej klasy: '.$classname.' w œcie¿ce '.$filename);
	}
}