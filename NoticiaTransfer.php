<?php
class noticiaTransfer{
	//Atributos de la clase Noticia
	private $titular;
	private $texto;
	private $idNoticia;
	private $codUsuario;
	private $codLiga;
	
	//Constructor
	public function __construct($codUsuario, $codLiga, $titular, $texto) {
        $this->titular = $titular;
        $this->texto = $texto;
        $this->codUsuario = $codUsuario;
        $this->codLiga = $codLiga;
    }
	
	//Getters y Setters
	public function getTitular(){
		return $this->titular;
	}

	public function setTitulo($titular){
		$this->titular = $titular;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}

	public function getIdNoticia(){
		return $this->idNoticia;
	}

	public function setIdNoticia($idNoticia){
		$this->idNoticia = $idNoticia;
	}

	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario = $codUsuario;
	}

	public function getCodLiga(){
		return $this->codLiga;
	}

	public function setCodLiga($codLiga){
		$this->codLiga = $codLiga;
	}
	
}
?>