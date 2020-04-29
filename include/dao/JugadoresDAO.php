<?php
require_once('DAO.php');

class JugadoresDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}

	public function getJugador($idJugador) {
		$db = $this->db;
		
		$idJugador = mysqli_real_escape_string($db, $idJugador);
		
		$sql = "SELECT * from jugadores where IdJugador = '$idJugador'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		return $obj;
    }

    public function getApodo($idJugador) {
		$db = $this->db;
		
		$idJugador = mysqli_real_escape_string($db, $idJugador);
		
		$sql = "SELECT Apodo from jugadores where IdJugador = '$idJugador'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		return $obj;
    }
    	
}

?>