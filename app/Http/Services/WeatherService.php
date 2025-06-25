<?php

namespace App\Http\Services;

use App\Constants;
use DateTimeZone;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    public static function getWeatherData($lat, $lng, $cityRaw, $countryCode)
    {
        $today = date_create();
        $startDate = (clone $today)->modify('this week monday')->format('Y-m-d');
        $endDate = (clone $today)->modify('this week sunday')->format('Y-m-d');

        $res = Http::get("https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$lng&daily=weather_code,temperature_2m_max,temperature_2m_min&current=temperature_2m,weather_code,wind_speed_10m,surface_pressure,relative_humidity_2m&timezone=auto&start_date=$startDate&end_date=$endDate")->json();

        $date = date_create('now', new DateTimeZone($res['timezone']))->format('H:m | F d, o');

        $weatherCode = $res['current']['weather_code'];

        $weatherIcon = Constants::WMO_CODES[$weatherCode]['weatherIcon'];
        $weatherStatus = Constants::WMO_CODES[$weatherCode]['weatherStatus'];

        $degreeRaw = $res['current']['temperature_2m'];
        $degree = "$degreeRaw °C";

        $humidityRaw = $res['current']['relative_humidity_2m'];
        $windRaw = $res['current']['wind_speed_10m'];
        $pressureRaw = $res['current']['surface_pressure'];

        $infos = [
             'humidity' => ['label' => 'Humidity','value' => "$humidityRaw%"] ,
             'wind' => ['label' => 'Wind Speed','value' => "$windRaw km/h"],
             'pressure' => ['label' => 'Pressure','value' => "$pressureRaw hPa"]
        ];


        $days = array_map(
            function ($day, $temperatureMax, $temperatureMin, $weatherCode) {
                $date = date_create($day);
                $label = date_format($date, 'D d/m');

                $weatherIcon = Constants::WMO_CODES[$weatherCode]['weatherIcon'];
                $degreeMax = "$temperatureMax °C";
                $degreeMin = "$temperatureMin °C";

                $today = date_create();
                $isToday = $today->format('Y-m-d') == $day;

                return [
                    'label' => $label,
                    'weatherIcon' => $weatherIcon,
                    'degreeMax' => $degreeMax,
                    'degreeMin' => $degreeMin,
                    'isToday' => $isToday
                ];
            },
            $res['daily']['time'],
            $res['daily']['temperature_2m_max'],
            $res['daily']['temperature_2m_min'],
            $res['daily']['weather_code']
        );

        return [
            'date' => $date,
            'city' => "$cityRaw, $countryCode",
            'weatherStatus' => $weatherStatus,
            'degree' => $degree,
            'infos' => $infos,
            'weatherIcon' => $weatherIcon,
            'days' => $days,
        ];
    }
}
