<?php 

class Controller_Trener extends lib_controller{
	
	public function action_list(){
		$treners = $this->model->getTreners();
		$this->template->view->set('terners', $treners);
	} 
	
	public function action_edit($id = NULL){
		$trener = $this->model->getTrener($id);
		$this->template->view->set('terner', $trener);
	}
}

