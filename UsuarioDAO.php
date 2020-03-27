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

	public function esAdmin($usu){
		$db=$this->db;
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

	public function insertarUsuario(UsuarioTransfer $usuario){
		$db=$this->db;

		$nombre = $usuario->getNom();
		$ap1 = $usuario->getApellido1();
		$ap2 = $usuario->getApellido2();
		$sexo = $usuario->getSexo();
		$equipo = $usuario->getEquipo();
		$usu = $usuario->getUsu();
		$pass = $usuario->getContrasena();
		$email = $usuario->getMail();
		$esAdmin = $usuario->getEsAdmin();
		$familia = $usuario->getEsFamilia();
		$puntos = $usuario->getPuntos();

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
		$sql = "SELECT IdUsuario FROM usuarios WHERE NombreUsuario = '$usu'";
		$consulta = mysqli_query($db, $sql);
		
		return $res=$consulta->fetch_object();
	}

	public function obtenerNombreUsu($idUsu){
		$db = $this->db;
		$sql = "SELECT NombreUsuario FROM usuarios WHERE IdUsuario = '$idUsu'";
		$consulta = mysqli_query($db, $sql);

		return $obj = $consulta->fetch_object();
	}

	//funcion para llamar al user y obtener sus datos
	public function getUsuario($nombre) {
		
		$db = $this->db;
		$sql = "SELECT * from usuarios where NombreUsuario = '$nombre'";
		$consulta = mysqli_query($db, $sql);
		
        return  $obj = $consulta->fetch_object();
    }

    public function sumarPuntos($idUsu,$puntos){
		$db = $this->db;
		$sql = "UPDATE usuarios SET Puntos= Puntos +'$puntos' where IdUsuario = '$idUsu'";
		$consulta = mysqli_query($db, $sql);
    }

    public function canjearFamilia($nombreUsu){
    	$db = $this->db;
    	$sql = "SELECT Puntos FROM  usuarios WHERE NombreUsuario = '$nombreUsu'";
    	$consulta = mysqli_query($db, $sql);
    	$obj = $consulta->fetch_object();
    	if($obj->Puntos >= 200){
    		$sql2 = "UPDATE usuarios SET Puntos = Puntos - 200 WHERE NombreUsuario = '$nombreUsu'";
    		mysqli_query($db, $sql2);
    		
    		$sql3 = "UPDATE usuarios SET SomosFamilia = 1 WHERE NombreUsuario = '$nombreUsu'";
    		mysqli_query($db, $sql3);

    		return true;
    	}
    	else{
    		return false;
    	}
    }
        
}

?>