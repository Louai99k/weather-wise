<?php

namespace App\Http\Controllers;

use App\Http\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController
{
    public function search(Request $req)
    {
        $term = $req->query('search');

        $res = Http::get("https://geocoding-api.open-meteo.com/v1/search?name=$term&count=5&language=en&format=json")->json();

        if (isset($res['results'])) {
            return view('components/search-results', [
                'items' => $res['results']
            ]);
        }

        return view('components/search-results', [
            'items' => []
        ]);
    }

    public function getData(Request $req)
    {
        $cityRaw = $req->query('city');
        $countryCode = $req->query('countryCode');

        $lng = $req->query('lng');
        $lat = $req->query('lat');

        $weatherData = WeatherService::getWeatherData($lat, $lng, $cityRaw, $countryCode);

        return view('pages.landing', $weatherData);
    }
}
