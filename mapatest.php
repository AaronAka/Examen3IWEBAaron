<head>
    <title>Búsqueda de incidencias</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
</head>

<body>
<div id="map">
        <script type="text/javascript">
            var map = L.map('map').setView([40,-3], 7);
            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);
            var marker = L.marker([<?php echo 37.362803900000074; ?>, <?php echo -6.0096290999999269; ?>]).addTo(map);
            marker.bindPopup("<b>Movida en Lat: <?php echo 37.362803900000074 ; ?>, Long: <?php echo -6.0096290999999269; ?>");

            var marker = L.marker([<?php echo 38; ?>, <?php echo -7.0096290999999269; ?>]).addTo(map);
            marker.bindPopup("<b>Movida en Lat: <?php echo 38 ; ?>, Long: <?php echo 7.0096290999999269; ?>");
        </script>
        <noscript>
                <h2>Javascript not found</h2>
                <p>This application requires Javascript. Please enable it to view the map.</p>
        </noscript>
    </div>
</body>    