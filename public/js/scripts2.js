mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmlhbmEwMTA3IiwiYSI6ImNsM2tpcTJmZTAweWMzY2xhbXFoNndneTkifQ.hYMFttoAsM5Aa-14gWxLKA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-79.4512, 43.6568],
        zoom: 13
    });

    // Add the control to the map.
   
    const geocoder =  new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        // localGeocoder: forwardGeocoder,
        mapboxgl: mapboxgl,
        placeholder:'Search Address'
    });
    map.addControl(geocoder);
    map.on('load', () => {
        map.addSource('single-point', {
        'type': 'geojson',
        'data': {
        'type': 'FeatureCollection',
        'features': [
            'bangke',
        ]
        }
        });

        map.addLayer({
            'id': 'point',
            'source': 'single-point',
            'type': 'circle',
            'paint': {
            'circle-radius': 10,
            'circle-color': '#448ee4'
            }
            });
             

        geocoder.on('result', (event) => {
            map.getSource('single-point').setData(event.result.geometry);
             console.log();
        });
       
    });
         
       

    
    
    