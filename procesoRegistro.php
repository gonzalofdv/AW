<?php
require_once('UsuarioSA.php');
require_once('UsuarioTransfer.php');

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
			$p = new UsuarioTransfer();
			$p->nom = "$nom";
			$p->apellido1 = "$ape1";
			$p->apellido2 = "$ape2";
			$p->sexo = "$sex";
			$p->equipo = "$equipo";
			$p->usu = "$usu";
			$p->contrasena= "$pass";
			$p->mail = "$mail";
			$p->esAdmin = "0";
			$p->esFamilia = "0";
			$usuarioSA = new UsuarioSA();
			$anadido=$usuarioSA ->newUsuario($p);
				if($anadido){
					echo"Usuario registrado correctamente." . "<br>" . "Redireccionando en 3 segundos..";
					header("refresh:3; url=http://localhost/elvarderindecorner/registro.php/");
				}
				else{
					echo"El usuario introducido ya existe" . "<br>" . "Redireccionando en 3 segundos..";
					header("refresh:3; url=http://localhost/elvarderindecorner/registro.php/");
				}
		}
	    else{
				echo"La contraseña no es correcta" . "<br>" . "Redireccionando en 3 segundos..";
				header("refresh:3; url=http://localhost/elvarderindecorner/registro.php/");
		}
    }
	else{
		echo"Por favor, rellene todos los campos y acepte las condiciones del servicio." . "<br>" . "Redireccionando en 3 segundos..";
		header("refresh:3; url=http://localhost/elvarderindecorner/registro.php/");
	}
?>