<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raffle Draw</title>
</head>
<body>
@php
    $counter = session('counter', 0);
    $ticketNumber = session('ticketNumber', 0);
@endphp
<h1>There are {{ $counter }} lucky winners selected</h1>
<h2 id="ticket-number">Ticket Number: {{ $ticketNumber }}</h2>

<form action="{{ route('incrementCount') }}" method="POST">
     @csrf
    <button id="pick-more">Pick more</button>
</form>
<form action="{{ route('destroyCount') }}" method="POST">
    @csrf
    <button id="">Reset</button>
</form>

</body>
</html>
