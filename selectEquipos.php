<?php

require_once('include/sa/EquipoSA.php');
$codLiga = $_POST['liga'];


//$cadena = '<select id="lista2" name="lista2">';

$cadena = '<option value=0>Selecciona un equipo</option>';

$equiposa = new EquipoSA();
$res = $equiposa->devuelveEquipos($codLiga);

while($var=mysqli_fetch_row($res)){
	$cadena .= '<option value='.$var[0].'> ' . $var[1] . '</option>';
	$folder_path = './img/equipos/';
	$file_path = $folder_path.$var[6];

	$cadena .= '<p><img src="'.$file_path.'"></p>';
}

//$cadena .= '</select>';

echo $cadena;

?>