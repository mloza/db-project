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
			return $q->fetchObject();
		}
	}
	
	public function getKombinezon()
	{
		$q = $this->db->prepare("SELECT * FROM kombinezon NATURAL JOIN sprzet WHERE idSkoczka = :id");
		if(!($result = $q->execute(array(':id' => $this->idSkoczka)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q->fetchObject();
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
