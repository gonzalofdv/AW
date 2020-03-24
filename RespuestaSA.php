<?php
require_once('RespuestaDAO.php');
class RespuestaSa{
    proteted $respuestaDAO;

    public function newRespuesta(RespuestaTransfer $respuesta){
        if(!$this->respuestaDAO){
            $this->respuestaDAO = new RespuestaDAO();
        }

        respuestaDAO->insert($respuesta);
    }

    public function updateRespuesta(RespuestaTransfer $respuesta){
        if(!$this->respuestaDAO){
            $this->respuestaDAO = new RespuestaDAO();
        }

        respuestaDAO->update($respuesta);
    }

    public function deleteRespuesta(RespuestaTransfer $respuesta){
        if(!$this->respuestaDAO){
            $this->respuestaDAO = new RespuestaDAO();
        }

        respuestaDAO->deleta($respuesta);
    }

}
?>