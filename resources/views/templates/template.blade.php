<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Poke Api</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app" class="content w-100">
        @include('templates._head')
        <div class="c-wrapper">
            <div class="c-body">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
