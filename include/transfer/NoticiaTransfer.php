<?php
class noticiaTransfer{

	private $titular;
	private $texto;
	private $codUsuario;
	private $codLiga;
	private $foto;

	public function __construct($codUsuario, $codLiga, $titular, $texto, $foto, $nota, $votos, $votada) {
        $this->codUsuario = $codUsuario;
        $this->codLiga = $codLiga;
        $this->texto = $texto;
		$this->titular = $titular;
		$this->foto = $foto;
		$this->nota = $nota;
		$this->votos = $votos;
		$this->votada = $votada;
    }
	
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

	public function getNota(){
		return $this->nota;
	}

	public function setNota($nota){
		$this->nota = $nota;
	}

	public function getVotos(){
		return $this->votos;
	}

	public function setVotos($votos){
		$this->votos = $votos;
	}

	public function getVotada(){
		return $this->votada;
	}

	public function setVotada($votada){
		$this->votada = $votada;
	}
}
?>