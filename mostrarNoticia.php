<?php session_start();

require_once('include/sa/LigaSA.php');
require_once('include/sa/UsuarioSA.php');
require_once('include/sa/ComentarioSA.php');
require_once('include/sa/NoticiaSA.php');
require_once('include/transfer/NoticiaTransfer.php');

$idNoticia = $_GET['idN'];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<title>Noticia</title>
</head>

<body>

	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
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
		<h1><?php echo $titular; ?></h1>
		
		<?php
			$folder_path = './img/noticias/';
			$file_path = $folder_path.$foto;
		?>
			<img src="<?php echo $file_path; ?>" alt="Imagen noticia" width="350">
		
		
		<h3>Noticia perteneciente a la liga: <?php echo $liga->Nombre;  ?></h3>
		<p><?php echo $cuerpo; ?></p>
		<p>Noticia escrita por el usuario <?php echo $usuario->NombreUsuario; ?></p>
		<?php
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
				echo '<button onclick=location.href="formularioComentario.php?idN='.$idNoticia.'" disabled>Agregar comentario</button>';
			}
			else{
				echo '<button onclick=location.href="formularioComentario.php?idN='.$idNoticia.'">Agregar comentario</button>';
			}
		
		    $comentarioSA=new ComentarioSA();
		    $comentarios=$comentarioSA->devuelveComentarios($idNoticia);
		?>
			  
		<?php 
			if(!isset($_SESSION["login"]) || $_SESSION["login"] == false || ($_SESSION["esAdmin"] == false)){
				echo '<button onclick=location.href="procesarBorrarNoticia.php?idN='.$idNoticia.'" disabled>Eliminar noticia</button>';
				echo '	';
				echo '<button onclick=location.href="formularioEditarNoticia.php?idN='.$idNoticia.'" disabled>Editar noticia</button>';
				echo '<button onclick=location.href="formularioBorrarComentario.php?idN='.$idNoticia.'" disabled>Eliminar comentario</button>';
				echo '	';
				
			}
			else{
				if($existen=$comentarioSA->existenComentarios($idNoticia)){
				echo '<button onclick=location.href="formularioBorrarComentario.php?idN='.$idNoticia.'">Eliminar comentario</button>';
				echo '	';
				}
				else{
					echo '<button onclick=location.href="formularioBorrarComentario.php?idN='.$idNoticia.'" disabled>Eliminar comentario</button>';
					echo '	';
				}
				echo '<button onclick=location.href="procesarBorrarNoticia.php?idN='.$idNoticia.'">Eliminar noticia</button>';
				echo '	';
				echo '<button onclick=location.href="formularioEditarNoticia.php?idN='.$idNoticia.'">Editar noticia</button>';
			}
		
			echo "<br><br>";
		?>
		       <table border="2">
					<tr>
						<td><b>Usuario</b></td>
						<td><b>Comentario</b></td>
					</tr>
		<?php 
		    while($mostrar=mysqli_fetch_object($comentarios)){
	   				$usuarioSA=new UsuarioSA();
	   				$usuario=$usuarioSA->obtenerNombreUsu($mostrar->CodUsuario);
	   				$usu=$usuario->NombreUsuario;
	   				?>
					<tr>
						<td><?php echo $usu ?></td>
						<td><?php echo $mostrar->Comentario ?></td>
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
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>