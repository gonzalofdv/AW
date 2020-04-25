<?php session_start(); 
require('include/sa/NoticiaSA.php');
require('include/sa/LigaSA.php');
require('include/sa/EquipoSA.php');
$codLiga = $_GET['idL'];

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
	<title>Liga</title>
</head>

<body>

	<?php
		require("include/comun/cabecera.php");
	?>

	<div id="contenido">
		<?php
		$ligasa = new LigaSA();
		$nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;
		echo '<h1><b>'.$nombreLiga.'</b></h1>';
		$noticiaSA = new NoticiaSA();
		$res = $noticiaSA->devuelveNoticias($codLiga);
		while($valores = mysqli_fetch_array($res)){
			echo '<img src="'.'./img/noticias/'.$valores[5].'" alt="Imagen noticia" width="350">';
			echo '<h2><a href="mostrarNoticia.php?idN='.$valores[0].'">' . $valores[4] . '</a></h2>';
			echo '<h3>'.substr($valores[3],0,40) . "...".'</h3>';

			echo '<br>';
		}

		echo'<h1>Clasificación '.$nombreLiga.'</h1>';
		?>
        <p><table>
        <tr>
        	<th></th>
            <th>Equipo</th>
            <th>PT</th>
            <th>GF</th>
            <th>GC</th>
        </tr>
        <?php 
        $equiposa = new EquipoSA();
        $equipos = $equiposa->devuelveEquipos($codLiga);
		while($res = mysqli_fetch_array($equipos)){ 
		$folder_path = './img/equipos/';
		$file_path = $folder_path.$res[6];
		?>
		<tr>
        	<td><img src="<?php echo $file_path; ?>" alt="Imagen noticia" width="20"></td>
            <td><?= $res[1]?></td>
            <td><?= $res[3]?></td>
            <td><?= $res[4]?></td>
            <td><?= $res[5]?></td>
        </tr>
		<?php } ?>
		</table>
		</p>

	</div>

	<?php
		require("include/comun/sidebarDer.php");
		require("include/comun/pie.php");
	?>
<!-- Fin del contenedor -->

</body>
</html>