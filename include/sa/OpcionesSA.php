<?php
require_once('./include/dao/OpcionesDAO.php');

class OpcionesSA {

	protected $opcionesDAO;

	public function getOpciones($idVotacion){
		if(!$this->opcionesDAO){
			$this->opcionesDAO = new OpcionesDAO();
		}
		$aux = $this->opcionesDAO;
		$res = $aux->getOpciones($idVotacion);
		
		return $res;
	}

	public function sumarVoto($idOpcion){
		if(!$this->opcionesDAO){
			$this->opcionesDAO = new OpcionesDAO();
		}
		$aux = $this->opcionesDAO;
		$res = $aux->sumarVoto($idOpcion);
	}
}

?>