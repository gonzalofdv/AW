<?php session_start(); 
$usuario=$_SESSION['nombre'];
require_once('include/sa/UsuarioSA.php');
require_once('include/sa/EquipoSA.php');
require_once('include/transfer/EquipoTransfer.php')
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebarDer.css" />
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
			//hacer una consulta con el dato $perfil->EquipoFavorito extraer el nombre del equipo y la url de la foto para mostrarlo a continuación
			$equiposa = new EquipoSA();
			$eq = $equiposa->getEquipo($perfil->EquipoFavorito);
			echo "<p>Tu equipo: <span>" . $eq->getNombreEquipo() . "</span></p>";

			$folder_path = './img/equipos/';
			$file_path = $folder_path.$eq->getEscudo();
			echo "<img src='".$file_path."'>";
			
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