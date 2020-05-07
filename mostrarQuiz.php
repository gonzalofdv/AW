<?php session_start(); 

require_once('include/sa/PreguntaSA.php');
require_once('include/sa/RespuestaSA.php');

$codLiga = htmlspecialchars($_GET['liga']);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<link rel="stylesheet" type="text/css" href="valoracionesYquiz.css" />

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
	<div class="contenido" id="contenidoIni">
	<br>

	<?php
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
				header('Location: mostrarAlertas.php?codAlerta=1');
			}
			else {

				if($codLiga == 0){ //el 0 significa que hacemos quiz de todo
	?>			
				<h1 id="tituloBienvenida">Tiempo restante: <span id="clock"></span></h1>
				<div class="divQuiz">
				<script src="temporizador.js"></script>
				<form class="quiz" id="formularioQuiz" action="procesarQuiz.php" method="post">
					<fieldset class="fieldValoracion">
						<legend class="legValoracion">Bienvenido al Quiz!</legend>
				<?php
						$preguntaSA=new PreguntaSA();
						$respuestaSA=new RespuestaSA();
						$num=$preguntaSA->getNumPreguntas();
						$valores=array();
						$i=0;
						$j=0;
						while($i<10){
							$rand =rand(1,$num);
							if(!in_array($rand,$valores)){
								array_push($valores,$rand);
								$pregunta=$preguntaSA->getPregunta($rand);
								$respuestas=$respuestaSA->getRespuestas($rand);
								echo "<h3>".$pregunta->Pregunta . "</h3>";
								echo '<div class="opcionesVal">';
								echo '<ul>';
								while($res=mysqli_fetch_array($respuestas)){
									echo '<li>';
									echo '<input type=radio id=op'.$j.' name=res'.$i.' value='.$res[3].' >';
									echo '<label class="labelVal" for=op'.$j.'>'.$res[2].'';
									echo "<br>";
									echo '</li>';
									$j++;
								}
								echo '</ul>';
								echo '</div>';
								$i++;	
							}
						}
				?>
						<input type="submit" class="botonEnviar" name="aceptar">	
					</fieldset>
				</form>
				</div>
	<?php
				}
				else{ //si el codigo de liga especifica una liga concreta
	?>
					<h1 id="tituloBienvenida">Tiempo restante: <span id="clock"></span></h1>
					<div class="divQuiz">
					<script src="temporizador.js"></script>
					<form class="quiz" id="formularioQuiz" action="procesarQuiz.php" method="post">
						<fieldset class="fieldValoracion">
							<legend class="legValoracion">Bienvenido al Quiz!</legend>

	<?php				
							$respuestaSA = new RespuestaSA();
							$preguntaSA = new PreguntaSA();

							$idspreguntas = array();
							$lista = $preguntaSA->getIdsLiga($codLiga);
							while($id = mysqli_fetch_array($lista)){
								array_push($idspreguntas, $id[0]);
							}

							$valores = array(); //array de control para no repetir numeros
							$i = 0;
							$j = 0;
							while ($i<10){
								$rand = rand(0, sizeof($idspreguntas)-1); //creo que seria asi o hasta  sizeof -1?
								if(!in_array($rand, $valores)){
									array_push($valores, $rand);
									$idPreg = $idspreguntas[$rand];
									$pregunta = $preguntaSA->getPregunta($idPreg);
									$respuestas =$respuestaSA->getRespuestas($idPreg);
									echo "<h3>".$pregunta->Pregunta . "</h3>";
									echo '<div class="opcionesVal">';
									echo '<ul>';
									while($res=mysqli_fetch_array($respuestas)){
										echo '<li>';
										echo '<input type=radio id=op'.$j.' name=res'.$i.' value='.$res[3].' >';
										echo '<label class="labelVal" for=op'.$j.'>'.$res[2].'';
										echo "<br>";
										echo '</li>';
										$j++;
									}
									echo '</ul>';
									echo '</div>';
									$i++;
								}
							}
	?>
							<input type="submit" class="botonEnviar" name="aceptar">	
						</fieldset>
					</form>
					</div>
	<?php
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