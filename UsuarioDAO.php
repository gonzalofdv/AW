<?php
require_once('UsuarioTransfer.php');
require_once('DAO.php');

class UsuarioDAO extends DAO{

	public function comprobarUsuario(UsuarioTransfer $usuario){
		$db=$this->db;

		$usu = $usuario->getUsu();
		$sql = "SELECT * FROM usuarios WHERE NombreUsuario LIKE '$usu'";
		$consulta = mysqli_query($db, $sql);
		$info = $consulta->fetch_object();
		if(!$info){
			//si no existe usuario con ese nombre ya
			return true;
		}
		else{ //si ya existe ese usuario
			return false;
		}
	}

	public function insertarUsuario(UsuarioTransfer $usuario){
		$db=$this->db;

		$nombre = $usuario->getNom();
		$ap1 = $usuario->getApellido1();
		$ap2 = $usuario->getApellido2();
		$sexo = $usuario->getSexo();
		$equipo = $usuario->getEquipo();
		$usu = $usuario->getUsu();
		$pass = $usuario->getContrasena();
		$email = $usuario->getEmail();
		$esAdmin = $usuario->getEsAdmin();
		$familia = $usuario->getEsFamilia();

		$sql = "INSERT INTO usuarios (Nombre, Apellido1, Apellido2, Sexo, EquipoFavorito, NombreUsuario, Contrasena, Email, Administrador, SomosFamilia) VALUES ('$nombre', '$ap1', '$ap2', '$sexo', '$equipo', '$usu', '$pass', '$email', '$esAdmin', '$familia')";
		$consulta = mysqli_query($db, $sql);
		if($consulta){
			return true;
		} 
		else{
			return false;
		}
	}
}