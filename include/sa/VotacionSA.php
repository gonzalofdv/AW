<?php
require_once('./include/dao/VotacionDAO.php');
require_once('./include/transfer/VotacionTransfer.php');

class VotacionSA {

	protected $votacionDAO;

	

	public function getVotacion($codLiga){
		if(!$this->votacionDAO){
			$this->votacionDAO = new VotacionDAO();
		}
		$aux = $this->votacionDAO;
		$res = $aux->getVotacion($codLiga);
		return $res;
	}

	
}

?>