<?php
class Model_Nagroda extends lib_model{
	public function getPrizes($limit = 30, $offset = 0){
		$p = $this->db->prepare("SELECT * FROM nagroda LIMIT 30 OFFSET 0");
		$p->execute();
		return $p;
	}
	
	public function getPrize($id){
		$p = $this->db->prepare('SELECT * FROM nagroda WHERE idNagrody =:id LIMIT 1');
		$p->bindParam(':id',$id,PDO::PARAM_INT);
		$p->execute();
		return $p->fetchObject("Model_Nagroda");
	}
	
	public function getSkoczek()
	{
		$q = $this->db->prepare("SELECT * FROM nagroda_skoczek natural JOIN skoczek WHERE idNagrody = :id");
		if(!($result = $q->execute(array(':id' => $this->idNagrody)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE nagroda SET `nazwaNagrody` = :nazwaNagrody, `wartosc` = :wartosc WHERE idNagrody = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':nazwaNagrody', $post['nazwaNagrody'], PDO::PARAM_STR);
			$q->bindParam(':wartosc', $post['wartosc'], PDO::PARAM_INT);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
	
}