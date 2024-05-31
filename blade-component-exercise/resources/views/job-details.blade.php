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

<x-nav-bar>
  <x-slot:heading>
  </x-slot:heading>
</x-nav-bar>
<div>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <p><span class="font-bold">Job details:</span> {{ $job['responsibilities'] }}</p>
    @if(Arr::has($job, 'salary'))
        <p><span class="font-bold">Salary:</span> {{ $job['salary'] }}</p>
    @else()
        <p><span class="font-bold">Salary:</span> Not specified</p>
    @endif()
</div>
</body>
</html>
