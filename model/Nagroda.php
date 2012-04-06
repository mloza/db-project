<?php
class Model_Nagoda extends lib_model{
	public function getPrizes($limit = 30, $offset = 0){
		$p = $this->db->prepare("SELECT * FROM nagroda LIMIT 30 OFFSET 0");
		$p->execute();
		return $p;
	}
	
	public function getPrize($id){
		$p = $this->db->prepare('SELECT * FROM nagroda WHERE idNagrody =:id LIMIT 1');
		$p->bindParam(':id',$id,PDO::PARAM_INT);
		$p->execute();
		return $p->fetchObject();
	}
}