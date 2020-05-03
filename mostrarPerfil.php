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
		require("include/comun/cabecera.php");
	?>

	<div class="contenido">
		<div id="miPerfil">
		<h1>Perfil de Usuario</h1>
		<?php
			$usuarioSA = new UsuarioSA();
			$perfil = $usuarioSA->getUsuario($usuario);
			echo "<p>Usuario: <span>" . $perfil->NombreUsuario . "</span></p>";
			echo "<p>Nombre: <span>" .$perfil->Nombre ." ".$perfil->Apellido1 ." ". $perfil->Apellido2 . "</span></p>";
			echo "<p>Sexo: <span>" . $perfil->Sexo . "</span></p>";
			echo "<p>Tu equipo: <span>" . $perfil->EquipoFavorito . "</span></p>";
			echo "<p>Mail: <span>" . $perfil->Email . "</span></p>";
			if($perfil->SomosFamilia){
				echo"<p>Usuario SomosFamilia: <span>SI </span> </p>";
			}else{
				echo"<p>Usuario SomosFamilia:  <span>NO </span></p>";
			}  
			echo "<p>Puntos conseguidos: <span>" . $perfil->Puntos . "</span></p>";
		?>
		</div>
		

	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>


</body>
</html>