<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Supplement forward geocoding search results with another data source</title>
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

<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmlhbmEwMTA3IiwiYSI6ImNsM2tpcTJmZTAweWMzY2xhbXFoNndneTkifQ.hYMFttoAsM5Aa-14gWxLKA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/dark-v10',
        center: [-87.6244, 41.8756],
        zoom: 13
    });

    // Load custom data to supplement the search results.
    const customData = {
        'features': [
            {
                'type': 'Feature',
                'properties': {
                    'title': 'Lincoln Park is special'
                },
                'geometry': {
                    'coordinates': [-87.637596, 41.940403],
                    'type': 'Point'
                }
            },
            {
                'type': 'Feature',
                'properties': {
                    'title': 'Burnham Park is special'
                },
                'geometry': {
                    'coordinates': [-87.603735, 41.829985],
                    'type': 'Point'
                }
            },
            {
                'type': 'Feature',
                'properties': {
                    'title': 'Millennium Park is special'
                },
                'geometry': {
                    'coordinates': [-87.622554, 41.882534],
                    'type': 'Point'
                }
            }
        ],
        'type': 'FeatureCollection'
    };

    function forwardGeocoder(query) {
        const matchingFeatures = [];
        for (const feature of customData.features) {
            // Handle queries with different capitalization
            // than the source data by calling toLowerCase().
            if (
                feature.properties.title
                    .toLowerCase()
                    .includes(query.toLowerCase())
            ) {
                // Add a tree emoji as a prefix for custom
                // data results using carmen geojson format:
                // https://github.com/mapbox/carmen/blob/master/carmen-geojson.md
                feature['place_name'] = `🌲 ${feature.properties.title}`;
                feature['center'] = feature.geometry.coordinates;
                feature['place_type'] = ['park'];
                matchingFeatures.push(feature);
            }
        }
        return matchingFeatures;
    }

    // Add the control to the map.
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            localGeocoder: forwardGeocoder,
            zoom: 14,
            placeholder: 'Enter search e.g. Lincoln Park',
            mapboxgl: mapboxgl
        })
    );
    console.log('ca');
   
</script>

</body>
</html>