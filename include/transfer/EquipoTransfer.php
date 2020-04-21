<?php
class EquipoTransfer{
	//Atributos de la clase Equipo
	private $idEquipo;
	private $codLiga;
	private $puntos;
	private $golesAFavor;
	private $golesEnContra;
	private $escudo;
	
	//Constructor
	public function __construct($codLiga, $puntos, $golesAFavor, $golesEnContra, $escudo) {
		$this->codLiga = $codLiga;
		$this->puntos = $puntos;
		$this->golesAFavor = $golesAFavor;
		$this->golesEnContra = $golesEnContra;
		$this->escudo = $escudo;
    }
	
	public function getIdEquipo(){
		return $this->idEquipo;
	}

	public function setIdEquipo($idEquipo){
		$this->idEquipo = $idEquipo;
	}

	public function getCodLiga(){
		return $this->codLiga;
	}

	public function setCodLiga($codLiga){
		$this->codLiga = $codLiga;
	}

	public function getPuntos(){
		return $this->puntos;
	}

	public function setPuntos($puntos){
		$this->puntos = $puntos;
	}

	public function getGolesAFavor(){
		return $this->golesAFavor;
	}

	public function setGolesAFavor($golesAFavor){
		$this->golesAFavor = $golesAFavor;
	}

	public function getGolesEnContra(){
		return $this->golesEnContra;
	}

	public function setGolesEnContra($golesEnContra){
		$this->golesEnContra = $golesEnContra;
	}

	public function getEscudo(){
		return $this->escudo;
	}

	public function setEscudo($escudo){
		$this->escudo = $escudo;
	}
}
?>