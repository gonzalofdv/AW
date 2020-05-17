<?php
require_once './include/transfer/ComentarioTransfer.php'; 
require_once('DAO.php');

class ComentarioDAO extends DAO{

	//Metodos
	
	public function insert(ComentarioTransfer $c){
		$db = $this->db;
		
		$codUsuario = $c->getCodUsuario();
		$codNoticia = $c->getCodNoticia();
		$comentario = $c->getComentario();
		
		$codUsuario = mysqli_real_escape_string($db, $codUsuario);
		$codNoticia = mysqli_real_escape_string($db, $codNoticia);
		$comentario = mysqli_real_escape_string($db, $comentario);
		
		$sql = "INSERT INTO comentarios (CodNoticia, CodUsuario, Comentario) VALUES ('$codNoticia', '$codUsuario', '$comentario')";
		$consulta = mysqli_query($db, $sql);
		if($consulta){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function delete($idNoticia){
		$db = $this->db;
		
		$idNoticia = mysqli_real_escape_string($db, $idNoticia);
		
		$sql = "DELETE FROM comentarios WHERE CodNoticia = '$idNoticia'"; 
		$consulta = mysqli_query($db, $sql);
		if($consulta){
			return true;
		}
		else{
			return false;
		}
	}

	public function devuelveComentarios($idNoticia){
		$db = $this->db;
		
		$idNoticia = mysqli_real_escape_string($db, $idNoticia);
		
		$sql = "SELECT * FROM comentarios WHERE CodNoticia LIKE '$idNoticia'";
		$consulta = mysqli_query($db, $sql);
		return $consulta;
	}

	public function existenComentarios($idNoticia){
		$db = $this->db;
		
		$idNoticia = mysqli_real_escape_string($db, $idNoticia);
		
		$sql = "SELECT * FROM comentarios WHERE CodNoticia LIKE '$idNoticia'";
		$consulta = mysqli_query($db, $sql);
		$num= mysqli_num_rows($consulta);
		if($num>0){
			return true;
		}
		else{
			return false;
		}	
	}

	public function borrarComentarioConcreto($idComentario){
		$db = $this->db;
		
		$idComentario = mysqli_real_escape_string($db, $idComentario);
		
		$sql = "DELETE FROM comentarios WHERE IdComentario = '$idComentario'"; 
		$consulta = mysqli_query($db, $sql);
	}

	public function borrarComentariosUsuario($idUsu){ //borra los comentarios de un usuario
		$db = $this->db;
		$idUsu = mysqli_real_escape_string($db, $idUsu);
		
		$sql = "DELETE FROM comentarios WHERE CodUsuario = '$idUsu'"; 
		$consulta = mysqli_query($db, $sql);
	}
	
}
	
?>