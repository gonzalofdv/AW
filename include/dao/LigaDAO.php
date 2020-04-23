<?php
require_once './include/transfer/LigaTransfer.php'; 
require_once('DAO.php');

class LigaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public function getLiga($idLiga) {
		$idLiga = mysql_real_escape_string($idLiga);
		
		$sql = "SELECT * from ligas where IdLiga = '$idLiga'";
		$consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$l = new LigaTransfer($obj->Nombre, $obj->Pais, $obj->NEquipos);
		
		return $l;
	}
	
	public function insert(LigaTransfer $l){
		
		$nombre = $l->getNombre();
		$pais = $l->getPais();
		$nEquipos = $l->getNEquipos();
		
		$nombre = mysql_real_escape_string($nombre);
		$pais = mysql_real_escape_string($pais);
		$nEquipos = mysql_real_escape_string($nEquipos);
		
		$sql = "INSERT into Ligas (Nombre, Pais, NEquipos) values ('$nombre', '$pais', '$nEquipos')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function update(LigaTransfer $l){
		
		$idLiga = $l->getIdLiga();
		$nombre = $l->getNombre();
		$pais = $l->getPais();
		$nEquipos = $l->getNEquipos();
		
		$idLiga = mysql_real_escape_string($idLiga);
		$nombre = mysql_real_escape_string($nombre);
		$pais = mysql_real_escape_string($pais);
		$nEquipos = mysql_real_escape_string($nEquipos);
		
		$sql = "UPDATE Ligas SET Nombre = '$nombre', Pais = '$pais', NEquipos = '$nEquipos' 
		WHERE IdLiga LIKE '$idLiga'";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function delete(LigaTransfer $l){
		$idLiga = $l->getIdLiga();
		
		$idLiga = mysql_real_escape_string($idLiga);
		
		$sql = "DELETE Ligas where IdLiga= '$idLiga'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function devuelveLigaDAO(){
		$db = $this->db;
		$sql = "SELECT * FROM ligas";
		$res = mysqli_query($db, $sql);
		return $res;
	}

	public function getNombreLiga($idLiga){
		$idLiga = mysql_real_escape_string($idLiga);
		
		$sql = "SELECT Nombre from ligas where IdLiga = '$idLiga'";
		$consulta = mysqli_query($this->db, $sql);
        
        return $obj = $consulta->fetch_object();
	}
}

?>