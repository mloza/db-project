<?php
class Model_Zawody extends Lib_model{
	public function getContests($limit = 30, $offset = 0){
		$m = $this->db->prepare("SELECT * FROM zawody LIMIT 30 OFFSET 0");
		$m->execute();
		return $m;
	}
	
	public function getContest($nazwa = NULL){
		$m = $this->db->prepare('SELECT * FROM zawody WHERE nazwa :=nazwa LIMIT 1');
		$m->bindParam(':nazwa', $nazwa, PDO::PARAM_INT);
		$m->execute;
		return $m->fetchObject();
	}
}