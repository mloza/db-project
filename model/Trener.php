<?php
class Model_Trener extends lib_model{
	
	public function getTreners($limit = 30, $offset = 0){
		$t = $this->db->prepare("SELECT * FROM trener LIMIT 30 OFFSET 0");
		$t->execute();
		return $t;
	}
	
	public function getTrener($id) {
		$t = $this->db->prepare('SELECT * FROM trener WHERE idTrenera = :id LIMIT 1');
		$t->bindParam(':id', $id, PDO::PARAM_INT);
		if(!$t->execute()) print_r($t->errorInfo());
		return $t->fetchObject("Model_Trener");
	}
	
	public function getSkoczek()
	{
		$q = $this->db->prepare("SELECT * FROM skoczek_trener natural JOIN skoczek WHERE idTrenera = :id");
		if(!($result = $q->execute(array(':id' => $this->idTrenera)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function update($id, $post)
	{
		try {
			if(!$post['dataSm']) $post['dataSm'] = NULL;
			$q = $this->db->prepare("UPDATE trener SET `imie` = :imie, `nazwisko` = :nazwisko, `odKiedy` =:odKiedy, `dataUrodzenia`=:dataUr, `dataSmierci`=:dataSm WHERE idTrenera = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':imie', $post['imie'], PDO::PARAM_STR);
			$q->bindParam(':nazwisko', $post['nazwisko'], PDO::PARAM_STR);
			$q->bindParam(':odKiedy', $post['odKiedy'], PDO::PARAM_STR);
			$q->bindParam(':dataUr', $post['dataUr'], PDO::PARAM_STR);
			$q->bindParam(':dataSm', $post['dataSm'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
	
	public function add($post)
	{
		try {
			if(!$post['dataSm']) $post['dataSm'] = NULL;
			$q = $this->db->prepare("INSERT INTO trener(`imie`, `nazwisko`, `odKiedy`, `dataUrodzenia`, `dataSmierci`) VALUES (:imie, :nazwisko, :odKiedy, :dataUr, :dataSm)");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':imie', $post['imie'], PDO::PARAM_STR);
			$q->bindParam(':nazwisko', $post['nazwisko'], PDO::PARAM_STR);
			$q->bindParam(':odKiedy', $post['odKiedy'], PDO::PARAM_STR);
			$q->bindParam(':dataUr', $post['dataUr'], PDO::PARAM_STR);
			$q->bindParam(':dataSm', $post['dataSm'], PDO::PARAM_STR);
			if(!$q->execute()) throw new Exception("Database Error: ".print_r($q->errorInfo(), true));
			return 0;
		} catch(Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function delete($id)
	{
		$q = $this->db->prepare('DELETE FROM trener WHERE idTrenera = :id');
		$q->bindParam(':id', $id);
		if(!$q->execute()) throw new Exception("Database Error: ".print_r($q->errorInfo(), true));
	}
}