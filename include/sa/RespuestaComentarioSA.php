<?php

require_once('./include/dao/RespuestaComentarioDAO.php');
require_once('./include/transfer/RespuestaComentarioTransfer.php');

class RespuestaComentarioSA {

	protected $respcomDAO;

	public function anyadir($idComentario, $texto, $idUsu){
		if(!$this->respcomDAO){
			$this->respcomDAO = new RespuestaComentarioDAO();
		}
		$aux = $this->respcomDAO;
		return $aux->anyadir($idComentario, $texto, $idUsu);
	}

	public function recoger($idComentario){
		if(!$this->respcomDAO){
			$this->respcomDAO = new RespuestaComentarioDAO();
		}
		$aux = $this->respcomDAO;
		return $aux->recoger($idComentario);
	}

	public function borrarRespuestas($idComentario){
		if(!$this->respcomDAO){
			$this->respcomDAO = new RespuestaComentarioDAO();
		}
		$aux = $this->respcomDAO;
		$aux->borrarRespuestas($idComentario);
	}

	public function borrarRespuestasUsu($idUsu){
		if(!$this->respcomDAO){
			$this->respcomDAO = new RespuestaComentarioDAO();
		}
		$aux = $this->respcomDAO;
		$aux->borrarRespuestasUsu($idUsu);
	}
}

?>