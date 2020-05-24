<?php session_start();

require_once('include/sa/RespuestaComentarioSA.php');
require_once('include/sa/UsuarioSA.php');

$idComentario = $_POST['idComentario'];
$texto = $_POST['texto'];
$usuario = $_SESSION['nombre'];

//primero con $usuario habria que obtener el id del usuario
$usuariosa = new UsuarioSA();
$idUsu = $usuariosa->obtenerId($usuario)->IdUsuario;

$respcomentSA = new RespuestaComentarioSA();
$respcomentSA->anyadir($idComentario, $texto, $idUsu);

$todos = $respcomentSA->recoger($idComentario);

$html = "<table class='tablaComent'>";
$html .= "<tr id='trComent'>";
$html .= "<th id='thComent'><b>Usuario</b></th>";
$html .= "<th id='thComent'><b>Comentario</b></th>";
$html .= "</tr>";

while($aux = mysqli_fetch_array($todos)){
	$usuarioAux = $usuariosa->obtenerNombreUsu($aux[2]);

	$html .= '<tr id="trComent">';
	$html .= '<td class="comentarios">'.$usuarioAux->NombreUsuario.'</td>';
	$html .= '<td class="comentarios">'.$aux[3].'</td>';
	$html .= '</tr>';

}

$html .= '</table>';

echo $html;

?>