<body>
<form action="" class="outline p-2.5">
    <input type="hidden" name="bet" value="{{ $betRisk }}">
    <label for="bet">{{ $betRisk }}</label>
    <p>by {{ $minPrize }} up to {{ $maxPrize }}</p>
    <input type="submit">
</form>
