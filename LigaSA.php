<?php

class LigaSA {
	
	// Atributos
    protected $ligaDAO;
	
	public function newLiga(LigaTransfer $liga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		ligaDAO->insert($liga);
	}
	
	public function updateLiga(LigaTransfer $liga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		ligaDAO->update($liga);
	}
	
	public function deleteLiga(LigaTransfer $liga){
		if(!$this->ligaDAO){
			$this->ligaDAO = new LigaDAO();
		}
		ligaDAO->delete($liga);
	}
	
}

?>