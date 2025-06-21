<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Services\WeatherService;

class HomeController
{
    public function index()
    {
        $data = WeatherService::getWeatherData(
            Constants::MAKKAH['lat'],
            Constants::MAKKAH['lng'],
            Constants::MAKKAH['cityRaw'],
            Constants::MAKKAH['countryCode'],
        );

        return view('index', $data);
    }
}
