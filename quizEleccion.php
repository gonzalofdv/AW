<?php session_start();
require_once('include/sa/LigaSA.php');
$codLiga=$_POST['codLiga'];

$ligasa = new LigaSA();
$res=$ligasa->getNombreLiga($codLiga);

if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
	echo '<button class="botGen" onclick=location.href="mostrarQuiz.php" disabled>¡Empezar Quiz '.$res->Nombre.'!</button>';	
}
else{
	echo '<button class="botGen" onclick=location.href="mostrarQuiz.php?liga='.$codLiga.'">¡Empezar Quiz '.$res->Nombre.'!</button>';
}


?>