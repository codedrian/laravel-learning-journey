<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css');
    <title>Document</title>
</head>
<body>
<x-nav-bar>
    <x-slot:heading>
        <h1>Jobs</h1>
    </x-slot:heading>
</x-nav-bar>
</body>
</html>