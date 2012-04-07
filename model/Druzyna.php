<?php
class Model_Druzyna extends Lib_Model {

	public function getTeams($limit = 30, $offset = 0) {
		$q = $this->db->prepare("SELECT * FROM druzyna LIMIT 30 OFFSET 0");
		$q->execute();
		return $q;
	}
	
	public function getTeam($id) {
		$q = $this->db->prepare('SELECT * FROM druzyna WHERE idDruzyny = :id LIMIT 1');
		$q->bindParam(':id', $id, PDO::PARAM_INT);
		$q->execute();
		return $q->fetchObject();
	}
}