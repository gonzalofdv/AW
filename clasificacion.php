<!DOCTYPE html>
<?php session_start(); ?>

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

<div id="contenedor">

	<?php 
		require ("cabecera.php");
		require ("sidebarIzq.php");

        $data = array(
            '1' => array(
                'Equipo' => 'Bayern Munich',
                'PT' => '49',
                'PJ' => '23',
                'PG' => '15',
                'PE' => '4',
                'PP' => '4',
                'GF' => '65',
                'GC' => '26'
            ),
            '2' => array(
                'Equipo' => 'R.B. Leipzig',
                'PT' => '45',
                'PJ' => '23',
                'PG' => '13',
                'PE' => '6',
                'PP' => '3',
                'GF' => '56',
                'GC' => '25'
            ),
            '3' => array(
                'Equipo' => 'Borussia dortmund',
                'PT' => '42',
                'PJ' => '22',
                'PG' => '13',
                'PE' => '6',
                'PP' => '3',
                'GF' => '82',
                'GC' => '32'
            ),
            '4' => array(
                'Equipo' => 'Borussia Mönchengladbach',
                'PT' => '42',
                'PJ' => '21',
                'PG' => '13',
                'PE' => '3',
                'PP' => '5',
                'GF' => '42',
                'GC' => '24'
            ),
            '5' => array(
                'Equipo' => 'Bayer 04 Leverkusen',
                'PT' => '40',
                'PJ' => '22',
                'PG' => '12',
                'PE' => '4',
                'PP' => '6',
                'GF' => '38',
                'GC' => '29'
            ),
            '6' => array(
                'Equipo' => 'Schalke 04',
                'PT' => '36',
                'PJ' => '22',
                'PG' => '9',
                'PE' => '9',
                'PP' => '4',
                'GF' => '32',
                'GC' => '27'
            ),
            '7' => array(
                'Equipo' => 'Friburgo',
                'PT' => '33',
                'PJ' => '22',
                'PG' => '9',
                'PE' => '6',
                'PP' => '7',
                'GF' => '31',
                'GC' => '31'
            ),
            '8' => array(
                'Equipo' => 'TSG 1899 Hoffenheim',
                'PT' => '33',
                'PJ' => '22',
                'PG' => '10',
                'PE' => '3',
                'PP' => '9',
                'GF' => '33',
                'GC' => '35'
            ),
            '9' => array(
                'Equipo' => 'Wolfsburgo',
                'PT' => '31',
                'PJ' => '22',
                'PG' => '8',
                'PE' => '7',
                'PP' => '7',
                'GF' => '28',
                'GC' => '38'
            ),
            '10' => array(
                'Equipo' => 'Eintracht Frankfurt',
                'PT' => '28',
                'PJ' => '22',
                'PG' => '8',
                'PE' => '4',
                'PP' => '10',
                'GF' => '37',
                'GC' => '35'
            ),
        );
    ?>
	<div id="contenido">
		
		<h1>Clasificación Bundesliga</h1>
        <p><table>
        <tr>
            <td>Equipo</td>
            <td>PT</td>
            <td>PJ</td>
            <td>PG</td>
            <td>PE</td>
            <td>PP</td>
            <td>GF</td>
            <td>GC</td>
        </tr>
        <?php foreach($data as $element): ?>
        <tr>
            <td><?= $element['Equipo']?></td>
            <td><?= $element['PT']?></td>
            <td><?= $element['PJ']?></td>
            <td><?= $element['PG']?></td>
            <td><?= $element['PE']?></td>
            <td><?= $element['PP']?></td>
            <td><?= $element['GF']?></td>
            <td><?= $element['GC']?></td>
        </tr>
        <?php endforeach;?>
	</div>
    </p>

	<?php 
		require ("sidebarDer.php");
		require ("pie.php");
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>