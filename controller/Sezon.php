<?php

class Controller_Sezon extends Lib_Controller {
	
	public function before()
	{
		// Ustawia podświetlenie w menu na sezon
		$this->current = 'sezon';
		// Dodaje 1 okruszek do ścieżki
		$this->breadcrumbs['sezon'] = 'Sezon';
	}

	public function action_list()
	{
		// Dodaje 2 okruszek do ścieżki
		$this->breadcrumbs['sezon/list'] = 'Informacje o sezonach';
		// Podświetla w podmenu listę, aby to działało poprawnie trzeba też dodać w szablonie odpowiednie rzeczy
		$this->subcurrent = 'sezon-list';

		$seasons = $this->model->getSeasons();
		
		$i = 0;
		while($s = $seasons->fetchObject())
		{
			$tournaments[$i] = $this->model->getTournaments($s->sezon);
			
			while($t = $tournaments[$i]->fetchObject())
			{
				if($this->model->isIndividualTournament($s->sezon, $t->nazwaZawodow))
					$tournamentTotalResults[$s->sezon][$t->nazwaZawodow] = array ( $this->model->getTotalTournamentIndividualsResults($s->sezon, $t->nazwaZawodow), true);				
				else
					$tournamentTotalResults[$s->sezon][$t->nazwaZawodow] = array ( $this->model->getTotalTournamentTeamsResults($s->sezon, $t->nazwaZawodow), false);		
				
				$tournamentTakeOffs[$s->sezon][$t->nazwaZawodow] = $this->model->getTournamentTakeOffs($s->sezon, $t->nazwaZawodow);			
			}			
			$tournaments[$i]->closeCursor();
			$tournaments[$i]->execute();
			
			$i++;
		}
		$seasons->closeCursor();
		$seasons->execute();

		
		$this->template->view->set('seasons', $seasons);
		$this->template->view->set('tournaments', $tournaments);
		$this->template->view->set('tournamentTotalResults', $tournamentTotalResults); // [zbiór wynikowy, true/false określający czy to zawody indywidualne były]
		$this->template->view->set('tournamentTakeOffs', $tournamentTakeOffs);
	}
}
