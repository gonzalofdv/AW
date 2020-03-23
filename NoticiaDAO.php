<?php

require_once('NoticiaTransfer.php');
require_once('DAO.php');

class NoticiaDAO extends DAO{

	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public Noticia getNoticia($idNoticia) {
		$sql = "SELECT * from Noticias where IdNoticia = '$idNoticia'";
		$consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$n = new NoticiaTransfer($obj->CodUsuario, $obj->CodLiga, $obj->Titular, $obj->Texto);
		
		return $n;
	}
	
	public insert(NoticiaTransfer $n){
		
		$codUsuario = n->getCodUsuario();
		$codLiga = n->getCodLiga();
		$texto = n->getTexto();
		$titular = n->getTitular();
		
		$sql = "INSERT into Noticias (CodUsuario, CodLiga, Texto, Titular) values ('$codUsuario', '$codLiga', '$texto', '$titular')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public update(NoticiaTransfer $n){
		$sql = "UPDATE Noticias SET CodUsuario = '$n->getCodUsuario()', CodLiga = '$n->getCodLiga()', Texto = '$n->getTexto()', Titular = '$n->getTitular()'
		WHERE IdNoticia LIKE '$n->getIdNoticia()'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public delete(NoticiaTransfer $n){
		$sql = "DELETE Noticias where IdNoticia = '$n->getIdNoticia()'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
}
	
?>