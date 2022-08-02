<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="map" style="height: 700px;"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="Latitude" readonly>
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="Longitude" readonly>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Distance</label>
                <input type="text" class="form-control" id="Distance" readonly>
            </div>
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
    <!-- <script> -->
    <script type="text/javascript">
        $(document).ready(function () {
            navigator.geolocation.getCurrentPosition(function (location) {

                var map = L.map('map').setView([-7.356654558186953, 109.90575993482494], 16);

                var loc = [location.coords.latitude, location.coords.longitude];

                // var marker = L.marker(loc, { draggable: 'true' }).addTo(map);

                var markerFrom = L.circleMarker([location.coords.latitude, location.coords.longitude], { color: "#F00", radius: 10 });
                var markerTo = L.circleMarker([-7.35668969526765, 109.90589076236527], { color: "#4AFF00", radius: 10 });
                var from = markerFrom.getLatLng();
                var to = markerTo.getLatLng();
                // markerFrom.bindPopup('Posisi Saya ' + (from).toString());
                // markerTo.bindPopup('Kantor Kominfo ' + (to).toString());
                // map.addLayer(markerTo);
                // map.addLayer(markerFrom);
                getDistance(from, to);


                latit = location.coords.latitude;
                longit = location.coords.longitude;
                // this is just a marker placed in that position
                var abc = L.marker([location.coords.latitude, location.coords.longitude]).addTo(map);
                // move the map to have the location in its center
                map.panTo(new L.LatLng(latit, longit));

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                var garis = L.polyline([from, to]).addTo(map);
                var circle = L.circle([-7.356654558186953, 109.90575993482494], {
                    fillOpacity: 0.5,
                    radius: 50
                }).addTo(map);
                var d = map.distance(loc, circle.getLatLng());
                var isInside = d < circle.getRadius();
                circle.setStyle({
                    fillColor: isInside ? 'green' : '#f03',
                    color: isInside ? 'green' : '#f03',
                });
                garis.setStyle({
                    color: isInside ? 'none' : 'red'
                });
                if (isInside) {
                    console.log('Jangkauan');
                } else {
                    console.log('Diluar Jangkauan');
                }

                $("#Latitude").val(location.coords.latitude);
                $("#Longitude").val(location.coords.longitude);

                // marker.on('drag', function (e) {
                //     console.log(e.latlng);
                //     var position = marker.getLatLng();
                //     marker.setLatLng(position, {
                //         draggable: 'true'
                //     }).bindPopup(position).update();
                //     var d = map.distance(e.latlng, circle.getLatLng());
                //     var isInside = d < circle.getRadius();
                //     circle.setStyle({
                //         fillColor: isInside ? 'green' : '#f03',
                //         color: isInside ? 'green' : '#f03'
                //     })
                // });
            });
            function getDistance(from, to) {
                var container = document.getElementById('Distance');
                container.value = ("Jarak Posisi Saya ke Kominfo " + (from.distanceTo(to)).toFixed(0) / 1000) + ' km';
            }
        });

    </script>
</body>

</html>