<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Phonebook</title>
</head>
<body>
@if($errors->any())
    <ul class="text-red-600">
        @foreach ($errors->all() as $error)
            <li >{{ $error }}</li>
        @endforeach
    </ul>@endif
<x-phonebook.contact_form action="{{ route('store-contact') }}" method="post"/>
</body>
</html>
