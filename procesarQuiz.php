<?php
session_start(); 
require_once('UsuarioSA.php');


$res0 = $_POST['res0'];
$res1 = $_POST['res1'];
$res2 = $_POST['res2'];
$res3 = $_POST['res3'];
$res4 = $_POST['res4'];
$res5 = $_POST['res5'];
$res6 = $_POST['res6'];
$res7 = $_POST['res7'];
$res8 = $_POST['res8'];
$res9 = $_POST['res9'];


$puntos=0;
for($i=0;$i<10;$i++){
	if(${"res".$i}==1){
		$puntos++;
	}
}

$aciertos=$puntos;

if($puntos==10){
	$puntos+=10;
}

$usuarioSA=new UsuarioSA();
$usuarioSA->sumarPuntos($_SESSION['nombre'],$puntos);
header('Location:mostrarResultadoQuiz.php?aciertos='.$aciertos.'');

?>