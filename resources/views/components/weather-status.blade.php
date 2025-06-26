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
        <x-icons.weather.snowy />
    @break

    @case('thunderstorm')
        <x-icons.weather.thunderstorm />
    @break

    @case('sun-cloud')
        <x-icons.weather.sun-cloud />
    @break

    @case('snow-flake')
        <x-icons.weather.snow-flake />
    @break

    @case('water-drop')
        <x-icons.weather.water-drop />
    @break
@endswitch
