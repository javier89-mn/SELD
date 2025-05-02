<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Ruta y Kilometraje</title>

    <!-- Google Maps API -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=TU_CLAVE_DE_API&callback=initMap&libraries=places" defer></script>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        .controls {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Ruta y Cálculo de Kilometraje</h2>

    <div class="controls">
        <label>Origen:</label>
        <input id="origen" type="text" placeholder="Ingresa un punto de inicio">
        <label>Destino:</label>
        <input id="destino" type="text" placeholder="Ingresa un destino">
        <button onclick="calcularRuta()">Calcular Ruta</button>
    </div>

    <div id="map"></div>

    <h3>Distancia Total: <span id="distancia"></span> km</h3>

    <script>
        let map;
        let directionsService;
        let directionsRenderer;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 19.4326, lng: -99.1332 }, // Ciudad de México
                zoom: 12,
            });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);
        }

        function calcularRuta() {
            const origen = document.getElementById("origen").value;
            const destino = document.getElementById("destino").value;

            if (!origen || !destino) {
                alert("Por favor, ingresa ambos puntos.");
                return;
            }

            const request = {
                origin: origen,
                destination: destino,
                travelMode: google.maps.TravelMode.DRIVING,
            };

            directionsService.route(request, function (result, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);

                    // Calcular distancia en kilómetros
                    const distanciaKm = result.routes[0].legs[0].distance.value / 1000;
                    document.getElementById("distancia").textContent = distanciaKm.toFixed(2);
                } else {
                    alert("No se pudo calcular la ruta: " + status);
                }
            });
        }

        window.initMap = initMap;
    </script>

</body>
</html>
