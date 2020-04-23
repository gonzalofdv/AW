<?php
require_once './include/transfer/EquipoTransfer.php'; 
require_once('DAO.php');

class EquipoDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public function getEquipo($idEquipo) {
		$db = $this->db;
		
		$idEquipo = mysqli_real_escape_string($db, $idEquipo);
		
		$sql = "SELECT * from Equipos where IdEquipo = '$idEquipo'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$e = new EquipoTransfer($obj->CodLiga, $obj->Puntos, $obj->GolesAFavor, $obj->GolesEnContra, $obj->Escudo);
		
		return $e;
	}
	
	public function insert(EquipoTransfer $e){
		$db = $this->db;
		
		$codLiga = $e->getCodLiga();
		$puntos = $e->getPuntos();
		$golesAFavor = $e->getGolesAFavor();
		$golesEnContra = $e->getGolesEnContra();
		$escudo = $e->getEscudo();
		
		$codLiga = mysqli_real_escape_string($db, $codLiga);
		$puntos = mysqli_real_escape_string($db, $puntos);
		$golesAFavor = mysqli_real_escape_string($db, $golesAFavor);
		$golesEnContra = mysqli_real_escape_string($db, $golesEnContra);
		$escudo = mysqli_real_escape_string($db, $escudo);
		
		$sql = "INSERT into Equipos (CodLiga, Puntos, GolesAFavor, GolesEnContra, Escudo) values ('$codLiga', '$puntos', '$golesAFavor', '$golesEnContra', '$escudo')";
		$consulta = mysqli_query($db, $sql);
	}
	
	public function update(EquipoTransfer $e){
		$db = $this->db;
		
		$idEquipo = $e->getIdEquipo();
		$codLiga = $e->getCodLiga();
		$puntos = $e->getPuntos();
		$golesAFavor = $e->getGolesAFavor();
		$golesEnContra = $e->getGolesEnContra();
		$escudo = $e->getEscudo();
		
		$idEquipo = mysqli_real_escape_string($db, $idEquipo);
		$codLiga = mysqli_real_escape_string($db, $codLiga);
		$puntos = mysqli_real_escape_string($db, $puntos);
		$golesAFavor = mysqli_real_escape_string($db, $golesAFavor);
		$golesEnContra = mysqli_real_escape_string($db, $golesEnContra);
		$escudo = mysqli_real_escape_string($db, $escudo);
		
		$sql = "UPDATE Equipos SET CodLiga = '$codLiga', Puntos = '$puntos', GolesAFavor = '$golesAFavor', GolesEnContra = '$golesEnContra',
		Escudo = '$escudo' WHERE IdEquipo LIKE '$idEquipo'";
		$consulta = mysqli_query($db, $sql);
	}
	
	public function delete(EquipoTransfer $e){
		$db = $this->db;
		
		$idEquipo = $e->getIdEquipo();
		$idEquipo = mysqli_real_escape_string($db, $idEquipo);
		
		$sql = "DELETE Equipos where IdEquipo = '$idEquipo'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($db, $sql);
	}
	
}

?>