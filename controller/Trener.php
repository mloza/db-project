<?php 

class Controller_Trener extends lib_controller{
	
	public function action_index() {
		$this->redirect('/trener/list.html');
	}
	
	public function before()
	{
		$this->current = 'trener';
		$this->breadcrumbs['trener'] = 'Trener';
	}
	public function action_list($msg = null){
		$this->breadcrumbs['trener/list'] = 'List';
		$this->subcurrent = 'trener-list';
		$treners = $this->model->getTreners();
		$this->template->view->set('treners', $treners);
		
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Trener został zaktualizowany'));
	} 
	
	public function action_edit($id = NULL){
		$trener = $this->model->getTrener($id);
		$this->template->view->set('trener', $trener);
		
		$this->breadcrumbs['trener/edit/'.$id] = 'Edycja trenera: '.$trener->imie.' '.$trener->nazwisko;
		if(!empty($_POST) AND is_array($_POST)) {
			//sprawdzamy czy podano wszstkie pola które trzeba
			if(!empty($_POST['imie']) AND !empty($_POST['nazwisko']) AND !empty($_POST['odKiedy']) AND !empty($_POST['dataUr']))
			{
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/trener/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
}

