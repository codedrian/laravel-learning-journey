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
            /*TODO: Fetch the bet history and append it to the screen when the windows is ready*/
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
                        $('#money').text('Your money:' + result.currentMoney);
                        $('#betHistory').append(`<li>You pushed ${result.betRisk} risk. The value is ${result.prize}. Your current money now is ${result.currentMoney}</li>`);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', status, error);
                    }
                });
            });
            {{--@foreach( as $bet)
                $('#betHistory').append($bet);
            @endforeach--}}
        });
    </script>
</head>
<body>
<h1 id="money">Your money: {{ session('money') }}</h1>

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
<section class="outline">
    <ul id="betHistory"></ul>
</section>
</body>
</html>
