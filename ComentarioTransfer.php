<?php
class ComentarioTransfer{
	//Atributos de la clase Comentario
	private $codNoticia;
	private $codUsuario;
	private $comentario;
	
	public function __construct($codNoticia, $codUsuario, $comentario) {
		$this->codNoticia = $codNoticia;
		$this->codUsuario = $codUsuario;
		$this->comentario = $comentario;
    }
	
	public function getCodNoticia(){
		return $this->codNoticia;
	}

	public function setCodNoticia($codNoticia){
		$this->codNoticia = $codNoticia;
	}
	
	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario = $codUsuario;
	}
	
	public function getComentario(){
		return $this->comentario;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}
	
}
?>