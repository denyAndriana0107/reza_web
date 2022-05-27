<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Place the geocoder input outside the map</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<style>
    .geocoder {
        position: relative;
        z-index: 1;
        width: 50%;
        left: 50%;
        margin-left: -25%;
        top: 10px;
    }
    .mapboxgl-ctrl-geocoder {
        min-width: 100%;
    }
    #map {
        margin-top: 75px;
    }
</style>

<div id="map"></div>

<div id="geocoder" class="geocoder"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmlhbmEwMTA3IiwiYSI6ImNsM2tpcTJmZTAweWMzY2xhbXFoNndneTkifQ.hYMFttoAsM5Aa-14gWxLKA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-79.4512, 43.6568],
        zoom: 13
    });

    // Add the control to the map.
    const geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    var inputValue = document.querySelector(".mapboxgl-ctrl-geocoder--input");
    inputValue.focus();
    inputValue.onsubmit = checkForm;
    function checkForm() {
        console.log(inputValue.value);
    }
    inputValue.addEventListener('change', (e) => {  
        console.log(e.target.value)
    ;}); 
    

</script>

</body>
</html>