<?php
require_once('../dao/ComentarioDAO.php');
require_once('../transfer/ComentarioTransfer.php');

class ComentarioSA {

	// Atributos
    protected $comentarioDAO;
	
	public function insertComentario(ComentarioTransfer $comentario){
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		return $aux->insert($comentario);
	}
	
	public function updateComentario(ComentarioTransfer $comentario){
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		$aux->update($comentario);
	}
	
	public function deleteComentario($idNoticia){ //borra todos los comentarios de una noticia
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		$aux->delete($idNoticia);
	}

	public function devuelveComentarios($idNoticia){
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		$res = $aux->devuelveComentarios($idNoticia);

		return $res;
	}

	public function existenComentarios($idNoticia){
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		$res= $aux->existenComentarios($idNoticia);
		return $res;
	}

	public function borrarComentarioConcreto($idComentario){ //borra uno solo
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		$res= $aux->borrarComentarioConcreto($idComentario);
	}
	
}

?>