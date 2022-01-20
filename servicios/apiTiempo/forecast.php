<?php
    session_start();
    $res = file_get_contents("http://localhost:3000/weather/forecast/".$_GET['location']."&".$_GET['days']);
    $data = json_decode($res);

    include '../../includes/header.php';
?>

<h1>Tiempo en <?php echo $_GET['location']?> para los proximos <?php echo $_GET['days']?> dias</h1>
<br>
<br>


<table>
    <tr>
        <?php for ($i=0; $i<24; $i++){ ?>    
            <th><?php echo $i ?>:00</th>
        <?php }?>
    </tr>
    <?php foreach ($data->forecast->forecastday as $day){ ?>
        <tr>
            <?php foreach ($day->hour as $hour){ ?>
                <td><?php echo $hour->temp_c ?>ºC<img src=<?php echo $hour->condition->icon?>></td>
            <?php }?>            
        </tr>
    <?php }?>
</table>