<?php
require_once './include/transfer/PreguntaTransfer.php'; 
require_once('DAO.php');

class PreguntaDAO extends DAO{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getPregunta($rand) {
        $rand = mysqli_real_escape_string($rand);
		$sql = "SELECT Pregunta from preguntas where IdPregunta = '$rand'";
		$consulta = mysqli_query($this->db, $sql);
		$res=$consulta->fetch_object();
		return $res;
	}
	
	public function insert(PreguntaTransfer $n){
		
		$codLiga = $n->getCodLiga();
		$codLiga= mysqli_real_escape_string($codLiga);
		$pregunta = $n->getPregunta();
		$pregunta = mysqli_real_escape_string($pregunta);

		
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
		$pregunta=$n->getPregunta();
		$pregunta= mysqli_real_escape_string($pregunta);
		$CodLiga=$n->getCodLiga();
		$codLiga= mysqli_real_escape_string($codLiga);
		$IdPregunta=$n->getIdPregunta()
		$IdPregunta= mysqli_real_escape_string($IdPregunta);
		$sql = "UPDATE Preguntas SET Pregunta = '$pregunta', CodLiga = '$CodLiga' WHERE IdPregunta LIKE '$IdPregunta'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function delete(PreguntaTransfer $n){
		$pregunta=$n->getPregunta();
		$pregunta= mysqli_real_escape_string($pregunta);
		$sql = "DELETE Preguntas where IdPregunta = '$pregunta'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public function obtenerId(PreguntaTransfer $n){
		$db=$this->db;
		$preg = $n->getPregunta();
		$preg= mysqli_real_escape_string($preg);
		$codLiga = $n->getCodLiga();
		$codLiga= mysqli_real_escape_string($codLiga);


		$sql = "SELECT IdPregunta FROM preguntas WHERE Pregunta = '$preg' AND CodLiga = '$codLiga'"; 
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