<?php

require_once('PrgeuntaTransfer.php');
require_once('DAO.php');

class PreguntaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}
	
	//Metodos
	public function getPregunta($idPregunta) {
		$sql = "SELECT * from Noticias where IdPregunta = '$idPregunta'";
		$consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$n = new PreguntaTransfer($obj->pregunta, $obj->codLiga);
		
		return $n;
	}
	
	public function insert(PreguntaTransfer $n){
		
		$codLiga = n->getCodLiga();
		$pregunta = n->getPregunta();
		
		$sql = "INSERT into Preguntas (Pregunta, CodLiga) values ('$pregunta', '$codLiga')";
		$consulta = mysqli_query($this->db, $sql);
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
	
	
}

?>