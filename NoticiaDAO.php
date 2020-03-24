<?php

require_once('NoticiaTransfer.php');
require_once('DAO.php');

class NoticiaDAO extends DAO{

	/*public function __construct(){
		parent::__construct();
	}*/

	//Metodos
	public function getNoticia($idNoticia) {
		$db = $this->db;
		$sql = "SELECT * from Noticias where IdNoticia = '$idNoticia'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$n = new NoticiaTransfer($obj->CodUsuario, $obj->CodLiga, $obj->Titular, $obj->Texto);
	}
	
	public function insert(NoticiaTransfer $n){
		$db = $this->db;
		
		$codUsuario = $n->getCodUsuario();
		$codLiga = $n->getCodLiga();
		$texto = $n->getTexto();
		$titular = $n->getTitular();
		
		$sql = "INSERT INTO noticias (CodUsuario, CodLiga, Texto, Titular) VALUES ('$codUsuario', '$codLiga', '$texto', '$titular')";
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
		$sql = "UPDATE Noticias SET CodUsuario = '$n->getCodUsuario()', CodLiga = '$n->getCodLiga()', Texto = '$n->getTexto()', Titular = '$n->getTitular()'
		WHERE IdNoticia LIKE '$n->getIdNoticia()'"; 
		$consulta = mysqli_query($db, $sql);
	}
	
	public function delete(NoticiaTransfer $n){
		$db = $this->db;
		$sql = "DELETE Noticias where IdNoticia = '$n->getIdNoticia()'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($db, $sql);
	}
	
}
	
?>