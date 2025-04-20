@switch($status)
    @case('sunny')
        <x-icons.weather.sun />
    @break

    @case('cloudy')
        <x-icons.weather.cloud />
    @break

    @case('rainy')
        <x-icons.weather.rain-cloud />
    @break
@endswitch
