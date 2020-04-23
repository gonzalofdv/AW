<?php
require_once './include/transfer/LigaTransfer.php'; 
require_once('DAO.php');

class LigaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public function getLiga($idLiga) {
		$db = $this->db;
		
		$idLiga = mysqli_real_escape_string($db, $idLiga);
		
		$sql = "SELECT * from ligas where IdLiga = '$idLiga'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$l = new LigaTransfer($obj->Nombre, $obj->Pais, $obj->NEquipos);
		
		return $l;
	}
	
	public function insert(LigaTransfer $l){
		$db = $this->db;
		
		$nombre = $l->getNombre();
		$pais = $l->getPais();
		$nEquipos = $l->getNEquipos();
		
		$nombre = mysqli_real_escape_string($db, $nombre);
		$pais = mysqli_real_escape_string($db, $pais);
		$nEquipos = mysqli_real_escape_string($db, $nEquipos);
		
		$sql = "INSERT into Ligas (Nombre, Pais, NEquipos) values ('$nombre', '$pais', '$nEquipos')";
		$consulta = mysqli_query($db, $sql);
	}
	
	public function update(LigaTransfer $l){
		$db = $this->db;
		
		$idLiga = $l->getIdLiga();
		$nombre = $l->getNombre();
		$pais = $l->getPais();
		$nEquipos = $l->getNEquipos();
		
		$idLiga = mysqli_real_escape_string($db, $idLiga);
		$nombre = mysqli_real_escape_string($db, $nombre);
		$pais = mysqli_real_escape_string($db, $pais);
		$nEquipos = mysqli_real_escape_string($db, $nEquipos);
		
		$sql = "UPDATE Ligas SET Nombre = '$nombre', Pais = '$pais', NEquipos = '$nEquipos' 
		WHERE IdLiga LIKE '$idLiga'";
		$consulta = mysqli_query($db, $sql);
	}
	
	public function delete(LigaTransfer $l){
		$db = $this->db;
		
		$idLiga = $l->getIdLiga();
		$idLiga = mysqli_real_escape_string($db, $idLiga);
		
		$sql = "DELETE Ligas where IdLiga= '$idLiga'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($db, $sql);
	}
	
	public function devuelveLigaDAO(){
		$db = $this->db;
		$sql = "SELECT * FROM ligas";
		$res = mysqli_query($db, $sql);
		return $res;
	}

	public function getNombreLiga($idLiga){
		$db = $this->db;
		
		$idLiga = mysqli_real_escape_string($db, $idLiga);
		
		$sql = "SELECT Nombre from ligas where IdLiga = '$idLiga'";
		$consulta = mysqli_query($db, $sql);
        
        return $obj = $consulta->fetch_object();
	}
}

?>