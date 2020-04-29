<?php
session_start(); 
if($_SESSION['votos']==6){
	header("Location:mostrarAlertas.php?codAlerta=28");
}
else{

require_once ('include/sa/UsuarioSA.php');
require_once ('include/sa/OpcionesSA.php');

$i=htmlspecialchars($_GET['i']);
$aux="vot".$i."";
$idOp=htmlspecialchars($_POST[$aux]);
	

$usuarioSA=new UsuarioSA();
$consulta = $usuarioSA->obtenerId($_SESSION['nombre']); 
$idUsuario=$consulta->IdUsuario;
$usuarioSA->sumarPuntos($idUsuario,3);
$_SESSION['votos']+=1;


$opcionesSA = new OpcionesSA();
$opcionesSA->sumarVoto($idOp);

header("Location:index.php");
}

?>