<?php session_start();
require_once('include/sa/LigaSA.php');
$codLiga=$_POST['codLiga'];

$ligasa = new LigaSA();
$res=$ligasa->getNombreLiga($codLiga);

echo '<h1>¡Juega y diviértete con el Quiz de la '.$res->Nombre.'!</h1>';
echo '<h2>Recuerda que también puedes acceder a la sección completa desde el menú principal</h2>';
if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	echo '<button class="botGen" onclick=location.href="mostrarQuiz.php" disabled>¡Empezar Quiz '.$res->Nombre.'!</button>';	
}
else{
	echo '<button class="botGen" id="centrarBoton" onclick=location.href="mostrarQuiz.php?liga='.$codLiga.'">¡Empezar Quiz '.$res->Nombre.'!</button>';
}


?>