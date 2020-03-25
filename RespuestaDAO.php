<?php

require_once('RespuestaTransfer.php');
require_once('DAO.php');

class RespuestaDAO extends DAO{

	public function __construct(){
		parent::__construct();
	}


    public function getRespuesta($idRespuesta){
        
        //no se si es Respuestas el nom en bbdd
        //IdRespuesta es el id generado en bbdd? 

        $sql = "SELECT * from Respuestas where IdRespuesta = '$idRespuesta'";
        $consulta = mysqli_query($this->db, $sql);

        if($consulta){
            $obj = $consulta->fetch_object();
        }

        $r = new RespuestaTransfer($obj->CodPregunta, $obj->Respuesta, $obj->Correcta);

        return $r;
    }
    
    public function insert(RespuestaTransfer $r){
        $codPregunta = r->getCodPregunta();
        $respuesta = r->getRespuesta();
        $correcta = r->getCorrecta();


        $sql = "INSERT into Respuestas (CodPregunta, Respuesta, Correcta)
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
	
	public function delete(NoticiaTransfer $n){
		$sql = "DELETE Noticias where IdNoticia = '$n->getIdNoticia()'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}


}

?>













	