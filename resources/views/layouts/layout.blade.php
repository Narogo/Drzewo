!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Drzewo</title>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

@yield('content')
<footer>

</footer>
</body>
</html>
