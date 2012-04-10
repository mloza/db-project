<?php 

class Lib_Model {
	
	protected $db;
	
	public static function factory($name){
		$name = 'Model_'.$name;
		return new $name;
	}
	
	protected function __construct()
	{
		$this->db = lib_Database::instance();
		
		$q = $this->db->query('Show columns from '.str_replace('Model_', '', get_called_class()).'');
		while($f = $q->fetchObject())
		{
			$this->{ $f->Field } = '';
		}
	}	
}