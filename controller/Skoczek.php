<?php

class Controller_Skoczek extends Lib_Controller {
		
	public function action_index() {
		$this->redirect('/skoczek/list.html');
	}
	
	public function before()
	{
		// Ustawia podświetlenie w menu na skoczka
		$this->current = 'skoczek';
		// Dodaje 1 okruszek do ścieżki
		$this->breadcrumbs['skoczek'] = 'Skoczek';
	}
	
	public function action_list($msg = null)
	{
		// Dodaje 2 okruszek do ścieżki
		$this->breadcrumbs['skoczek/list'] = 'List';
		// Podświetla w podmenu listę, aby to działało poprawnie trzeba też dodać w szablonie odpowiednie rzeczy
		$this->subcurrent = 'skoczek-list';
		$jumpers = $this->model->getJumpers();
		$this->template->view->set('jumpers', $jumpers);
				
		// wyświetlanie wiadomości jest domyślnie zaimplementowane, wystarczy ustawić tą zmeinną w widoku, dostępne typy: pusty, warning, error, success, loading
		if($msg == 'updated')
			$this->template->set('msg', array('type' => 'success', 'msg' => 'Zawodnik został zaktualizowany'));
	}
	
	public function action_edit($id = NULL)
	{
		$jumper = $this->model->getJumper($id);
		$this->template->view->set('jumper', $jumper);

		$this->breadcrumbs['skoczek/edit/'.$id] = 'Edycja skoczka: '.$jumper->imie.' '.$jumper->nazwisko;
		if(!empty($_POST) AND is_array($_POST)) {
			//sprawdzamy czy podano wszstkie pola które trzeba
			 if(!empty($_POST['imie']) AND !empty($_POST['nazwisko']) AND !empty($_POST['kraj']) AND !empty($_POST['dataUr']))
			 {		
				if(!($e = $this->model->update($id, $_POST)))
					$this->redirect('/skoczek/list/updated.html');
				else {
					$this->template->set('msg', array('type' => "error", 'msg' => "Błąd bazy danych: ".$e));
				}
			 } else $this->template->set('msg', array('type' => "error", 'msg' => "Nie uzupełniłeś wymaganych pól"));
		}
	}
	
	public function action_details($id = NULL)
	{
		$jumper = $this->model->getJumper($id);
		$this->template->view->set('jumper', $jumper);
	}
}