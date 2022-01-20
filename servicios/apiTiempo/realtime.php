<?php
    session_start();
    $res = file_get_contents("http://localhost:3000/weather/realtime/".$_GET['location']);
    $data = json_decode($res);

    include '../../includes/header.php';
?>
<div class="d-flex justify-content-around">
    <h1><?php echo $data->location->name?>, <?php echo $data->location->region?>, <?php echo $data->location->country?></h1>
    <div class="d-flex justify-content-start">
        <h1><?php echo $data->current->temp_c?>ºC</h1>
        <img src=<?php echo $data->current->condition->icon?>>
    </div>
</div>

<div>
    <p>Precipitaciones: <?php echo $data->current->precip_mm?>mm</p>
    <p>Presión atmosferica: <?php echo $data->current->pressure_mb?>mb</p>
    <p>Viento: <?php echo $data->current->wind_kph?> Km/h direccion <?php echo $data->current->wind_dir?></p>
    <p>Humedad: <?php echo $data->current->humidity?>%</p>
</div>