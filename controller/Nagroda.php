<?php
class Controller_Nagroda extends lib_controller{
	
	
	public function action_index() {
		$this->redirect('/nagroda/list.html');
	}
	
	public function before()
	{
		$this->current = 'nagroda';
		$this->breadcrumbs['nagroda'] = 'Nagroda';
	}
	
	public function action_list($msg = null){
		$this->breadcrumbs['nagroda/list'] = 'List';
		$this->subcurrent = 'nagroda-list';
		$prizes = $this->model->getPrizes();
		$this->template->view->set('prizes',$prizes);
		
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Nagroda została zaktualizowana'));
	}
	public function action_edit($id = NULL){
		$prize = $this->model->getPrize($id);
		$this->template->view->set('prize',$prize);
		
		$this->breadcrumbs['nagroda/edit/'.$id] = 'Edycja nagrody';
		if(!empty($_POST) AND is_array($_POST)) {
			if(!empty($_POST['nazwaNagrody']) AND !empty($_POST['wartosc']))
			{
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/nagroda/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
}