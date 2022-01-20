<?php 
    $resTravel = file_get_contents("http://localhost:3000/travels/edit/".$_GET['id']);
    $dataTravel = json_decode($resTravel);
    $viaje = $dataTravel->data->viaje[0];

    $resConductor = file_get_contents("http://localhost:3000/users/edit/".$viaje->id_conductor);
    $dataConductor = json_decode($resConductor);
    $conductor = $dataConductor->data->usuario[0];

    error_reporting(E_ERROR | E_PARSE);

    include '../paypal/config.php'
?>

<h1>Detalles del viaje</h1>
<h3>Trayecto: <?php echo $viaje->lugar_salida?> - <?php echo $viaje->lugar_llegada?></h3>
<h3>Conductor: <?php echo $conductor->nombre?> <?php echo $conductor->apellidos?> (<?php echo $conductor->email?>)</h3>
<?php if ($dataConductor->data->foto==null)
    echo "<img src='https://acortar.link/mZkcJS' style='width:30px;height:30px;'?></td>";
    else
    echo "<img src='".$usuario->foto."' style='width:30px;height:30px;'?></td>";
?>
<h3>Fecha: <?php echo $viaje->fecha_salida?></h3>
<h3>Hora de salida: <?php echo $viaje->hora_salida?></h3>
<h3>Precio: <?php echo $viaje->price; echo $viaje->currency?></h3>

<?php include '../paypal/paypalCheckout.php'?>