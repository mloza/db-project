<?php
class Model_Arbiter extends lib_model{
	public function getArbiters($limit = 30, $offset = 0){
		$a = $this->db->prepare("SELECT * FROM arbiter LIMIT 30 OFFSET 0");
		$a->execute();
		return $a;
	}
	
	public function getArbiter($id){
		$a = $this->db->prepare('SELECT * FROM arbiter WHERE idSedziego = :id LIMIT 1');
		$a->bindParam(':id', $id, PDO::PARAM_INT);
		$a->execute();
		return $a->fetchObject();
	}
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE arbiter SET `imie` = :imie, `nazwisko` = :nazwisko, `narodowosc` =:narodowosc, `dataUrodzenia`=:dataUr WHERE idSedziego = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':imie', $post['imie'], PDO::PARAM_STR);
			$q->bindParam(':nazwisko', $post['nazwisko'], PDO::PARAM_STR);
			$q->bindParam(':narodowosc', $post['narodowosc'], PDO::PARAM_STR);
			$q->bindParam(':dataUr', $post['dataUr'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
}