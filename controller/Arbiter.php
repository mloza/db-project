<?php
class Controller_Arbiter extends lib_controller{
	
	public function action_index() {
		$this->redirect('/arbiter/list.html');
	}
	
	public function before()
	{
		$this->current = 'arbiter';
		$this->breadcrumbs['arbiter'] = 'Arbiter';
	}
	
	public function action_list($msg = null){
		$this->breadcrumbs['arbiter/list'] = 'List';
		$this->subcurrent = 'arbiter-list';
		$arbiters = $this->model->getArbiters();
		$this->template->view->set('arbiters', $arbiters);
		
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Arbiter został zaktualizowany'));
	}
	
	public function action_edit($id = NULL){
		$arbiter = $this->model->getArbiter($id);
		$this->template->view->set('arbiter',$arbiter);	
		
		$this->breadcrumbs['arbiter/edit/'.$id] = 'Edycja arbitra: '.$arbiter->imie.' '.$arbiter->nazwisko;
		if(!empty($_POST) AND is_array($_POST)) {
			if(!empty($_POST['imie']) AND !empty($_POST['nazwisko']) AND !empty($_POST['narodowosc']) AND !empty($_POST['dataUr']))
			{
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/arbiter/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
	
	public function action_details($id = NULL)
	{
		$arbiter = $this->model->getArbiter($id);
		$this->template->view->set('arbiter', $arbiter);
	}
}