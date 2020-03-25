<?php
require_once('UsuarioDAO.php');
require_once('UsuarioTransfer.php');

class UsuarioSA {

	// Atributos
    protected $usuarioDAO;
	
	public function newUsuario(UsuarioTransfer $usuario){
		if(!$this->usuarioDAO){
			$this->usuarioDAO = new UsuarioDAO();
		}
		$aux = $this->usuarioDAO;
		if($aux->comprobarUsuario($usuario)){
			return $aux->insertarUsuario($usuario);
		}
		else{
			return false;
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
	
}
	
?>