<?php
require_once('NoticiaDAO.php');

class NoticiaSA {

	// Atributos
    protected $noticiaDAO;
	
	public function insertNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->insert($noticia);
	}
	
	public function updateNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->update($noticia);
	}
	
	public function deleteNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->delete($noticia);
	}
	
}
	
?>