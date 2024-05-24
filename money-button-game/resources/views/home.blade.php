<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<h1>Your money: 500</h1>

@php
    $bets = [
    ['betRisk' => 'low', 'minPrize' => -25, 'maxPrize' => 100 ],
    ['betRisk' => 'moderate', 'minPrize' => -100, 'maxPrize' => 1000],
    ['betRisk' => 'high', 'minPrize' => -500, 'maxPrize' => 2500],
    ['betRisk' => 'severe', 'minPrize' => -3000, 'maxPrize' => 5000]
];
@endphp
<div class="flex">
    @foreach($bets as $bet)
        <x-bet-form betRisk="{{ $bet['betRisk'] }}" minPrize="{{ $bet['minPrize'] }}" maxPrize="{{ $bet['maxPrize'] }}"/>
    @endforeach
</div>
</body>
</html>
