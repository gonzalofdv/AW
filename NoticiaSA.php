<?php
require_once('NoticiaDAO.php');

class NoticiaSA {

	// Atributos
    protected $noticiaDAO;
	
	public function newNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		noticiaDAO->insert($noticia);
	}
	
	public function updateNoticia(){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		noticiaDAO->update($noticia);
	}
	
	public function deleteNoticia(){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		noticiaDAO->delete($noticia);
	}
	
}
	
?>