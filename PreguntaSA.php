<?php

require_once('PreguntaDAO.php');
require_once('PreguntaTransfer.php');

class PreguntaSA {

	protected $preguntaDAO;

	public function newPregunta(PreguntaTransfer $preg){
		if(!$this->preguntaDAO){
			$this->preguntaDAO = new PreguntaDAO();
		}
		$aux = $this->preguntaDAO;
		return $aux->insert($preg);
	}
}

?>