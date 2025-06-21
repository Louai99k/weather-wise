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

    @case('snowy')
        <x-icons.weather.rain-cloud />
    @break

    @case('thunderstorm')
        <x-icons.weather.rain-cloud />
    @break

    @case('sun-cloud')
        <x-icons.weather.rain-cloud />
    @break

    @case('snow-flake')
        <x-icons.weather.rain-cloud />
    @break

    @case('water-drop')
        <x-icons.weather.rain-cloud />
    @break
@endswitch
