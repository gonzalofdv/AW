<?php
require_once './include/transfer/RespuestaTransfer.php'; 

require_once('DAO.php');

class RespuestaDAO extends DAO{

	public function __construct(){
		parent::__construct();
	}


    public function getRespuestas($idPregunta){
		$db=$this->db;
    	$idPregunta = mysqli_real_escape_string($db,$idPregunta);
        $sql = "SELECT * from respuestas where CodPregunta = '$idPregunta'";
        $consulta = mysqli_query($this->db, $sql);
        return $consulta;
    }
    
    public function insert(RespuestaTransfer $r){
    	$db=$this->db;
        $codPregunta = $r->getCodPregunta();
        $codPregunta = mysqli_real_escape_string($db,$codPregunta);
        $respuesta = $r->getRespuesta();
        $respuesta = mysqli_real_escape_string($db,$respuesta);
        $correcta = $r->getCorrecta();
        $correcta= mysqli_real_escape_string($db,$correcta);


        $sql = "INSERT into respuestas (CodPregunta, Respuesta, Correcta)
        VALUES ('$codPregunta','$respuesta','$correcta')";

        $consulta = mysqli_query($this->db, $sql);
    }

    public function update(RespuestaTransfer $r){
    	$db=$this->db;
        $codPregunta = $r->getCodPregunta();
        $codPregunta = mysqli_real_escape_string($db,$codPregunta);
        $respuesta = $r->getRespuesta();
        $respuesta = mysqli_real_escape_string($db,$respuesta);
        $correcta = $r->getCorrecta();
        $correcta= mysqli_real_escape_string($db,$correcta);



        $sql = "UPDATE Respuestas SET CodPregunta = '$codPregunta', Respuesta = '$respuesta', Correcta = '$correcta'
        WHERE IdRespuesta LIKE '$r->getIdRespuesta()'";
        
        $consulta = mysqli_query($this->db, $sql);
    }

    public function delete(RespuestaTransfer $r){
    	$db=$this->db;
    	$respuesta = $r->getRespuesta();
        $respuesta = mysqli_real_escape_string($db,$respuesta);
        $sql = "DELETE Respuestas where IdRespuesta = '$respuesta'";
        mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
    }

}

?>