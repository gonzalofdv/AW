<?php session_start(); 
$usuario=$_SESSION['nombre'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Perfil</title>
</head>

<body>

<div id="contenedor">


	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
		<h1>Perfil de Usuario</h1>
		<?php
			$usuarioSa = new UsuarioSA();
			$perfil = $usuarioSA->getUsuario($usuario);
			echo "<b>Usuario: </b>" . $perfil->nom . "<br>";
			echo "<b>Nombre: </b>" . $perfil->apellido1 . $perfil->apellido2 . "<br>";
			echo "<b>Sexo: </b>" . $perfil->sexo . "<br>";
			echo "<b>Tu equipo: </b>" . $perfil->equipo . "<br>";
			echo "<b>Mail: </b>" . $perfil->mail . "<br>";
			echo "<b>Usuario SomosFamilia: </b>" . if($perfil->esFamilia){echo"SI";}else{echo"NO";} . "<br>";
			echo "<b>Puntos conseguidos: </b>" . $perfil->puntos . "<br>";
		?>
		

	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>

</div>

</body>
</html>