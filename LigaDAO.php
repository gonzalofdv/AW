<?php

require_once('LigaTransfer.php');
require_once('DAO.php');

class LigaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public LigaTransfer getLiga($idLiga) {
		$sql = "SELECT * from Ligas where IdLiga = '$idLiga'";
		$consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$l = new EquipoTransfer($obj->Nombre, $obj->Pais, $obj->NEquipos);
		
		return $l;
	}
	
	public insert(EquipoTransfer $l){
		
		$nombre = l->getNombre();
		$pais = l->getPais();
		$nEquipos = l->getNEquipos();
		
		$sql = "INSERT into Ligas (Nombre, Pais, NEquipos) values ('$nombre', '$pais', '$nEquipos')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public update(EquipoTransfer $l){
		$sql = "UPDATE Ligas SET Nombre = '$l->getNombre()', Pais = '$l->getPais()', NEquipos = '$l->getNEquipos()' 
		WHERE IdLiga LIKE '$l->getIdLiga()'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public delete(EquipoTransfer $l){
		$sql = "DELETE Ligas where IdLiga= '$l->getIdLiga()'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
}

?>