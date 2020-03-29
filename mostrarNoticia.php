<?php session_start();

require_once('LigaSA.php');
require_once('UsuarioSA.php');
require_once('ComentarioSA.php');

$titular = $_GET['titulo'];
$cuerpo = $_GET['texto'];
$codLiga = $_GET['codLiga'];
$codUsu = $_GET['codUsu'];
$idNoticia = $_GET['idN'];
$foto = $_GET['foto'];

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
	<title>Portada</title>
</head>

<body>

	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
		<?php
			//consultas para extraer nombre de usuario y nombre de liga
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
		<?php echo '<button onclick=location.href="formularioComentario.php?idN='.$idNoticia.'">Agregar comentario</button>';
		      echo "<br><br>";
		      $comentarioSA=new ComentarioSA();
		      $comentarios=$comentarioSA->devuelveComentarios($idNoticia);?>
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
				

	</div>

	<?php
		require("sidebarDer.php");
		require("pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>