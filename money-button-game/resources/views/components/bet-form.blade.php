
<form action="{{ route('processBet') }}" method='POST' class="outline p-2.5" name="betForm">
    @csrf
    {{--Only the betRisk is I need--}}
    <input type="hidden" name="bet" value="{{ $betRisk }}">
    <label for="bet">{{ $betRisk }}</label>
    <p>by {{ $minPrize }} up to {{ $maxPrize }}</p>
    <input type="submit" class="submitBet">
</form>
