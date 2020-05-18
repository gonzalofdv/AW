<?php
session_start();
require_once('include/sa/UsuarioSA.php');

$codEquipo = $_POST['lista2'];
$usuario = $_SESSION['nombre'];

$usuariosa = new UsuarioSA();
$usuariosa->updateEquipo($codEquipo, $usuario);

header("Location: mostrarPerfil.php");

//al usuario actual, le editamos el campo equipo favorito, por el nuevo codEquipo y ya está, y redireccionamos a la pagina de perfil para que se vea como se ha puesto la foto del equipo

?>