<?php
require_once('NoticiaDAO.php');
require_once('NoticiaTransfer.php');

class NoticiaSA {

	// Atributos
    protected $noticiaDAO;
	
	public function insertNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		return $aux->insert($noticia);
	}
	
	public function updateNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->update($noticia);
	}
	
	public function deleteNoticia($idNoticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->delete($idNoticia);
	}

	public function devuelveNoticias(){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$res = $aux->devuelveNoticias();

		return $res;
	}
	
}

?>