 <?php
 
 class Lib_Database {
	private static $instance = null;
	
	private $config = array();
	private $connection;
	
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
	
	public function prepare($query)
	{
		return $this->connection->prepare($query);
	}
	
	public function query($query)
	{
		return $this->connection->query($query);
	}
 }