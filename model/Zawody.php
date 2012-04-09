<?php
class Model_Zawody extends Lib_model{
	public function getContests($limit = 30, $offset = 0){
		$m = $this->db->prepare("SELECT * FROM zawody LIMIT 30 OFFSET 0");
		if(!$m->execute()) {
			print_r($m->errorInfo());
			print_r($m);
		}
		return $m;
	}
	
	public function getContest($nazwa = NULL){
		$m = $this->db->prepare('SELECT * FROM zawody WHERE nazwa=:nazwa LIMIT 1');
		$m->bindParam(':nazwa', $nazwa, PDO::PARAM_STR);
		$m->execute();
		return $m->fetchObject();
	}
	
	public function update($id, $post)
	{
		try {
			$q = $this->db->prepare("UPDATE trener SET `nazwa` = :nazwa, `typ` = :typ WHERE nazwa = :id LIMIT 1");
			$q->bindParam(':id', $id, PDO::PARAM_STR);
			$q->bindParam(':typ', $post['typ'], PDO::PARAM_STR);
			$q->execute();
			return 0;
		} catch(Exception $e) {
			return $e->getMessgae();
		}
	}
}