<?php
class ComentarioTransfer{

	private $codNoticia;
	private $codUsuario;
	private $comentario;
	private $likes;
	
	public function __construct($codNoticia, $codUsuario, $comentario,$likes) {
		$this->codNoticia = $codNoticia;
		$this->codUsuario = $codUsuario;
		$this->comentario = $comentario;
		$this->likes = $likes;
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

	public function getLikes(){
		return $this->likes;
	}

	public function setLikes($likes){
		$this->likes = $likes;
	}
	
}
?>