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
		$t->execute();
		return $t->fetchObject();
	}
}