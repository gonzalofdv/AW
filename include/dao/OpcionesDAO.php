<?php
require_once('DAO.php');

class OpcionesDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getOpciones($id) {
		$db=$this->db;
        $rand = mysqli_real_escape_string($db,$rand);
		$sql = "SELECT * from opcionesvotacion where IdVotacion = '$id'";
		$consulta = mysqli_query($this->db, $sql);
		$res=$consulta;
		return $res;
	}
	
}

?>