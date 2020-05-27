<?php session_start(); 
require_once ('include/FormularioPreguntaRespuesta.php');
$form = new FormularioPreguntaRespuesta();
$html = $form->gestiona();
if($html == "mostrarInicioQuiz.php"){
	header("Location: mostrarAlertas.php?codAlerta=19");
}
else if($html == "fallo"){
	header("Location: mostrarAlertas.php?codAlerta=13");
}
else{
	$aux = $html;
}
?>
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
		<?php echo $aux; ?>

	</div>
	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
</body>
</html>
