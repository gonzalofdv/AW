<?php
require_once('ComentarioDAO.php');
require_once('ComentarioTransfer.php');

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
	
	public function deleteComentario($idComentario){
		if(!$this->comentarioDAO){
			$this->comentarioDAO = new ComentarioDAO();
		}
		$aux = $this->comentarioDAO;
		$aux->delete($idComentario);
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
	
}

?>