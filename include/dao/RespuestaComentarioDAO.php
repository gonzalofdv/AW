<?php
require_once './include/transfer/RespuestaComentarioTransfer.php';
require_once('DAO.php');

class RespuestaComentarioDAO extends DAO{
	public function anyadir($idComentario, $texto, $idUsu){
		$db = $this->db;

		$idComentario = mysqli_real_escape_string($db, $idComentario);
		$texto = mysqli_real_escape_string($db, $texto);
		$idUsu = mysqli_real_escape_string($db, $idUsu);

		$sql = "INSERT INTO respuestascomentario (CodComentario, CodUsuario, Texto) VALUES ('$idComentario', '$idUsu', '$texto')";
		return $consulta = mysqli_query($db, $sql);
	}

	public function recoger($idComentario){
		$db = $this->db;

		$idComentario = mysqli_real_escape_string($db, $idComentario);

		$sql = "SELECT * FROM respuestascomentario WHERE CodComentario = '$idComentario'";

		return $consulta = mysqli_query($db, $sql);
	}

	public function borrarComentarios($idComentario){
		$db = $this->db;

		$idComentario = mysqli_real_escape_string($db, $idComentario);

		$sql = "DELETE FROM respuestascomentario WHERE CodComentario = '$idComentario'";

		$consulta = mysqli_query($db, $sql);
	}

	public function borrarComentariosUsu($idUsu){
		$db = $this->db;

		$idUsu = mysqli_real_escape_string($db, $idUsu);

		$sql = "DELETE FROM respuestascomentario WHERE CodUsuario = '$idUsu'";

		$consulta = mysqli_query($db, $sql);
	}
}