<?php
class Model_Zawody extends Lib_model{
	public function getContests($limit = 30, $offset = 0){
		$m = $this->db->prepare("SELECT * FROM zawody LIMIT 30 OFFSET 0");
		if(!$m->execute()) {
			print_r($m->errorInfo());
			print_r($m);
		}
		return $m;
	}
	
	public function getContest($nazwa = NULL){
		$m = $this->db->prepare('SELECT * FROM zawody WHERE nazwa=:nazwa LIMIT 1');
		$m->bindParam(':nazwa', $nazwa, PDO::PARAM_STR);
		$m->execute();
		return $m->fetchObject("Model_Zawody");
	}
	
	public function getSeasons(){
		$m = $this->db->prepare('SELECT * FROM sezon WHERE nazwaZawodow=:nazwa');
		$m->bindParam(':nazwa', $this->nazwa, PDO::PARAM_STR);
		if(!$m->execute()) print_r($m->errorInfo());
		return $m;
	}
	
	public function getWyniki($sezon)
	{
		$id = $_GET['nazwa'];
		$q = $this->db->prepare("SELECT * from sezon join zawody on(nazwaZawodow=nazwa) join wynik on (sezon.sezon = wynik.sezon and sezon.nazwaZawodow=wynik.nazwaZawodow) join skoczek on(wynik.idSkoczka=skoczek.idSkoczka) where zawody.nazwa = :id and sezon.sezon= :sezon");
		if(!($result = $q->execute(array(':id' => $this->nazwa, ':sezon'=>$sezon)))) {
			print_r($q->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function getWynikiBySezonSkocznia($sezon, $idSkoczni)
	{
		$id = $_GET['nazwa'];
		$q = $this->db->prepare("SELECT * from sezon join zawody on(nazwaZawodow=nazwa) join wynik on (sezon.sezon = wynik.sezon and sezon.nazwaZawodow=wynik.nazwaZawodow) join skoczek on(wynik.idSkoczka=skoczek.idSkoczka) where zawody.nazwa = :id and sezon.sezon= :sezon and idSkoczni = :idSkocznia");
		if(!($result = $q->execute(array(':id' => $this->nazwa, ':sezon'=>$sezon, ':idSkocznia' => $idSkoczni)))) {
			print_r($q->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function getSkocznie($sezon)
	{
		$id = $_GET['nazwa'];
		$q = $this->db->prepare("SELECT DISTINCT ass.idSkoczni, ass.sezon, ass.nazwa, skocznia.nazwa as nSkoczni FROM arbiter_skocznia_sezon ass JOIN skocznia ON ass.idSkoczni = skocznia.idSkoczni WHERE ass.sezon = :sezon AND ass.nazwa = :nazwa");
		if(!($result = $q->execute(array(':nazwa' => $this->nazwa, ':sezon'=>$sezon)))) {
			print_r($q->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE trener SET `nazwa` = :nazwa, `typ` = :typ WHERE nazwa = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_STR);
			$q->bindParam(':typ', $post['typ'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
	
	public function add_score($f)
	{
		if(!empty($f['odl']) AND !empty($f['pkt']) AND !empty($f['date']))
		{
			$q = $this->db->prepare("INSERT INTO wynik VALUES (".$f['skoczek'].','.$f['sezon'].','.$f['skocznia'].',\''.$f['zawody'].'\','.$f['pkt'].',\''.$f['odl'].'\',\''.$f['typ'].'\',\''.$f['date'].'\')');
			if(!$q->execute()) return print_r($q->errorInfo(), true); else return true;
		} else return false;
	}
}