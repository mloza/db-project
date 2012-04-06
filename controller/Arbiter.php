<?php
class Controller_Arbiter extends lib_controller{
	public function action_list(){
		$arbiters = $this->model->getArbiters();
		$this->template->view->set('arbiters', $arbiters);
	}
	
	public function action_edit($id = NULL){
		$arbiter = $this->model->getArbiter($id);
		$this->template->view->set('arbiter',$arbiter);	
	}
}