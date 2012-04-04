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
		if(file_exists('views/'.$viewname.'.php')) $this->template = 'views/'.$viewname.'.php';
		else throw new Exception("View file does not exists");
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
		return $this->render();
	}
	
	public function render()
	{
		extract($this->vars);
		ob_start();
			require(__DIR__.'/../'.$this->template);
		return ob_get_clean();
	}
}