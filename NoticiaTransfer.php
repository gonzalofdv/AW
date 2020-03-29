<?php
class noticiaTransfer{
	//Atributos de la clase Noticia
	private $titular;
	private $texto;
	private $codUsuario;
	private $codLiga;
	private $foto;

	//Constructor
	public function __construct($codUsuario, $codLiga, $titular, $texto, $foto) {
        $this->codUsuario = $codUsuario;
        $this->codLiga = $codLiga;
        $this->texto = $texto;
		$this->titular = $titular;
		$this->foto = $foto;
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
	
	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}
}
?>