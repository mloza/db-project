<?php

class Autoload {
	static function load($classname) {
		//echo $classname;
		$file = explode('_', $classname);
		$filename = './'.$file[0].'/'.$file[1].'.php';
		if(file_exists($filename)) require_once($filename);
		else throw new Exception('Nie mog� znale�� podanej klasy: '.$classname.' w �cie�ce '.$filename);
	}
}