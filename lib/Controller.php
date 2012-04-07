<?php

class Lib_Controller {
	protected $template = 'templates/default';
	protected $auto_render = true;
	protected $model;
	protected $current = 'home', $subcurrent = '';
	protected $breadcrumbs = array('/' => 'Home');
	
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
		$this->template
				->set('current', $this->current)
				->set('subcurrent', $this->subcurrent)
				->set('breadcrumbs', $this->breadcrumbs);
		if($this->auto_render)
			echo $this->template->render();
	}
	
	public function redirect($where, $type = 302)
	{
		$host  = $_SERVER['HTTP_HOST'];
		header('Location: http://'.$host.$where);
		echo ' ';
		exit;
	}
}