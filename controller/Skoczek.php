<?php

class Controller_Skoczek extends lib_controller {
		
	public function index() {
		//print_r($this->model->getJumpers()->fetchObject());
	}
	
	public function action_list()
	{
		$jumpers = $this->model->getJumpers();
		$this->template->view->set('jumpers', $jumpers);
	}
	
	public function action_edit($id = NULL)
	{
		$jumper = $this->model->getJumper($id);
		$this->template->view->set('jumper', $jumper);
	}
}