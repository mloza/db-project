<?php
class Controller_Druzyna extends Lib_Controller{
	public function action_list()
	{
		$teams = $this->model->getTeams();
		$this->template->view->set('teams', $teams);
	}
	
	public function action_edit($id = NULL)
	{
		$team = $this->model->getTeam($id);
		$this->template->view->set('team', $team);
	}
}