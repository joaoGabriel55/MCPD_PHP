<?php
class Propriedades extends Controller{
	protected function Index(){
		$viewmodel = new PropriedadeModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'propriedades');
		}
		$viewmodel = new PropriedadeModel();
		$this->returnView($viewmodel->add(), true);
	}
}