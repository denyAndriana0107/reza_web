<?php

namespace App\Controllers;

use Config\App;
class Home extends BaseController
{
    public function index()
    {
        $result=$this->get_CURL('https://api.mapbox.com/geocoding/v5/mapbox.places/bandung.json?access_token=pk.eyJ1IjoiYW5kcmlhbmEwMTA3IiwiYSI6ImNsM2tpcTJmZTAweWMzY2xhbXFoNndneTkifQ.hYMFttoAsM5Aa-14gWxLKA');
		$data = array('result'=>$result['features']);
        return view('maps/maps4',$data);
    }
    public function map_api()
    {

    }
}
