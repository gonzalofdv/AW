<?php
require_once('./include/dao/UsuarioDAO.php');
require_once('./include/transfer/UsuarioTransfer.php');

class UsuarioSA {

	// Atributos
    protected $usuarioDAO;
	
	public function newUsuario(UsuarioTransfer $usuario){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		if($aux->comprobarUsuarioRepe($usuario)){
			return false;
		}
		else{
			return $aux->insertarUsuario($usuario);
		}
	}

	public function checkUsuario(UsuarioTransfer $usuario){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		if($aux->comprobarUsuario($usuario)){
			return true;
		}
		else{
			return false;
		}

	}
	
	public function checkAdmin($usu){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		if($aux->esAdmin($usu)){
			return true;
		}
		else{
			return false;
		}
	}

	public function checkFamilia($usu){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		if($aux->esFamilia($usu)){
			return true;
		}
		else{
			return false;
		}
	}

	public function updateUsuario(){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$usuarioDAO->update($usuario);
	}
	
	public function deleteUsuario(){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$usuarioDAO->delete($usuario);
	}
	
	public function obtenerId($usu){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		$res = $aux->obtenerId($usu);
		
		return $res;
	}

	public function obtenerNombreUsu($idUsu){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		$res = $aux->obtenerNombreUsu($idUsu);
		
		return $res;
	}

	public function getUsuario($nombre){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}

		$aux = $this->usuarioDAO;
		$res = $aux->getUsuario($nombre);

		return $res;
	}

	public function sumarPuntos($idUsu,$puntos){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		$aux->sumarPuntos($idUsu,$puntos);
	}
	
	public function canjearFamilia($nombreUsu){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		return $aux->canjearFamilia($nombreUsu);		
	}

	public function devuelveRanking(){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		return $aux->devuelveRanking();
	}

	public function compruebaPassword($password){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		return $aux->compruebaPassword();
	}

	public function updateEquipo($codEquipo){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		return $aux->updateEquipo($codEquipo);
	}

	public function borrarUsuario($codUsu){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		$aux->borrarUsuario($codUsu);
	}

}
	
?>