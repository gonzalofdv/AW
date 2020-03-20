<?php
require_once('NoticiaTransfer.php');

//Metodos

	public Noticia getNoticia($idNoticia) {
		$noticiaArray =  SelectArray("SELECT * from Noticias where id = '$id'"); 
		
		$n = new NoticiaTransfer();
		$n->idNoticia = $n['IdNoticia'];
		$n->codUsuario = $n['CodUsuario'];
		$n->codLiga = $n['CodLiga'];
		$n->titular = $n['Titular'];
		$n->texto= $n['Texto'];
		
		return $n;
	}
	
	public insert(NoticiaTransfer $n){
		$query("INSERT into Noticias (IdNoticia, CodUsuario, CodLiga, Texto, Titular) values ('$n->idNoticia', '$n->codUsuario', '$n->codLiga','$n->texto', '$n->titular')");
	}
	
	public update(NoticiaTransfer $n){
		$query("UPDATE Noticias SET CodUsuario = '$n->codUsuario', CodLiga = '$n->codLiga', Texto = '$n->texto', Titular = '$n->titular'
		WHERE IdNoticia LIKE '$n->idNoticia'";); 
	}
	
	public delete(NoticiaTransfer $n){
		$query("DELETE Noticias where id = '$n->id'"); 
	}
	
?>