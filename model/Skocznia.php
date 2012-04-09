<?php
class Model_Skocznia extends lib_model{
	public function getSkiJumps($limit = 30, $offset = 0){
		$s = $this->db->prepare("SELECT * FROM skocznia LIMIT 30 OFFSET 0");
		$s->execute();
		return $s;
	}
	public function getSkiJump($id){
		$s = $this->db->prepare('SELECT * FROM skocznia WHERE idSkoczni = :id LIMIT 1');
		$s->bindParam(':id',$id,PDO::PARAM_INT);
		$s->execute();
		return $s->fetchObject("Model_Skocznia");
	}
	
	
	public function getZawody()
	{
		
		$q = $this->db->prepare("SELECT distinct nazwa, sezon FROM arbiter_skocznia_sezon WHERE idSkoczni = :id order by sezon");
		if(!($result = $q->execute(array(':id' => $this->idSkoczni)))) {
			print_r($this->db->errorInfo());
		} else {
			return $q;
		}
	}
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE skocznia SET `nazwa` = :nazwa, `miasto` = :miasto, `punktKonstrukcyjny` =:punktK, `rekordSkoczni`=:rekord WHERE idSkoczni = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_INT);
			$q->bindParam(':nazwa', $post['nazwa'], PDO::PARAM_STR);
			$q->bindParam(':miasto', $post['miasto'], PDO::PARAM_STR);
			$q->bindParam(':punktK', $post['punktK'], PDO::PARAM_STR);
			$q->bindParam(':rekord', $post['rekord'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
}