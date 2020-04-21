<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/elvarderindecorner/include/transfer/LigaTransfer.php'; 
require_once('DAO.php');

class LigaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public function getLiga($idLiga) {
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
		
		$sql = "INSERT into Ligas (Nombre, Pais, NEquipos) values ('$nombre', '$pais', '$nEquipos')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function update(LigaTransfer $l){
		$sql = "UPDATE Ligas SET Nombre = '$l->getNombre()', Pais = '$l->getPais()', NEquipos = '$l->getNEquipos()' 
		WHERE IdLiga LIKE '$l->getIdLiga()'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function delete(LigaTransfer $l){
		$sql = "DELETE Ligas where IdLiga= '$l->getIdLiga()'"; 
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
		$sql = "SELECT Nombre from ligas where IdLiga = '$idLiga'";
		$consulta = mysqli_query($this->db, $sql);
        
        return $obj = $consulta->fetch_object();
	}
}

?>