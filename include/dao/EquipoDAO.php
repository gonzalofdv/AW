<?php
require $_SERVER['DOCUMENT_ROOT'].'/elvarderindecorner/include/transfer/EquipoTransfer.php'; 
require_once('DAO.php');

class EquipoDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public function getEquipo($idEquipo) {
		$sql = "SELECT * from Equipos where IdEquipo = '$idEquipo'";
		$consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$e = new EquipoTransfer($obj->CodLiga, $obj->Puntos, $obj->GolesAFavor, $obj->GolesEnContra, $obj->Escudo);
		
		return $e;
	}
	
	public function insert(EquipoTransfer $e){
		
		$codLiga = $e->getCodLiga();
		$puntos = $e->getPuntos();
		$golesAFavor = $e->getGolesAFavor();
		$golesEnContra = $e->getGolesEnContra();
		$escudo = $e->getEscudo();
		
		$sql = "INSERT into Equipos (CodLiga, Puntos, GolesAFavor, GolesEnContra, Escudo) values ('$codLiga', '$puntos', '$golesAFavor', '$golesEnContra', '$escudo')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function update(EquipoTransfer $e){
		$sql = "UPDATE Equipos SET CodLiga = '$e->getCodLiga()', Puntos = '$e->getPuntos()', GolesAFavor = '$e->golesAFavor()', GolesEnContra = '$e->getGolesEnContra()',
		Escudo = '$e->getEscudo()' WHERE IdEquipo LIKE '$e->getIdEquipo()'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function delete(EquipoTransfer $e){
		$sql = "DELETE Equipos where IdEquipo = '$e->getIdEquipo()'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
}

?>