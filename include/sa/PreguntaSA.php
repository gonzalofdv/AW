<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/elvarderindecorner/include/dao/PreguntaDAO.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/elvarderindecorner/include/transfer/PreguntaTransfer.php');

class PreguntaSA {

	protected $preguntaDAO;

	public function insertPregunta(PreguntaTransfer $preg){
		if(!$this->preguntaDAO){
			$this->preguntaDAO = new PreguntaDAO();
		}
		$aux = $this->preguntaDAO;
		return $aux->insert($preg);
	}
	
	public function getIdPregunta(PreguntaTransfer $preg){
		if(!$this->preguntaDAO){
			$this->preguntaDAO = new PreguntaDAO();
		}
		$aux = $this->preguntaDAO;
		$res = $aux->obtenerId($preg);
		
		return $res;
	}

	public function getNumPreguntas(){
		if(!$this->preguntaDAO){
			$this->preguntaDAO = new PreguntaDAO();
		}
		$aux = $this->preguntaDAO;
		$res = $aux->getNumPreguntas();
		
		return $res;
	}

	public function getPregunta($rand){
		if(!$this->preguntaDAO){
			$this->preguntaDAO = new PreguntaDAO();
		}
		$aux = $this->preguntaDAO;
		$res = $aux->getPregunta($rand);
		
		return $res;
	}
}

?>