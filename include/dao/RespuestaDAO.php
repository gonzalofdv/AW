<?php
require_once './include/transfer/RespuestaTransfer.php'; 

require_once('DAO.php');

class RespuestaDAO extends DAO{

	public function __construct(){
		parent::__construct();
	}


    public function getRespuestas($idPregunta){
        $sql = "SELECT * from respuestas where CodPregunta = '$idPregunta'";
        $consulta = mysqli_query($this->db, $sql);
        return $consulta;
    }
    
    public function insert(RespuestaTransfer $r){
        $codPregunta = $r->getCodPregunta();
        $respuesta = $r->getRespuesta();
        $correcta = $r->getCorrecta();


        $sql = "INSERT into respuestas (CodPregunta, Respuesta, Correcta)
        VALUES ('$codPregunta','$respuesta','$correcta')";

        $consulta = mysqli_query($this->db, $sql);
    }

    public function update(RespuestaTransfer $r){
        
        $sql = "UPDATE Respuestas SET CodPregunta = '$r->getCodPregunta()', Respuesta = '$r->getRespuesta()', Correcta = '$r->getCorrecta()'
        WHERE IdRespuesta LIKE '$r->getIdRespuesta()'";
        
        $consulta = mysqli_query($this->db, $sql);
    }

    public function delete(RespuestaTransfer $r){

        $sql = "DELETE Respuestas where IdRespuesta = '$r->getIdRespuesta()'";
        mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
    }

}

?>