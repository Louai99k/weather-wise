<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Wise</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <nav class="py-8 px-4 flex flex-wrap justify-between gap-x-8 items-center">
        <h1 class="text-3xl font-bold flex gap-2">
            Weather Wise
            <x-icons.logo />
        </h1>
        <h3 class="font-medium text-txt-second">
            {{ $date }}
        </h3>
    </nav>
</body>

</html>
