<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Tanggal</title>
</head>

<body>

    <form action="{{ url('tanggal') }}" method="post">

        @php

            // $now = new DateTime(date('Y-m-d H:i:s'));
            $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

            $now->modify('+3 hours');

        @endphp

        <h1>{{ $now->format('Y-m-d H:i:s') }}</h1>

        @csrf
        <input type="datetime-local" name="tanggal">
        <input id="party" type="datetime-local" name="party-date" min="{{ $now->format('Y-m-d H:i') }}" />

        <button type="submit">Kirim</button>
    </form>

</body>

</html>
