<?php
require_once('./include/dao/JugadoresDAO.php');

class JugadoresSA {
	
	// Atributos
    protected $jugadorDAO;

	public function devuelveJugadorSA(){
		if(!$this->jugadorDAO){
			$this->jugadorDAO = new JugadoresDAO();
		}
		$aux = $this->jugadorDAO;
		$res = $aux->devuelveJugadorSA();

		return $res;
	}

	public function getNombreJugador($idJugador){
		if(!$this->jugadorDAO){
			$this->jugadorDAO = new JugadoresDAO();
		}
		$aux = $this->jugadorDAO;
		$res = $aux->getNombreJugador($idJugador);

		return $res;
	}
	
}

?>