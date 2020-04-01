<?php

class PreguntaTransfer {
	private $pregunta="";
	private $codLiga="";

	public function __construct($pregunta, $codLiga){
		$this->pregunta = $pregunta;
		$this->codLiga = $codLiga;
	}
	
	public function getPregunta(){
		return $this->pregunta;
	}

	public function setPregunta($pregunta){
		$this->pregunta = $pregunta;
	}

	public function getCodLiga(){
		return $this->codLiga;
	}

	public function setCodLiga($codLiga){
		$this->codLiga = $codLiga;
	}
}

?>