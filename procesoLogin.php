<?php session_start(); 
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');


$usu=$_POST['usuario']; //El post es el que pillas de login
$pass=$_POST['password'];



if((!empty($usu)) && (!empty($pass))){
	$p = new UsuarioTransfer("", "", "", "", "", $usu,$pass,"", 0, 0); //Constructora UsuarioTransfer, pasándole solo estosatributos se inicia sesión
	$usuarioSA = new UsuarioSA();
<<<<<<< HEAD
	$check= $usuarioSA ->checkUsuario($p);
		if(!$check){
			$_SESSION['login']=True;
			$_SESSION['nombre'] = $usu;
		}
		else{
			echo"El usuario introducio no existe" . "<br>" . "Redireccionando en 3 segundos..";
			header("refresh:3; url=registro.php");
=======
	$check=$usuarioSA ->checkUsuario($p);
		if($check){
			$_SESSION['login'] = true;
			$_SESSION['nombre'] = $usu;
		}
		else{
				echo"El usuario introducido no existe" . "<br>" . "Redireccionando en 3 segundos..";
				header("refresh:3; url=registro.php");
>>>>>>> e367e1fa074fa49e6a1f3d04a6fd6d7de6c18542
		}
}
else{
	echo"Por favor, rellene todos los campos y acepte las condiciones del servicio." . "<br>" . "Redireccionando en 3 segundos..";
	header("refresh:3; url=registro.php");
}

?>