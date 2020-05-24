<?php session_start();
require_once('include/sa/ComentarioSA.php');

$idComent = $_POST['comentId'];

$comentarioSA = new ComentarioSA();
$comentarioSA->sumarLike($idComent);

$numero=$comentarioSA->getLikes($idComent);
$aux = mysqli_fetch_array($numero);
echo $aux[0];
?>