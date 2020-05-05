<?php session_start(); 
	require('include/sa/NoticiaSA.php');
	require('include/sa/LigaSA.php');
	require('include/sa/EquipoSA.php');

	$codLiga = $_POST['codLiga'];
			
	$ligasa = new LigaSA();
	$nombreLiga = $ligasa->getNombreLiga($codLiga)->Nombre;

	echo'<h1>Clasificacion '.$nombreLiga.'</h1>';
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
			<td><img src="<?php echo $file_path; ?>" alt="Imagen equipo" width="20"></td>
			<td><?= $res[1]?></td>
			<td><?= $res[3]?></td>
			<td><?= $res[4]?></td>
			<td><?= $res[5]?></td>
		</tr>
	
<?php } ?>
	</table>
	</p>