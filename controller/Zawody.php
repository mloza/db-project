<?php
class Controller_Zawody extends Lib_Controller{
	
	public function action_index() {
		$this->redirect('/zawody/list.html');
	}
	
	public function before()
	{
		$this->current = 'zawody';
		$this->breadcrumbs['zawody'] = 'Zawody';
	}
	
	public function action_list($msg = null)
	{
		$this->breadcrumbs['zawody/list'] = 'List';
		$this->subcurrent = 'zawody-list';
		$contests = $this->model->getContests();
		$this->template->view->set('contests', $contests);
		
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Zawody zostały zaktualizowane'));
	}
	
	public function action_edit()
	{
		$id = $_GET['nazwa'];
		$contest = $this->model->getContest($id);
		$this->template->view->set('contest', $contest);
		
		$this->breadcrumbs['zawody/edit'] = 'Edycja zawodów: '.$contest->nazwa;
		if(!empty($_POST) AND is_array($_POST)) {
			if(!empty($_POST['nazwa']) AND !empty($_POST['typ']))
			{
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/zawody/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
}