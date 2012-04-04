<?php 

class lib_model {
	
	protected $db;
	
	public static function factory($name){
		$name = 'Model_'.$name;
		return new $name;
	}
	
	protected function __construct()
	{
		$this->db = lib_Database::instance();
	}	
}