<?php
require_once('NoticiaTransfer.php');
require_once('DAO.php');

class NoticiaDAO extends DAO{

	public function __construct(){
		parent::__construct();
	}

	//Metodos
	public Noticia getNoticia($idNoticia) {
		$sql = "SELECT * from Noticias where id = '$idNoticia'";
		$consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
		
		$n = new NoticiaTransfer($obj->CodUsuario, $obj->CodLiga, $obj->Titular, $obj->'Texto');
		
		return $n;
	}
	
	public insert(NoticiaTransfer $n){
		$sql = "INSERT into Noticias (CodUsuario, CodLiga, Texto, Titular) values ('$n->idNoticia', '$n->codLiga','$n->texto', '$n->titular')";
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public update(NoticiaTransfer $n){
		$sql = "UPDATE Noticias SET CodUsuario = '$n->codUsuario', CodLiga = '$n->codLiga', Texto = '$n->texto', Titular = '$n->titular'
		WHERE IdNoticia LIKE '$n->idNoticia'"; 
		$consulta = mysqli_query($this->db, $sql);
	}
	
	public delete(NoticiaTransfer $n){
		$sql = "DELETE Noticias where id = '$n->id'"; 
		mysqli_query($this->db, $sql);
		$consulta = mysqli_query($this->db, $sql);
	}
	
}
	
?>