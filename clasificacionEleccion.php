<?php session_start(); 
	require('include/sa/NoticiaSA.php');
	require('include/sa/LigaSA.php');
	require('include/sa/EquipoSA.php');

	$codLiga = $_POST['codLiga'];
			
	$ligasa = new LigaSA();
	$nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;

	echo'<h3 class="hclasificacion">Clasificacion '.$nombreLiga.'</h3>';
?>
	<p><table class="tablaClasificacion">
	<tr>
		<th></th>
		<th></th>
		<th>Equipo</th>
		<th>PT</th>
		<th>GF</th>
		<th>GC</th>
    </tr>
<?php 
    $equiposa = new EquipoSA();
    $equipos = $equiposa->devuelveEquipos($codLiga);
    $i=1;
	while($res = mysqli_fetch_array($equipos)){ 
		$folder_path = './img/equipos/';
		$file_path = $folder_path.$res[6];
?>	
		<tr>
			<td><?php echo $i.'º'; $i++;?></td>
			<td><img class="imgClasificacion" src="<?php echo $file_path; ?>" alt="Imagen noticia"></td>
			<td><?= $res[1]?></td>
			<td><?= $res[3]?></td>
			<td><?= $res[4]?></td>
			<td><?= $res[5]?></td>
		</tr>
		
<?php } ?>
	</table>
	</p>