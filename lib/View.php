<?php

class lib_View {

	private $template;
	private $vars = array();

	public static function factory($name)
	{
		return new lib_View($name);
	}
	
	public function __construct($viewname)
	{
		if(file_exists(__DIR__.'/../views/'.$viewname.'.php')) 
		{
			$viewname = explode('/', $viewname);
			foreach($viewname as $i=>$v)
			{
				$viewname[$i] = ucfirst($v); // asd
			}
			$viewname = join('/', $viewname);
			$this->template = __DIR__.'/../views/'.$viewname.'.php';
		}
		else throw new Exception("View file does not exists, trying to load: ".$viewname);
	}
	
	public function __get($name)
	{
		if(!empty($this->vars[$name])) return $this->vars[$name];
		else throw new Exception("Variable ".$name." does not exists"); 
	}
	
	public function __set($name, $value)
	{
		$this->vars[$name] = $value;
	}
	
	public function set($name, $value)
	{
		$this->vars[$name] = $value;
		return $this;
	}
	
	public function __toString()
	{
		try {
			return $this->render();
		} catch(Exception $e)
		{
			return $e->getMessage();
		}
	}
	
	public function render()
	{
		extract($this->vars);
		ob_start();
			require($this->template);
		return ob_get_clean();
	}
}