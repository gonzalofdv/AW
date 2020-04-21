<?php session_start(); 
$usuario=$_SESSION['nombre'];
require_once('include/sa/UsuarioSA.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Perfil</title>
</head>

<body>



	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
		<h1>Perfil de Usuario</h1>
		<?php
			$usuarioSA = new UsuarioSA();
			$perfil = $usuarioSA->getUsuario($usuario);
			echo "<b>Usuario: </b>" . $perfil->NombreUsuario . "<br>";
			echo "<b>Nombre: </b>" .$perfil->Nombre ." ".$perfil->Apellido1 ." ". $perfil->Apellido2 . "<br>";
			echo "<b>Sexo: </b>" . $perfil->Sexo . "<br>";
			echo "<b>Tu equipo: </b>" . $perfil->EquipoFavorito . "<br>";
			echo "<b>Mail: </b>" . $perfil->Email . "<br>";
			if($perfil->SomosFamilia){
				echo"<b>Usuario SomosFamilia: </b> SI <br>";
			}else{
				echo"<b>Usuario SomosFamilia: </b> NO <br>";
			}  
			echo "<b>Puntos conseguidos: </b>" . $perfil->Puntos . "<br>";
		?>
		

	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>


</body>
</html>