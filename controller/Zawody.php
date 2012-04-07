<?php
class Controller_Zawody extends Lib_Controller{
public function action_list()
	{
		$contests = $this->model->getContests();
		$this->template->view->set('contests', $contests);
	}
	
	public function action_edit($id = NULL)
	{
		$contest = $this->model->getContest($id);
		$this->template->view->set('contest', $contest);
	}
}