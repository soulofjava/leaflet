<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col">
            <div id="map" style="height: 700px;"></div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" id="Latitude" readonly>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="Longitude" readonly>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
        </script>
    <script>
        navigator.geolocation.getCurrentPosition(function (location) {

            var map = L.map('map').setView([-7.356654558186953, 109.90575993482494], 16);

            var loc = [parseFloat(location.coords.latitude), parseFloat(location.coords.longitude)];

            console.log(loc);

            var marker = L.marker(loc, { draggable: 'true' }).addTo(map);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            var circle = L.circle([-7.356654558186953, 109.90575993482494], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 100
            }).addTo(map);

            $("#Latitude").val(location.coords.latitude);
            $("#Longitude").val(location.coords.longitude);

            marker.on('drag', function (e) {
                console.log(e.latlng);
                var position = marker.getLatLng();
                marker.setLatLng(position, {
                    draggable: 'true'
                }).bindPopup(position).update();
                $("#Latitude").val(position.lat);
                $("#Longitude").val(position.lng);
                var d = map.distance(e.latlng, circle.getLatLng());
                var isInside = d < circle.getRadius();
                circle.setStyle({
                    fillColor: isInside ? 'green' : '#f03',
                    color: isInside ? 'green' : '#f03'
                })
                if (isInside) {
                    console.log('Jangkauan');
                } else {
                    console.log('Diluar Jangkauan');
                }
            });
        });

    </script>
</body>

</html>