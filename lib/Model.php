<?php 

class Lib_Model {
	
	protected $db;
	protected $fields = array();
	protected $table;
	protected $perpage = 30;
	
	public static function factory($name){
		$name = 'Model_'.$name;
		return new $name;
	}
	
	protected function __construct()
	{
		$this->db = lib_Database::instance();
		
		$this->table = str_replace('Model_', '', get_called_class());
		
		$q = $this->db->query('Show columns from '.$this->table.'');
		if($q)
		{
			while($f = $q->fetchObject())
			{
				$this->fields[$f->Field] = false;
				if($f->Key == 'PRI') $this->pk = $f->Field;
			}
		}
	}	
	
	public function get($id)
	{
		$q = $this->db->prepare('SELECT * FROM :table WHERE :pk = :id LIMIT 1');
		$q->bindParam(':id', $id, PDO::PARAM_INT);
		$q->bindParam(':table', $this->table, PDO::PARAM_STR);
		$q->bindParam(':pk', $this->pk, PDO::PARAM_STR);
		$q->execute();
		return $q->fetchObject("Model_".$this->table);
	}
	
	public function getAll()
	{
		$q = $this->db->prepare('SELECT * FROM '.$this->table.' ORDER BY '.$this->getFromGet('order', $this->pk).' '.$this->getFromGet('dir', 'ASC').' LIMIT '.$this->getFromGet('limit', $this->perpage).' OFFSET '.$this->getFromGet('offset', 0));
		$q->execute();
		if(!$q) print_r($q->errorInfo());
		return $q;
	}
	
	public function delete($id)
	{
		$q = $this->db->prepare('DELETE FROM :table WHERE :pk = :key LIMIT 1');
		$q->bindParam(':pk', $this->pk);
		$q->bindParam(':table', $this->table);
		$q->bindParam(':key', $id);
	}
	
	public function __set($name, $value)
	{
		if(isset($this->fields[$name])) $this->field[$name] = true;
		$this->$name = $value;
	}
	
	
	public function __get($name)
	{
		if(!empty($this->$name)) return $this->$name;
		if(isset($this->fields[$name])) return $this->fields[$name];
	}
	
	public function getFromGet($name, $default)
	{
		if(!empty($_GET[$name])) return $_GET[$name]; else return $default;
	}
}