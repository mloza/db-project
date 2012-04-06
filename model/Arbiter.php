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
}