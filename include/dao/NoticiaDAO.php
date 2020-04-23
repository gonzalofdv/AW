<?php
require_once './include/transfer/NoticiaTransfer.php'; 
require_once('DAO.php');

class NoticiaDAO extends DAO{

	public function getNoticia($idNoticia) {
		$db = $this->db;
		$idNoticia= mysqli_real_escape_string($idNoticia);

		$sql = "SELECT * from Noticias where IdNoticia = '$idNoticia'";
		$consulta = mysqli_query($db, $sql);
        if($consulta){
            $obj = $consulta->fetch_object();
        }
        if(!$obj){
        	$n = "Noticia no encontrada";
        	return $n;
        }
		else{
			$n = new NoticiaTransfer($obj->CodUsuario, $obj->CodLiga, $obj->Titular, $obj->Texto, $obj->Foto);
			return $n;
		}
	}
	
	public function insert(NoticiaTransfer $n){
		$db = $this->db;
		
		$codUsuario = $n->getCodUsuario();
		$codUsuario= mysqli_real_escape_string($codUsuario);
		$codLiga = $n->getCodLiga();
		$codLiga= mysqli_real_escape_string($codLiga);
		$texto = $n->getTexto();
		$texto= mysqli_real_escape_string($texto);
		$titular = $n->getTitular();
		$titular= mysqli_real_escape_string($titular);
		$foto = $n->getFoto();
		$foto= mysqli_real_escape_string($foto);

		$sql = "INSERT INTO noticias (CodUsuario, CodLiga, Texto, Titular, Foto) VALUES ('$codUsuario', '$codLiga', '$titular', '$texto', '$foto')";
		$consulta = mysqli_query($db, $sql);
		if($consulta){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function update($idNoticia, $titular, $cuerpo, $codLiga){
		$db = $this->db;
		$idNoticia= mysqli_real_escape_string($idNoticia);
		$codLiga= mysqli_real_escape_string($codLiga);
		$texto= mysqli_real_escape_string($texto);
		$titular= mysqli_real_escape_string($titular);
		$sql = "UPDATE noticias SET CodLiga = '$codLiga', Texto = '$cuerpo', Titular = '$titular' WHERE IdNoticia LIKE '$idNoticia'"; 
		$consulta = mysqli_query($db, $sql);
	}
	
	public function delete($idNoticia){
		$db = $this->db;
		$idNoticia= mysqli_real_escape_string($idNoticia);
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