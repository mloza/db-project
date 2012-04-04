<?php

class Controller_Skoczek extends lib_controller {
		
	public function index() {
		print_r($this->model->getJumpers()->fetchObject());
	}
}