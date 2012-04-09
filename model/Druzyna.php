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
		return $q->fetchObject("Model_Druzyna");
	}
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE druzyna SET `nazwa` = :nazwa WHERE idDruzyny = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':nazwa', $post['nazwa'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getSkoczek()
	{
		$q = $this->db->prepare("SELECT * FROM skoczek_druzyna natural JOIN skoczek WHERE idDruzyny = :id");
		if(!($result = $q->execute(array(':id' => $this->idDruzyny)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	public function getNagroda()
	{
		$q = $this->db->prepare("SELECT * FROM nagroda_druzyna natural JOIN nagroda WHERE idDruzyny = :id");
		if(!($result = $q->execute(array(':id' => $this->idDruzyny)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
}