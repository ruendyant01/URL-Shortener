<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/d561733e28.js" crossorigin="anonymous"></script>
        @vite('resources/js/app.js')

        <!-- Styles -->
    </head>
    <body class="antialiased">
        <div id="app">
            <example-component />
        </div>
    </body>
</html>
