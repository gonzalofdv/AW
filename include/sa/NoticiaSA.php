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
	
	public function borrarNoticiasUsuario($idUsu){ //borra los noticias de un usuario
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->borrarNoticiasUsuario($idUsu);
	}

	public function getNoticiasUsuario($idUsu){ //borra los noticias de un usuario
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		return $aux->getNoticiasUsuario($idUsu);
	}

	public function getNotaAndVotos($idNoticia){ //recoge la nota media y el numero de votos
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		return $aux->getNotaAndVotos($idNoticia);
	}

	public function insertarNuevaNota($idNoticia, $nuevaNota, $votos){
		if(!$this->noticiaDAO){
			$this->noticiaDAO = new NoticiaDAO();
		}
		$aux = $this->noticiaDAO;
		$aux->insertarNuevaNota($idNoticia, $nuevaNota, $votos);
	}

}

?>