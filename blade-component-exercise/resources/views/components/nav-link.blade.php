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
@props(['activePage' => false])
    <a  class="{{ $activePage ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700'}} no-underline hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $activePage ? 'page' : 'false' }}" {{ $attributes }}>
        {{ $slot }}</a>
</body>
</html>
