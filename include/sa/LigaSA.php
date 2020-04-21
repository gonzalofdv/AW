<?php
require_once('LigaTransfer.php');
require_once('LigaDAO.php');
class LigaSA {
	
	// Atributos
    protected $ligaDAO;
	
	public function newLiga(LigaTransfer $liga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		$aux = $this->ligaDAO;
		$aux->insert($liga);
	}
	
	public function updateLiga(LigaTransfer $liga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		$aux = $this->ligaDAO;
		$aux->update($liga);
	}
	
	public function deleteLiga(LigaTransfer $liga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		$aux = $this->ligaDAO;
		$aux->delete($liga);
	}

	public function devuelveLigaSA(){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		$aux = $this->ligaDAO;
		$res = $aux->devuelveLigaDAO();

		return $res;
	}

	public function getNombreLiga($idLiga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		$aux = $this->ligaDAO;
		$res = $aux->getNombreLiga($idLiga);

		return $res;
	}
	
}

?>