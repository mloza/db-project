<?php
class Controller_Skocznia extends lib_controller{
	public function action_list() {
		$skiJumps = $this->model->getSkiJumps();
		$this->template->view->set('skiJumps', $skiJumps);
	}
	
	public function action_edit($id = NULL){
		$skiJump = $this->model->getSkiJump($id);
		$this->template->view->set('skiJump', $skiJump);
	}
}