<?php
class LigaTransfer{
	//Atributos
	private $idLiga;
	private $nombre;
	private $pais;
	private $nEquipos;
	
	//Constructor
	public function __construct($nombre, $pais, $nEquipos) {
		this->nombre = $nombre;
		this->pais = $pais;
		this->nEquipos = $nEquipos;
	}
	
	public function getIdLiga(){
		return $this->idLiga;
	}

	public function setIdLiga($idLiga){
		$this->idLiga = $idLiga;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPais(){
		return $this->pais;
	}

	public function setPais($pais){
		$this->pais = $pais;
	}

	public function getNEquipos(){
		return $this->nEquipos;
	}

	public function setNEquipos($nEquipos){
		$this->nEquipos = $nEquipos;
	}
	
}
?>