<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>HMPS-SI</title>
</head>

<body>

    @include('gues.partials.navbar')

    @yield('container')

    @include('gues.partials.footer')

</body>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>

</html>
