<?php
class Model_Skoczek extends Lib_Model {

	public function getJumpers($limit = 30, $offset = 0) {
		$q = $this->db->prepare("SELECT * FROM skoczek LIMIT 30 OFFSET 0");
		$q->execute();
		return $q;
	}

	public function getJumper($id) {
		$q = $this->db->prepare('SELECT * FROM skoczek WHERE idSkoczka = :id LIMIT 1');
		$q->bindParam(':id', $id, PDO::PARAM_INT);
		$q->execute();
		return $q->fetchObject("Model_Skoczek");
	}

	public function getNarty()
	{
		$q = $this->db->prepare("SELECT * FROM narty NATURAL JOIN sprzet WHERE idSkoczka = :id");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}

	public function getKombinezon()
	{
		$q = $this->db->prepare("SELECT * FROM kombinezon NATURAL JOIN sprzet WHERE idSkoczka = :id");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}

	public function getPozostale()
	{
		$q = $this->db->prepare("SELECT * FROM pozostale NATURAL JOIN sprzet WHERE idSkoczka = :id");

		if(!($result = $q->execute(array(':id' => $this->idSkoczka))))
		{
			print_r($this->db->errorInfo());
		} else
		{
			return $q;
		}
	}

	public function getTrener()
	{
		$q = $this->db->prepare("SELECT * FROM skoczek_trener natural JOIN trener WHERE idSkoczka = :id");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function getNagroda()
	{
		$q = $this->db->prepare("SELECT * FROM nagroda_skoczek natural JOIN nagroda WHERE idSkoczka = :id");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function getDruzyna()
	{
		$q = $this->db->prepare("SELECT * FROM skoczek_druzyna natural JOIN druzyna WHERE idSkoczka = :id");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function getWyniki($sezon)
	{
		$q = $this->db->prepare("SELECT * FROM wynik natural join skocznia where idSkoczka = :id and sezon= :sezon");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka, ':sezon'=>$sezon)))) {
			print_r($q->errorInfo());
		} else {
			return $q;
		}
	}
	

	public function update($id, $post)
	{
		try {
			if(!$post['dataSm']) $post['dataSm'] = NULL;
			$q = $this->db->prepare("UPDATE skoczek SET `imie` = :imie, `nazwisko` = :nazwisko, `krajPochodzenia` =:kraj, `dataUrodzenia`=:dataUr, `dataSmierci`=:dataSm, plec = :plec WHERE idSkoczka = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':imie', $post['imie'], PDO::PARAM_STR);
			$q->bindParam(':nazwisko', $post['nazwisko'], PDO::PARAM_STR);
			$q->bindParam(':kraj', $post['kraj'], PDO::PARAM_STR);
			$q->bindParam(':dataUr', $post['dataUr'], PDO::PARAM_STR);
			$q->bindParam(':dataSm', $post['dataSm'], PDO::PARAM_STR);
			$q->bindParam(':plec', $post['plec'], PDO::PARAM_STR);
			//if(!$q->execute()) throw new Exception("Database Error: ".print_r($this->db->connection->errorInfo(), true));
			return 0;
		} catch(Exception $e) {
			return $e->getMessage();
		}
	}
}
