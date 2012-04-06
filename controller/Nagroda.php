<?php
class Controller_Nagroda extends lib_controller{
	public function action_list(){
		$prizes = $this->model->getPrizes();
		$this->template->view->set('prizes',$prizes);
	}
	public function action_edit($id = NULL){
		$prize = $this->model->getPrize($id);
		$this->template->view->set('prize',$prize);
	}
}