<?php
require_once('DAO.php');

class OpcionesDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getOpciones($id) {
		$db=$this->db;
        $id = mysqli_real_escape_string($db,$id);
		$sql = "SELECT * from opcionesvotacion where CodVotacion = '$id'";
		$consulta = mysqli_query($this->db, $sql);
		return $consulta;
	}

	public function sumarVoto($id) {
		$db=$this->db;
        $id = mysqli_real_escape_string($db,$id);
		$sql = "UPDATE opcionesvotacion SET NumVotos=NumVotos + 1  where IdOpcion = '$id'";
		$consulta = mysqli_query($this->db, $sql);
	}	
}

?>