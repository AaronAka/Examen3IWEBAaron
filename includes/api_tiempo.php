<section class="container">
    <h1>Tiempo</h1>
    <form action="../servicios/apiTiempo/realtime.php" method="GET">
        <input type="text" name="location" placeholder="Localización"/>
        <input type="submit" value="Buscar tiempo actual"/>
    </form>

    <form action="../servicios/apiTiempo/forecast.php" method="GET">
        <input type="text" name="location" placeholder="Localización"/>
        <input type="text" name="days" placeholder="Numero de dias desde hoy"/>
        <input type="submit" value="Buscar prediccion del tiempo"/>
    </form>

    <form action="../servicios/apiTiempo/astronomy.php" method="GET">
        <input type="text" name="location" placeholder="Localización"/>
        <input type="text" name="day" placeholder="Dia a Buscar"/>
        <input type="submit" value="Buscar prediccion astronómica"/>
    </form>
</section>