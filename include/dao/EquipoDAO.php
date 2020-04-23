<?php
require_once './include/transfer/EquipoTransfer.php'; 
require_once('DAO.php');

class EquipoDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public function getEquipo($idEquipo) {
		$idEquipo = mysql_real_escape_string($idEquipo);
		
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
		
		$codLiga = mysql_real_escape_string($codLiga);
		$puntos = mysql_real_escape_string($puntos);
		$golesAFavor = mysql_real_escape_string($golesAFavor);
		$golesEnContra = mysql_real_escape_string($golesEnContra);
		$escudo = mysql_real_escape_string($escudo);
		
		$sql = "INSERT into Equipos (CodLiga, Puntos, GolesAFavor, GolesEnContra, Escudo) values ('$codLiga', '$puntos', '$golesAFavor', '$golesEnContra', '$escudo')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function update(EquipoTransfer $e){
		
		$idEquipo = $e->getIdEquipo();
		$codLiga = $e->getCodLiga();
		$puntos = $e->getPuntos();
		$golesAFavor = $e->getGolesAFavor();
		$golesEnContra = $e->getGolesEnContra();
		$escudo = $e->getEscudo();
		
		$idEquipo = mysql_real_escape_string($idEquipo);
		$codLiga = mysql_real_escape_string($codLiga);
		$puntos = mysql_real_escape_string($puntos);
		$golesAFavor = mysql_real_escape_string($golesAFavor);
		$golesEnContra = mysql_real_escape_string($golesEnContra);
		$escudo = mysql_real_escape_string($escudo);
		
		$sql = "UPDATE Equipos SET CodLiga = '$codLiga', Puntos = '$puntos', GolesAFavor = '$golesAFavor', GolesEnContra = '$golesEnContra',
		Escudo = '$escudo' WHERE IdEquipo LIKE '$idEquipo'";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function delete(EquipoTransfer $e){
		$idEquipo = $e->getIdEquipo();
		$idEquipo = mysql_real_escape_string($idEquipo);
		
		$sql = "DELETE Equipos where IdEquipo = '$idEquipo'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
}

?>