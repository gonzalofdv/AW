<?php

require_once('PreguntaTransfer.php');
require_once('DAO.php');

class PreguntaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}
	
	//Metodos
	public function getPregunta($rand) {
		$sql = "SELECT Pregunta from preguntas where IdPregunta = '$rand'";
		$consulta = mysqli_query($this->db, $sql);
		$res=$consulta->fetch_object();
		return $res;
	}
	
	public function insert(PreguntaTransfer $n){
		
		$codLiga = $n->getCodLiga();
		$pregunta = $n->getPregunta();
		
		$sql = "INSERT into preguntas (Pregunta, CodLiga) values ('$pregunta', '$codLiga')";
		$consulta = mysqli_query($this->db, $sql);
		
		if($consulta){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function update(PreguntaTransfer $n){
		$sql = "UPDATE Preguntas SET Pregunta = '$n->getPregunta()', CodLiga = '$n->getCodLiga()' WHERE IdPregunta LIKE '$n->getIdPregunta()'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function delete(PreguntaTransfer $n){
		$sql = "DELETE Preguntas where IdPregunta = '$n->getIdPregunta()'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function obtenerId(PreguntaTransfer $n){
		$db=$this->db;
		$idP = $n->getPregunta(); 
		$sql = "SELECT IdPregunta FROM preguntas WHERE Pregunta = '$idP'"; 
		$consulta = mysqli_query($db, $sql);
		
		return $obj = $consulta->fetch_object();
	}

	public function getNumPreguntas(){
		$db=$this->db;
		$sql = "SELECT count(*) FROM preguntas"; 
		$consulta=mysqli_query($db,$sql);
		$result = $consulta->fetch_array();
		$res = intval($result[0]);
		return $res;
	}
}

?>