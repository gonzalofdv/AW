<?php

require_once('NoticiaTransfer.php');
require_once('DAO.php');

class NoticiaDAO extends DAO{

	//Metodos
	public function getNoticia($idNoticia) {
		$db = $this->db;
		$sql = "SELECT * from Noticias where IdNoticia = '$idNoticia'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$n = new NoticiaTransfer($obj->CodUsuario, $obj->CodLiga, $obj->Titular, $obj->Texto, $obj->Foto);
		return $n;
	}
	
	public function insert(NoticiaTransfer $n){
		$db = $this->db;
		
		$codUsuario = $n->getCodUsuario();
		$codLiga = $n->getCodLiga();
		$texto = $n->getTexto();
		$titular = $n->getTitular();
		$foto = $n->getFoto();

		$sql = "INSERT INTO noticias (CodUsuario, CodLiga, Texto, Titular, Foto) VALUES ('$codUsuario', '$codLiga', '$titular', '$texto', '$foto')";
		$consulta = mysqli_query($db, $sql);
		if($consulta){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function update(NoticiaTransfer $n){
		$db = $this->db;
		$sql = "UPDATE Noticias SET CodUsuario = '$n->getCodUsuario()', CodLiga = '$n->getCodLiga()', Texto = '$n->getTexto()', Titular = '$n->getTitular()', Foto = '$n->getFoto()'
		WHERE IdNoticia LIKE '$n->getIdNoticia()'"; 
		$consulta = mysqli_query($db, $sql);
	}
	
	public function delete($idNoticia){
		$db = $this->db;
		$sql = "DELETE FROM noticias where IdNoticia = '$idNoticia'"; 
		$consulta = mysqli_query($db, $sql);
		if($consulta){
			return true;
		}
		else{
			return false;
		}
	}

	public function devuelveNoticias(){
		$db = $this->db;
		$sql = "SELECT * FROM noticias";
		$res = mysqli_query($db, $sql);
		return $res;
	}
	
}
	
?>