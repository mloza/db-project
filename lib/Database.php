<?php
 
 class Lib_Database {
	private static $instance = null;
	
	private $config = array();
	private $connection;
	private $queries = array();
	private $debug = true;
	
	static function Instance() {
		if(self::$instance == null) self::$instance = new Lib_Database();
		return self::$instance;
	}
	
	private function __construct() {
		$this->config = include('config/database.php');
		$this->connection = 
				new PDO('mysql:host='.$this->config['host'].';dbname='.$this->config['db'], 
									$this->config['username'], 
									$this->config['password']);
		$this->connection->query('SET names utf8');
	}
	
	public function errorInfo()
	{
		return $this->connection->errorInfo();
	}
	
	public function prepare($query)
	{
		$this->queries[] = $query;
		return $this->connection->prepare($query);
	}
	
	public function query($query)
	{
		$this->queries[] = $query;
		return $this->connection->query($query);
	}
	
	public function __destruct()
	{
		if($this->debug) {
			echo '<section class="grid_12"><pre>',print_r($this->queries, true),'</pre><div class="clear"></div></section>';	
		}
	}
	
	public function quote($qs)
	{
		return $this->connection->quote($qs);
	}
 }