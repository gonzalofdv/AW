<?php
require_once('./include/dao/NoticiaDAO.php');
require_once('./include/transfer/NoticiaTransfer.php');

class NoticiaSA {

    protected $noticiaDAO;
	
    public function getNoticia($idNoticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		return $aux->getNoticia($idNoticia);    	
    }

	public function insertNoticia(NoticiaTransfer $noticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		return $aux->insert($noticia);
	}
	
	public function updateNoticia($idNoticia, $titular, $cuerpo, $codLiga){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->update($idNoticia, $titular, $cuerpo, $codLiga);
	}
	
	public function deleteNoticia($idNoticia){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->delete($idNoticia);
	}

	public function devuelveNoticias($codLiga){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$res = $aux->devuelveNoticias($codLiga);

		return $res;
	}
	
}

?>