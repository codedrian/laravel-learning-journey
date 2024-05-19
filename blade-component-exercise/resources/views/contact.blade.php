<?php?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-nav-bar :pageName="$pageName"/>
@if ($pageName === 'Contact')
    <h4>You're in the Contact page</h4>
@else
    <h4>You're not in the Contact page</h4>
@endif
</body>
</html>


