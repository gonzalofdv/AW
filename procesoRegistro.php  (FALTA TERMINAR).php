<?php

$nom=$_POST['nom'];
$ape=$_POST['apellidos'];
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

	if($pass == $pass2){
		$db=@mysqli_connect('localhost','gonzalo', 'juancar','gonzalo');
		if($db){
			$sql = "INSERT INTO usuypass VALUES ('$usu', '$pass')";
			$consulta=@mysqli_query($db, $sql);
			echo '<a href="login.html">Continuar';
		}
	}
	else{
		echo"Error al introducir los datos" . "<br>";
	}
?>