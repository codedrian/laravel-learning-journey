<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Money Button Game</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("form[name='betForm']").on('submit', function(event) {
                let action = $("form[name='betForm']").attr('action');
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: action,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        let result = response.betResults;
                        $('#money').text(result.currentMoney);
                        $('#betHistory').append(`<li class="${result.prize > 0 ? 'text-green-600' : 'text-red-600'} "><span class='mr-5'>${result['submitted_at']}</span>You pushed ${result.betRisk} risk. The value is ${result.prize}. Your current money now is ${result.currentMoney}</li>`);
                        $('#gameHostIntro').remove();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', status, error);
                    }
                });
            });
            isGameOver();

            function isGameOver() {
                let currentMoney = {{ session()->has('money') ?? session('money')}}
                if (currentMoney < 50)
                {
                    alert("Oh no, looks like you're running out of money! Take a break so you can play again later.");
                    $(".submitBet").addClass('pointer-events-none');
                }
            }
        });
    </script>
</head>
<body>
<h1>Your money: <span id="money">{{ session()->has('money') ? session('money') : '500'}}</span></h1>

<form action="{{ route('destroyBet') }}" method="POST" name="resetBetForm">
    @csrf
    <input type="submit" value="reset">
</form>

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
<h3>Game host:</h3>
<section class="outline {{ session()->has('bet_history') ? '' : 'min-h-10' }}">
    <p id="gameHostIntro" class="{{ session()->has('bet_history') ? 'hidden' : ''}}">Are you ready to win big? Try your luck and bet now! You could be the next big winner!</p>
    <ul class="list-none" id="betHistory">
        @if(session()->has('bet_history'))
            @foreach(session('bet_history') as $bet)
                <li class="{{ $bet['prize'] > 0 ? 'text-green-600' : 'text-red-600'}}"><span class="mr-5">{{ $bet['submitted_at'] }}</span>You pushed {{ $bet['betRisk'] }} risk. The value is {{ $bet['prize'] }}. Your current money now is
                    {{ $bet['currentMoney'] }}</li>
            @endforeach
        @endif
    </ul>
</section>
</body>
</html>
