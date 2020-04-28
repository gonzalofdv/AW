<?php
require_once('./include/dao/VotacionDAO.php');
require_once('./include/transfer/VotacionTransfer.php');

class VotacionSA {

	protected $votacionDAO;

	public function insertVotacion($vot){
		if(!$this->VotacionDAO){
			$this->VotacionDAO = new VotacionDAO();
		}
		$aux = $this->VotacionDAO;
		return $aux->insert($vot);
	}
	
	public function getIdVotacion($vot){
		if(!$this->VotacionDAO){
			$this->VotacionDAO = new VotacionDAO();
		}
		$aux = $this->VotacionDAO;
		$res = $aux->obtenerId($vot);
		
		return $res;
	}

	public function getNumVotacions(){
		if(!$this->VotacionDAO){
			$this->VotacionDAO = new VotacionDAO();
		}
		$aux = $this->VotacionDAO;
		$res = $aux->getNumVotacions();
		
		return $res;
	}

	

	public function getVotacion($codLiga){
		if(!$this->VotacionDAO){
			$this->VotacionDAO = new VotacionDAO();
		}
		$aux = $this->VotacionDAO;
		$res = $aux->getVotacion($codLiga);
		return $res;
	}

	
}

?>