<?php

class VotacionTransfer {
	private $titulo="";
	private $codLiga="";

	public function __construct($titulo, $codLiga){
		$this->titulo = $Votacion;
		$this->codLiga = $codLiga;
	}
	
	public function getVotacion(){
		return $this->votacion;
	}

	public function setVotacion($votacion){
		$this->Votacion = $votacion;
	}

	public function getCodLiga(){
		return $this->codLiga;
	}

	public function setCodLiga($codLiga){
		$this->codLiga = $codLiga;
	}
}

?>