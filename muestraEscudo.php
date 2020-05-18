<?php

require_once('include/sa/EquipoSA.php');
require_once('include/transfer/EquipoTransfer.php');
$codEquipo = $_POST['escudo'];

$equiposa = new EquipoSA();
$res = $equiposa->getEquipo($codEquipo);

$folder_path = './img/equipos/';
$file_path = $folder_path.$res->getEscudo();

$cadena = '<img src="'.$file_path.'">';

echo $cadena;

?>