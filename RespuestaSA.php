<?php
require_once('RespuestaDAO.php');
class RespuestaSa{
    proteted $respuestaDAO;

    public function newRespuesta(RespuestaTransfer $respuesta){
        if(!$this->respuestaDAO){
            $this->respuestaDAO = new RespuestaDAO();
        }

       // respuestaDAO->insert($respuesta);
        $aux = $this->respuestaDAO;
		return $aux->insert($respuesta);
    }

    public function updateRespuesta(RespuestaTransfer $respuesta){
        if(!$this->respuestaDAO){
            $this->respuestaDAO = new RespuestaDAO();
        }

       // respuestaDAO->update($respuesta);
         $aux = $this->respuestaDAO;
		return $aux->update($respuesta);
       
    }

    public function deleteRespuesta(RespuestaTransfer $respuesta){
        if(!$this->respuestaDAO){
            $this->respuestaDAO = new RespuestaDAO();
        } 

       // respuestaDAO->deleta($respuesta);
         $aux = $this->respuestaDAO;
		return $aux->delete($respuesta);
    }

}
?>