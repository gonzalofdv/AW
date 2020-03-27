<?php session_start(); 
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');


$usu=$_POST['usuario']; //El post es el que pillas de login
$pass=$_POST['password'];



if((!empty($usu)) && (!empty($pass))){
	$p = new UsuarioTransfer("", "", "", "", "", $usu,$pass,"", 0, 0, 0); //Constructora UsuarioTransfer, pasándole solo estosatributos se inicia sesión
	$usuarioSA = new UsuarioSA();
	$check= $usuarioSA ->checkUsuario($p);
		if(!$check){
			$_SESSION['login']=True;
			$_SESSION['nombre'] = $usu;
			$checkAd=$usuarioSA -> checkAdmin($usu);
			if($checkAd){
				$_SESSION['esAdmin']=true;
			}
			else{
				$_SESSION['esAdmin']=false;
			}
			$checkFam=$usuarioSA->checkFamilia($usu);
			if($checkFam){
				$_SESSION['esFamilia']=true;
			}
			else{
				$_SESSION['esFamilia']=false;
			}
			
			echo"Usuario correcto" . "<br>" . "Redireccionando en 3 segundos..";
			header("refresh:3; url=index.php");
		}
		else{
			echo"El usuario introducido no existe" . "<br>" . "Redireccionando en 3 segundos..";
			header("refresh:3; url=login.php");
		}
}
else{
	echo"Por favor, rellene todos los campos y acepte las condiciones del servicio." . "<br>" . "Redireccionando en 3 segundos..";
	header("refresh:3; url=registro.php");
}

?>