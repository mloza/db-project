<?php
class Skoczek {
}

class Model_Skoczek extends lib_Model {
	
	public function getJumpers($limit = 30, $offset = 0)
	{
		$q = $this->db->prepare('SELECT * FROM skoczek LIMIT 30 OFFSET 0');
		$q->execute();
		return  $q;
	}
}