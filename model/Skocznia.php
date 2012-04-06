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
		return $s->fetchObject();
	}
}