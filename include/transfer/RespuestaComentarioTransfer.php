<?php
class RespuestaComentarioTransfer {

	private $codComentario;
	private $codUsuario;
	private $texto;

	public function __construct($codComentario, $codUsuario, $texto){
		$this->codComentario = $codComentario;
		$this->codUsuario = $codUsuario;
		$this->texto = $texto;
	}

	public function getCodComentario(){
		return $this->codComentario;
	}

	public function setCodComentario(){
		$this->codComentario = $codComentario;
	}

	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario = $codUsuario;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($comentario){
		$this->texto = $texto;
	}	
}

?>