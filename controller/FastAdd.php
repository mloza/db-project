<?php

class controller_FastAdd extends Lib_Controller {

	public function __construct($addr) {
		
		if( in_array($addr['action'], array('action_add', 'action_makenz'))) $this->template = 'templates/ajax';
		
		parent::__construct($addr);
	}
	
	public function action_index()
	{

	}
	
	public function action_add()
	{

		$q = lib_Database::instance()->query("SELECT * FROM arbiter ORDER BY RAND() LIMIT 6");
		$this->template->view->set('q', $q);
	}
	
	public function action_nz()
	{
		
	}
	
	public function action_makenz()
	{
	
	}
	
	public function action_wyniki()
	{
		
	}	
}