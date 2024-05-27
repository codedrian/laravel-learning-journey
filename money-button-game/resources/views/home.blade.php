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
    {{--toastr cdn--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        let money = result.currentMoney;
                        $('#money').text(money);
                        $('#betHistory').append(`<li class="${result.prize > 0 ? 'text-green-600' : 'text-red-600'} "><span class='mr-5'>${result['submitted_at']}</span>You pushed ${result.betRisk} risk. The value is ${result.prize}. Your current money now is ${result.currentMoney}</li>`);
                        $('#gameHostIntro').remove();
                        isGameOver(money, result.prize);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', status, error);
                    }
                });
            });


            function isGameOver(money, prize) {
                if (money < 50)
                {
                    toastr['error'](`Oh no, you lose ${prize} looks like you're running out of money! Take a break so you can play again later.`);
                    $(".submitBet").addClass('pointer-events-none');

                }
            }
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "10000",
                "hideDuration": "2000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
</head>
<body>
<h1 class="inline-block">Your money: <span id="money">{{ session()->has('money') ? session('money') : '500'}}</span></h1>

<form action="{{ route('destroyBet') }}" method="POST" name="resetBetForm" class="inline-block">
    @csrf
    <input type="submit" value="reset" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-4 py-1 text-center me-2 ml-5">
</form>

@php
    $bets = [
    ['betRisk' => 'low', 'minPrize' => -25, 'maxPrize' => 100 ],
    ['betRisk' => 'moderate', 'minPrize' => -100, 'maxPrize' => 1000],
    ['betRisk' => 'high', 'minPrize' => -500, 'maxPrize' => 2500],
    ['betRisk' => 'severe', 'minPrize' => -3000, 'maxPrize' => 5000]
];
@endphp
<div class="flex justify-around">
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
