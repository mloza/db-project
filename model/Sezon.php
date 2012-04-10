<?php
class Model_Sezon extends Lib_Model {
	
	/** Pobiera tylko sezony (bez powtórzeń) */
	public function getSeasons($limit = 30, $offset = 0) {
		$q = $this->db->prepare("SELECT DISTINCT sezon FROM sezon LIMIT 30 OFFSET 0");
		$q->execute();
		return $q;
	}

	public function getTournaments($sezon) {
		$q = $this->db->prepare("SELECT nazwaZawodow FROM sezon where sezon = :sezon");
		$q->bindParam(':sezon', $sezon, PDO::PARAM_STR);		
		$q->execute();
		return $q;
	}

	public function isIndividualTournament($sezon, $nazwaZawodow) {
		$q = $this->db->prepare("SELECT DISTINCT typ FROM wynik where sezon = :sezon AND nazwaZawodow = :nazwaZawodow");
		$q->bindParam(':sezon', $sezon, PDO::PARAM_STR);		
		$q->bindParam(':nazwaZawodow', $nazwaZawodow, PDO::PARAM_STR);
		$q->execute();	
		
		if($typ = $q->fetchObject("Model_Sezon")) {
			if($typ->typ == 'Indywidualne')
				return true;
			else
				return false;
		}
		return false;	
	}

	public function getTotalTournamentIndividualsResults($sezon, $nazwaZawodow) {
		$q = $this->db->prepare("SELECT skoczek.idSkoczka as idSkoczka, skoczek.imie as imie, skoczek.nazwisko as nazwisko, SUM(punkty + odleglosc) as suma 
					 FROM skoczek JOIN wynik 
					 ON skoczek.idSkoczka = wynik.idSkoczka 
				         WHERE wynik.sezon = :sezon AND wynik.nazwaZawodow = :nazwaZawodow 
					 GROUP BY wynik.idSkoczka ORDER BY suma DESC");
		$q->bindParam(':sezon', $sezon, PDO::PARAM_STR);
		$q->bindParam(':nazwaZawodow', $nazwaZawodow, PDO::PARAM_STR);
		$q->execute();
		return $q;
	}

	public function getTotalTournamentTeamsResults($sezon, $nazwaZawodow) {
		$q = $this->db->prepare("SELECT skoczek.krajPochodzenia as kraj, SUM(wynik.punkty + wynik.odleglosc) as suma FROM 
					 wynik JOIN skoczek ON wynik.idSkoczka = skoczek.idSkoczka
					 WHERE 
					 wynik.sezon = :sezon AND wynik.nazwaZawodow = :nazwaZawodow
					 GROUP BY skoczek.krajPochodzenia
					 ORDER BY suma DESC");
		$q->bindParam(':sezon', $sezon, PDO::PARAM_STR);
		$q->bindParam(':nazwaZawodow', $nazwaZawodow, PDO::PARAM_STR);
		$q->execute();
		return $q;
	}

	public function getTournamentTakeOffs($sezon, $nazwaZawodow) {
		$q = $this->db->prepare("SELECT DISTINCT skocznia.idSkoczni as idSkoczni, skocznia.miasto as miasto
					 FROM wynik JOIN skocznia
					 ON wynik.idSkoczni = skocznia.idSkoczni
					 WHERE wynik.sezon = :sezon AND wynik.nazwaZawodow = :nazwaZawodow");
		$q->bindParam(':sezon', $sezon, PDO::PARAM_STR);
		$q->bindParam(':nazwaZawodow', $nazwaZawodow, PDO::PARAM_STR);
		$q->execute();
		return $q;
	}
}

