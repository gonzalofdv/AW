<?php session_start(); 
require_once(__DIR__.'include/transfer/UsuarioSA.php');
require_once(__DIR__.'include/transfer/UsuarioTransfer.php');

$nom=$_POST['nom'];
$ape1=$_POST['apellido1'];
$ape2=$_POST['apellido2'];
$sex=$_POST['sexo'];
$equipo=$_POST['equipo'];
$usu=$_POST['usu'];
$pass=$_POST['contrasena'];
$rpass=$_POST['rContrasena'];
$mail=$_POST['mail'];
$condi=$_POST['condi'];


	if((!empty($nom)) && (!empty($ape1)) && (!empty($ape2)) && (!empty($sex)) && (!empty($equipo)) && (!empty($usu)) && (!empty($pass)) && (!empty($rpass)) && (!empty($mail)) && (!empty($condi))){
		if($pass==$rpass){
			$p = new UsuarioTransfer($nom, $ape1, $ape2, $sex, $equipo, $usu, $pass, $mail, 0, 0, 0);
			$usuarioSA = new UsuarioSA();
			$anadido=$usuarioSA ->newUsuario($p);
			if($anadido){
				header('Location: mostrarAlertas.php?codAlerta=8');
			}
			else{
				header('Location: mostrarAlertas.php?codAlerta=9');
			}
		}
	    else{
			header('Location: mostrarAlertas.php?codAlerta=10');
		}
    }
	else{
		header('Location: mostrarAlertas.php?codAlerta=11');
	}
?>