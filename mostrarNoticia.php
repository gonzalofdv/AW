<?php session_start();

require_once('include/sa/LigaSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/NoticiaSA.php');
require_once('include/sa/EquipoSA.php');
require_once('include/transfer/NoticiaTransfer.php');
require_once('include/transfer/EquipoTransfer.php');
require_once('include/sa/RespuestaComentarioSA.php');

$idNoticia = $_GET['idN'];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/cabecera.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebarDer.css" />
	<link rel="stylesheet" type="text/css" href="css/votar.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
	<script type="text/javascript" src="votarNoticia.js"></script>
	<script type="text/javascript" src="respuestas.js"></script>
	<title>Noticia</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div class="contenido">
		<?php

			$noticiaSA = new NoticiaSA();
			$noticia = $noticiaSA->getNoticia($idNoticia);

			if(!is_object($noticia)){
				echo '<h1>¡Ups! Esta noticia no está disponible</h1>';
				echo '<p>Es posible que la noticia haya sido borrada o no esté disponible por otras causas, disculpa las molestias.</p>';
				echo '<p>Te redireccionaremos al inicio...</p>';
				header("refresh:5; url=index.php");

			}
			else{
			
			$titular = $noticia->getTitular();
			$cuerpo = $noticia->getTexto();
			$codLiga = $noticia->getCodLiga();
			$codUsu = $noticia->getCodUsuario();
			$foto = $noticia->getFoto();

			$ligaSA = new LigaSA();
			$liga = $ligaSA->getNombreLiga($codLiga);

			$usuarioSA = new UsuarioSA();
			$usuario = $usuarioSA->obtenerNombreUsu($codUsu);


		?>
		<div class="centraTitulosImagen" id="prueba">
			<h1><?php echo $titular; ?></h1>
			
			<?php
				$folder_path = './img/noticias/';
				$file_path = $folder_path.$foto;
			?>
				<img src="<?php echo $file_path; ?>" alt="Imagen noticia" width="350">
			
			
			<h3>Noticia perteneciente a la liga: <?php echo $liga->Nombre;  ?></h3>
		</div>
		<p><?php echo $cuerpo; ?></p>
		<p>Noticia escrita por el usuario <?php echo $usuario->NombreUsuario; ?></p>

		<div id="probando"><h4>La valoración de la noticia es <?php echo $noticia->getNota(); ?><b> / </b>5</h4></div>	
		<!-- VALORACION DE NOTICIAS CON ESTRELLAS -->

		<?php if(isset($_SESSION["login"])){?>
				<form action="javascript:void(0);" class="clasificacion" id="valorar">
					<input id="radio1" type="radio" name="estrellas" value="5">
						<label for="radio1">★</label>
						<input id="radio2" type="radio" name="estrellas" value="4">
						<label for="radio2">★</label>
						<input id="radio3" type="radio" name="estrellas" value="3">
						<label for="radio3">★</label>
						<input id="radio4" type="radio" name="estrellas" value="2">
						<label for="radio4">★</label>
						<input id="radio5" type="radio" name="estrellas" value="1">
						<label for="radio5">★</label>
						<br>
						<?php echo '<input type="checkbox" id="idN" name="idN" value="'.$idNoticia.'">.oiratnemoc raivne ramrifnoC<br><br>'; ?>
						<input id="enviarVal" class="botGen" type="submit" value="Enviar" name="submit">
				</form>
				<br><br><br><br><br><br><br><br><br>
			<?php } ?>
				

		<!-- ---------------------------------------- -->



		<?php

			$comentarioSA=new ComentarioSA();
			$comentarios=$comentarioSA->devuelveComentarios($idNoticia);

			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
				echo '<button class="botGenOff" onclick=location.href="nuevoComentario.php?idN='.$idNoticia.'" disabled>Agregar comentario</button>';
			}
			else{
				echo '<button class="botGen" onclick=location.href="nuevoComentario.php?idN='.$idNoticia.'">Agregar comentario</button>';
			}
			
		?>
			  
		<?php 
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false || ($_SESSION["esAdmin"] == false)){
				echo '<button class="botGenOff" onclick=location.href="procesarBorrarNoticia.php?idN='.$idNoticia.'" disabled>Eliminar noticia</button>';
				echo '	';
				echo '<button class="botGenOff" onclick=location.href="formularioEditarNoticia.php?idN='.$idNoticia.'" disabled>Editar noticia</button>';
				echo '<button class="botGenOff" onclick=location.href="borrarComentario.php?idN='.$idNoticia.'" disabled>Eliminar comentario</button>';	
			}
			else{
				if($existen=$comentarioSA->existenComentarios($idNoticia)){
					echo '<button class="botGen" onclick=location.href="borrarComentario.php?idN='.$idNoticia.'">Eliminar comentario</button>';
					echo '	';
				}
				else{
					echo '<button class="botGenOff" onclick=location.href="borrarComentario.php?idN='.$idNoticia.'" disabled>Eliminar comentario</button>';
					echo '	';
				}
				echo '<button class="botGen" onclick=location.href="procesarBorrarNoticia.php?idN='.$idNoticia.'">Eliminar noticia</button>';
				echo '	';
				echo '<button class="botGen" onclick=location.href="editarNoticia.php?idN='.$idNoticia.'">Editar noticia</button>';
			}
		
			echo "<br><br>";
		?>
		
			<table class="tablaComent">
					<tr id="trComent">
						<th id="thComent"></th>
						<th id="thComent"><b>Usuario</b></th>
						<th id="thComent"><b>Comentario</b></th>
						<th id="thComent"></th>
						<th id="thComent"><b>Respuestas</b></th>
					</tr>
		<?php 
			$i=0;
			while($mostrar=mysqli_fetch_object($comentarios)){
					$i=$i+1;
					$usuarioSA=new UsuarioSA();
					$usuario=$usuarioSA->obtenerNombreUsu($mostrar->CodUsuario);
					$usu=$usuario->NombreUsuario;
					
					$equipo=$usuarioSA->getUsuario($usu);
					$codEquipo=$equipo->EquipoFavorito;
					$equipoSA=new EquipoSA();
					$escudo=$equipoSA->getEquipo($codEquipo)->getEscudo();
					
					?>
					<tr id="trComent">
						<td id="comentarios"><?php echo '<img class="imgClasificacion" src="./img/equipos/'.$escudo.'">'?></td>
						<td id="comentarios"><?php echo $usu ?></td>
						<td id="comentarios"><?php echo $mostrar->Comentario ?></td>
						<?php if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
						 echo '<td id="comentarios"><button class="responderComent" id="responderComent'.$i.'" value="'.$mostrar->IdComentario.'"disabled>💬</button></td>'; 
						} 
						else{
							echo '<td id="comentarios"><button class="responderComent" id="responderComent'.$i.'" value="'.$mostrar->IdComentario.'">💬</button></td>';
						} ?>
						<?php echo '<td id="respuestas'.$i.'">';

						$respcomentSA = new RespuestaComentarioSA();
						$todos = $respcomentSA->recoger($mostrar->IdComentario);
						echo "<table class='tablaComent'>";
						echo  "<tr id='trComent'>";
						echo  "<th id='thComent'><b>Usuario</b></th>";
						echo  "<th id='thComent'><b>Comentario</b></th>";
						echo  "</tr>";

						while($aux = mysqli_fetch_array($todos)){
							$usuarioAux = $usuarioSA->obtenerNombreUsu($aux[2]);

							echo  '<tr id="trComent">';
							echo  '<td id="comentarios">'.$usuarioAux->NombreUsuario.'</td>';
							echo  '<td id="comentarios">'.$aux[3].'</td>';
							echo  '</tr>';

						}

						echo  '</table>';

						echo '</td>';?>
					</tr>
		
		<?php
		    }
		?>
				</table>
		<?php		
		}
		?>
	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
<!-- Fin del contenedor -->


</body>
</html>