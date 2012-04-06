<?php

class Autoload {
	static function load($classname) {
		//echo $classname;
		$file = explode('_', $classname);
		$filename = './'.strtolower($file[0]).'/'.ucfirst($file[1]).'.php';
		if(file_exists($filename)) require_once($filename);
		else throw new Exception('Nie mogę znaleść podanej klasy: '.$classname.' w ścieżce '.$filename);
	}
}