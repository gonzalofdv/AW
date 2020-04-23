<?php
require_once './include/transfer/UsuarioTransfer.php'; 
require_once('DAO.php');

class UsuarioDAO extends DAO{

	public function comprobarUsuario(UsuarioTransfer $usuario){
		$db=$this->db;

		$usu = $usuario->getUsu();
		$usu = mysqli_real_escape_string($db,$usu);
		$sql = "SELECT * FROM usuarios WHERE NombreUsuario LIKE '$usu'";
		$consulta = mysqli_query($db, $sql);
		$info = $consulta->fetch_object();

		if($info){
			//si existe usuario con ese nombre ya
			//comprueba la contraseña
			$pass = $usuario->getContrasena();
			return password_verify($pass, $info->Contrasena);
		}
		else{ //si no existe ese usuario
			return false;
		}
	}

		public function comprobarUsuarioRepe(UsuarioTransfer $usuario){
		$db=$this->db;

		$usu = $usuario->getUsu();
		$usu = mysqli_real_escape_string($db,$usu);
		$sql = "SELECT * FROM usuarios WHERE NombreUsuario LIKE '$usu'";
		$consulta = mysqli_query($db, $sql);
		$info = $consulta->fetch_object();

		if($info){
			//si existe usuario con ese nombre ya
			//comprueba la contraseña
			return true;
		}
		else{ //si no existe ese usuario
			return false;
		}
	}

	public function esAdmin($usu){
		$db=$this->db;
		$usu = mysqli_real_escape_string($db,$usu);
		$sql = "SELECT Administrador FROM usuarios WHERE NombreUsuario LIKE '$usu'";
		$consulta = mysqli_query($db, $sql);
		$res = mysqli_fetch_array($consulta);

		if($res[0]==0){
			//No es admin
			return false;
		}
		else{ //es admin
			return true;
		}
	}

	public function esFamilia($usu){
		$db=$this->db;
		$usu = mysqli_real_escape_string($db,$usu);
		$sql = "SELECT SomosFamilia FROM usuarios WHERE NombreUsuario LIKE '$usu'";
		$consulta = mysqli_query($db, $sql);
		$res = mysqli_fetch_array($consulta);

		if($res[0]==0){
			//No es familia
			return false;
		}
		else{ //es familia
			return true;
		}
	}

	private static function hashPassword($password) {

        return password_hash($password, PASSWORD_DEFAULT);
    }


	public function insertarUsuario(UsuarioTransfer $usuario){
		$db=$this->db;

		$nombre = $usuario->getNom();
		$nombre = mysqli_real_escape_string($db,$nombre);
		$ap1 = $usuario->getApellido1();
		$ap1 = mysqli_real_escape_string($db,$ap1);
		$ap2 = $usuario->getApellido2();
		$ap2 = mysqli_real_escape_string($db,$ap2);
		$sexo = $usuario->getSexo();
		$sexo = mysqli_real_escape_string($db,$sexo);
		$equipo = $usuario->getEquipo();
		$equipo = mysqli_real_escape_string($db,$equipo);
		$usu = $usuario->getUsu();
		$usu = mysqli_real_escape_string($db,$usu);
		$passAux = $usuario->getContrasena();
		$passAux = mysqli_real_escape_string($db,$passAux);
		$email = $usuario->getMail();
		$email = mysqli_real_escape_string($db,$email);
		$esAdmin = $usuario->getEsAdmin();
		$esAdmin = mysqli_real_escape_string($db,$esAdmin);
		$familia = $usuario->getEsFamilia();
		$familia = mysqli_real_escape_string($db,$familia);
		$puntos = $usuario->getPuntos();
		$puntos = mysqli_real_escape_string($db,$puntos);

		$pass = self::hashPassword($passAux);

		$sql = "INSERT INTO usuarios (Nombre, Apellido1, Apellido2, Sexo, EquipoFavorito, NombreUsuario, Contrasena, Email, Administrador, SomosFamilia, Puntos) VALUES ('$nombre', '$ap1', '$ap2', '$sexo', '$equipo', '$usu', '$pass', '$email', '$esAdmin', '$familia', '$puntos')";
		$consulta = mysqli_query($db, $sql);

		if($consulta){
			return true;
		} 
		else{
			return false;
		}
	}
	
	public function obtenerId($usu){
		$db=$this->db;
		$usu = mysqli_real_escape_string($db,$usu);
		$sql = "SELECT IdUsuario FROM usuarios WHERE NombreUsuario = '$usu'";
		$consulta = mysqli_query($db, $sql);
		
		return $res=$consulta->fetch_object();
	}

	public function obtenerNombreUsu($idUsu){
		$db = $this->db;
		$idUsu = mysqli_real_escape_string($db,$idUsu);
		$sql = "SELECT NombreUsuario FROM usuarios WHERE IdUsuario = '$idUsu'";
		$consulta = mysqli_query($db, $sql);

		return $obj = $consulta->fetch_object();
	}

	//funcion para llamar al user y obtener sus datos
	public function getUsuario($nombre) {
		$db = $this->db;
		$nombre = mysqli_real_escape_string($db,$nombre);
		$sql = "SELECT * from usuarios where NombreUsuario = '$nombre'";
		$consulta = mysqli_query($db, $sql);
		
        return  $obj = $consulta->fetch_object();
    }

    public function sumarPuntos($idUsu,$puntos){
		$db = $this->db;
		$idUsu = mysqli_real_escape_string($db,$idUsu);
		$puntos = mysqli_real_escape_string($db,$puntos);
		$sql = "UPDATE usuarios SET Puntos= Puntos +'$puntos' where IdUsuario = '$idUsu'";
		$consulta = mysqli_query($db, $sql);
    }

    public function canjearFamilia($nombreUsu){
    	$db = $this->db;
    	$nombreUsu = mysqli_real_escape_string($db,$nombreUsu);
    	$sql = "SELECT Puntos FROM  usuarios WHERE NombreUsuario = '$nombreUsu'";
    	$consulta = mysqli_query($db, $sql);
    	$obj = $consulta->fetch_object();

    	if($obj->Puntos >= 200){    		
    		$sql3 = "UPDATE usuarios SET SomosFamilia = 1 WHERE NombreUsuario = '$nombreUsu'";
    		mysqli_query($db, $sql3);

    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public function devuelveRanking(){
    	$db = $this->db;
    	//ordena por puntos y a igualdad de puntos, en orden alfabético
    	//y solo los 10 primeros
    	$sql = "SELECT NombreUsuario, Puntos FROM usuarios WHERE Administrador = 0 ORDER BY Puntos DESC, NombreUsuario ASC LIMIT 10";
    	$consulta = mysqli_query($db, $sql);
    	return $consulta;
    }
}

?>