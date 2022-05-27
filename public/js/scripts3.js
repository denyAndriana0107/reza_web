
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
        var a = e.target.value
        getDataMaps(a)
    ;}); 
    

    // on load to input text
    function getDataMaps(data){
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
          };
          
          fetch("https://api.mapbox.com/geocoding/v5/mapbox.places/"+data+".json?"+"limit=1&proximity=ip&types=place%2Cpostcode%2Caddress&access_token=pk.eyJ1IjoiYW5kcmlhbmEwMTA3IiwiYSI6ImNsM2tpcTJmZTAweWMzY2xhbXFoNndneTkifQ.hYMFttoAsM5Aa-14gWxLKA", requestOptions)
            .then(function(response) {
                if (!response.ok) {
                throw new Error("HTTP error, status = " + response.status);
                }
                return response.json();
            })
            .then(function (data){
                var alamat = data['features'][0]['place_name'];
                var koordinat = data['features'][0]['center'];
                document.getElementById('alamat_perusahaan').value = alamat;
                document.getElementById('lokasi').value = alamat;
                document.getElementById('koordinat').value = koordinat;
                console.log(data['features'][0]['place_name']);
                console.log(data['features'][0]['center']);
            }) 
            // .then(result => console.log(result['features'][0]['place_name']))
            .catch(error => console.log('error', error));
    }
   