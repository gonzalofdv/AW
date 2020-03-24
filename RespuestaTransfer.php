<?php
class RespuestaTransfer{
    private $codPregunta;
    private $respuesta;
    private $correcta;
    private $idRespuesta;


    //Constructor

    public function __contruct($codPregunta, $respuesta, $correcta){
        $this->codPregunta = $codPregunta;
        $this->respuesta = $respuesta;
        $this->correcta = $correcta;
    }

    //getters y setters
    public function getCodPregunta(){
        return $this->codPregunta;
    }

    public function setCodPregunta($codPregunta){
        $this->codPregunta = $codPregunta;
    }
    public function getRespuesta(){
        return $this->respuesta;
    }

    public function setRespuesta($respuesta){
        $this->respuesta = $respuesta;
    }

    public function getCorrecta(){
        return $this->correcta;
    }

    public function setCorrecta($correcta){
        $this->correcta = $correcta;
    }
    public function getIdRespuesta(){
		return $this->idRespuesta;
	}

	public function setIdRespuesta($idRespuesta){
		$this->idRespuesta = $idRespuesta;
	}
}

?>