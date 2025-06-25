<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Services\WeatherService;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $req)
    {
        $lastCity = $req->session()->get('lastCity', null);

        $data = null;

        if ($lastCity != null) {
            $data = WeatherService::getWeatherData(
                $lastCity['lat'],
                $lastCity['lng'],
                $lastCity['cityRaw'],
                $lastCity['countryCode'],
            );
        } else {
            $data = WeatherService::getWeatherData(
                Constants::MAKKAH['lat'],
                Constants::MAKKAH['lng'],
                Constants::MAKKAH['cityRaw'],
                Constants::MAKKAH['countryCode'],
            );
        }

        return view('index', $data);
    }
}
