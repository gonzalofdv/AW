<?php

class PreguntaTransfer {
	private $idPregunta;
	private $pregunta="";
	private $codLiga="";

	public function __construct(){}

	public function __construct($pregunta, $codLiga){
		$this->pregunta = $pregunta;
		$this->codLiga = $codLiga;
	}

	//HE PUESTO 2 CONSTRUCTORES 1 VACIO POR QUE DE MOMENTO NO SE AÑADIRAN PREGUNTAS Y OTRO LLENO PARA QUE EN EL FUTURO PODAMOS INCLUIR LA FUNCION DE QUE EL USUARIO SOMOSFAMILIA PUEDA INCLUIR PREGUNTAS (SI OS PARECE BIEN)

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
		$this->codLiga = $codLiga
	}
}

?>