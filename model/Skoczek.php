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
		return $q->fetchObject();
	}
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE skoczek SET `imie` = :imie, `nazwisko` = :nazwisko, plec = :plec WHERE idSkoczka = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':imie', $post['imie'], PDO::PARAM_STR);
			$q->bindParam(':nazwisko', $post['nazwisko'], PDO::PARAM_STR);
			$q->bindParam(':plec', $post['plec'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
}
