<?php
class Controller_Druzyna extends Lib_Controller{
	
	public function action_index() {
		$this->redirect('/druzyna/list.html');
	}
	
	public function before()
	{
		$this->current = 'druzyna';
		$this->breadcrumbs['druzyna'] = 'Druzyna';
	}
	
	public function action_list($msg = null)
	{
		$this->breadcrumbs['druzyna/list'] = 'List';
		$this->subcurrent = 'druzyna-list';
		$teams = $this->model->getTeams();
		$this->template->view->set('teams', $teams);
		
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Drużyna została zaktualizowana'));
	}
	
	public function action_edit($id = NULL)
	{
		$team = $this->model->getTeam($id);
		$this->template->view->set('team', $team);
		
		$this->breadcrumbs['druzyna/edit/'.$id] = 'Edycja drużyny: '.$team->nazwa;
		if(!empty($_POST) AND is_array($_POST)) {
			if(!empty($_POST['nazwa']))
			{
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/druzyna/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			} else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
	
	public function action_details($id = NULL)
	{
		$team = $this->model->getTeam($id);
		$this->template->view->set('team', $team);
	}
}