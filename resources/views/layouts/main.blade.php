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
    <script src="https://unpkg.com/htmx.org@2.0.4"
        integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
</head>

<body x-data="{}" class="text-txt-first dark:text-white dark:bg-dark-bg">
    @yield('content')
</body>

</html>
