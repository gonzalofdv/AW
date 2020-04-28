<?php
require_once './include/transfer/VotacionTransfer.php'; 
require_once('DAO.php');

class VotacionDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getVotacion($codLiga){
		$db=$this->db;
		$cod=mysqli_real_escape_string($db, $codLiga);
		$sql = "SELECT Titulo FROM Votaciones WHERE CodLiga = '$cod'";
		$consulta = mysqli_query($db, $sql);
		return $res=$consulta->fetch_object();
	}
}

?>