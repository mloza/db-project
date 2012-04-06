<?php

class Lib_Controller {
	protected $template = 'templates/default';
	protected $auto_render = true;
	protected $model;
	
	public function __construct($addr)
	{
		$this->template = lib_View::factory($this->template)->set('view', lib_View::factory($addr['controller'].'/'.$addr['action']));
		
		try {
			$this->model = lib_Model::factory($addr['controller']);
		} catch(Exception $e) {
		
		}
	}
	
	public function before()
	{
	}
	
	public function after() 
	{
	}
		
	public function __destruct()
	{
		if($this->auto_render)
			echo $this->template->render();
	}
}