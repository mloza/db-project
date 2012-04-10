<?php
class Controller_Skocznia extends lib_controller{
	
	
	public function action_index() {
		$this->redirect('/skocznia/list.html');
	}
	
	public function before()
	{
		$this->current = 'skocznia';
		$this->breadcrumbs['skocznia'] = 'Skocznia';
	}
	
	public function action_list($msg = null) {
		$this->breadcrumbs['skocznia/list'] = 'List';
		$this->subcurrent = 'skocznia-list';
		$skiJumps = $this->model->getSkiJumps();
		$this->template->view->set('skiJumps', $skiJumps);
		
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Skocznia została zaktualizowana'));
	}
	
	public function action_edit($id = NULL){
		$skiJump = $this->model->getSkiJump($id);
		$this->template->view->set('skiJump', $skiJump);
		
		$this->breadcrumbs['skocznia/edit/'.$id] = 'Edycja skoczni';
		if(!empty($_POST) AND is_array($_POST)) {
			if(!empty($_POST['nazwa']) AND !empty($_POST['miasto']) AND !empty($_POST['punktK']) AND !empty($_POST['rekord']))
			{
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/skocznia/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
	
	public function action_add()
	{
		$this->subcurrent = 'skocznia-add';
		$this->breadcrumbs['skocznia/add'] = 'Dodawawnie nowej skoczni';
	
		$this->template->view->set('skiJump', $this->model);
	
		if(!empty($_POST) AND is_array($_POST)) {
			//sprawdzamy czy podano wszstkie pola które trzeba
			if(!empty($_POST['nazwa']) AND !empty($_POST['miasto']) AND !empty($_POST['punktK']) AND !empty($_POST['rekord']))
			{
				if(!($e = $this->model->add($_POST)))
					$this->redirect('/skocznia/list/added.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
	
	public function action_delete($id)
	{
		$this->model->delete($id);
		$this->redirect('/skocznia/list/deleted.html');
	}
	
	public function action_details($id = NULL)
	{
		$skiJump = $this->model->getSkiJump($id);
		$this->template->view->set('skiJump', $skiJump);
	}
}