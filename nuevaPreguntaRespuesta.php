<?php session_start(); 
require_once ('include/FormularioPreguntaRespuesta.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebarDer.css" />
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Registro Pregunta</title>
</head>
<body>
	<?php
		require("include/comun/cabecera.php");
	?>
	<div class="contenido" id="formus">
	<br>
		<?php
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
				header('Location: mostrarAlertas.php?codAlerta=1');
			}
			else {
				if($_SESSION["esAdmin"] == false && $_SESSION["esFamilia"] == false){
					header('Location: mostrarAlertas.php?codAlerta=6');
				}
				else{

					$form = new FormularioPreguntaRespuesta();
					$html = $form->gestiona();
					echo $html;

				}
			}

		?>

	</div>
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
</body>
</html>
