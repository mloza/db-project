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
		return $a->fetchObject("Model_Arbiter");
	}
	
	

		
		public function getWyniki($sezon)
		{
			$q = $this->db->prepare("SELECT *, arbiter_skocznia_sezon.nazwa as name, skocznia.nazwa as nazwaskoczni FROM arbiter_skocznia_sezon join arbiter on(arbiter.idSedziego = arbiter_skocznia_sezon.idSedziego) join skocznia on(skocznia.idSkoczni = arbiter_skocznia_sezon.idSkoczni) where arbiter.idSedziego = :id and sezon= :sezon");
			if(!($result = $q->execute(array(':id' => $this->idSedziego, ':sezon'=>$sezon)))) {
				print_r($q->errorInfo());
			} else {
				return $q;
			}
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