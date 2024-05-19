<?php?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>
<body>
<x-nav-bar :pageName="$pageName"/>
@if ($pageName === 'Home')
    <h4>You're in the Home page</h4>
@else
    <h4>You're not in the Home page</h4>
@endif
</body>
</html>
