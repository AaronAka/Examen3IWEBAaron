<?php
    session_start();
    $res = file_get_contents("https://examen3aaroniweb.herokuapp.com/weather/astronomy/".$_GET['location']."&".$_GET['day']);
    $data = json_decode($res);

    include '../../includes/header.php';
?>

<h1>Datos astronomicos de <?php echo $_GET['location']?> para el día <?php echo $_GET['day']?></h1>
<br>
<br>
<p>Salida del sol: <?php echo $data->astronomy->astro->sunrise?></p>
<p>Puesta de sol: <?php echo $data->astronomy->astro->sunset?></p>
<p>Salida y puesta de la luna: <?php echo $data->astronomy->astro->moonrise?> - <?php echo $data->astronomy->astro->moonset?></p>
<p>Fase lunar: <?php echo $data->astronomy->astro->moon_phase?></p>
