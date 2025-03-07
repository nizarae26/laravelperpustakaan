<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        {
            .swal-modal {
                border: 1px solid #ccc;
                border-radius: 0.75rem;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            .swal-overlay {
                backdrop-filter: blur(4px);
                background-color: rgb(255 255 255 / 0.3);
            }
        }
    </style>
</head>

<body>

    <div id="app">
        @yield('buku')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
