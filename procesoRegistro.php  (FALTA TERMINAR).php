<?php

$nom=$_POST['nom'];
$ape=$_POST['apellido1'];
$ape=$_POST['apellido2'];
$sex=$_POST['sexo'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$equipo=$_POST['equipo'];
$usu=$_POST['usu'];
$pass=$_POST['contrasena'];
$rpass=$_POST['rContrasena'];
$mail=$_POST['mail'];
$condi=$_POST['condi'];
#conectar base de datos
$db=@mysqli_connect('localhost','gonzalo', 'juancar','gonzalo');
#comprobar acceso y tal

	if((!empty($nom)) && (!empty($usu)) && (!empty($pass)) && (!empty($rpass)) && (!empty($mail)) && (!empty($condic))){
		$q = mysqli_query($db, "SELECT * FROM usuarios WHERE nombreUsu = '$usu'");
		if(mysqli_num_rows($q) == 0){
			if($pass==$rpass){
				$sql = "INSERT INTO usuarios (nombre,email,nombreUsu,contrasena,esAdmin) VALUES ('$nom', '$mail', '$usu' , '$pass' , '0')";
			    $consulta=@mysqli_query($db, $sql);
			    echo"Registro correcto" . "<br>" . "Redireccionando en 3 segundos..";
				header("refresh:3; url=http://localhost/videoclub/index.php/");
			}
			else{
				echo"La contraseña no es correcta" . "<br>" . "Redireccionando en 3 segundos..";
				header("refresh:3; url=http://localhost/videoclub/registrar.php/");
			}
		}	
		else{
			echo"El usuario introducido ya existe" . "<br>" . "Redireccionando en 3 segundos..";
			header("refresh:3; url=http://localhost/videoclub/registrar.php/");
		}
	}
	else{
		echo"Por favor, rellene todos los campos y acepte las condiciones del servicio." . "<br>" . "Redireccionando en 3 segundos..";
		header("refresh:3; url=http://localhost/videoclub/registrar.php/");
	}
?>