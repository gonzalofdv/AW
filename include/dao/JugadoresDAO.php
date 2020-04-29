<?php
require_once('DAO.php');

class JugadoresDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	public function getJugador($idJugador) {
		$db = $this->db;
		
		$idLiga = mysqli_real_escape_string($db, $idJugador);
		
		$sql = "SELECT * from jugadores where IdJugador = '$idJugador'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		return $obj;
    }
    	
}

?>