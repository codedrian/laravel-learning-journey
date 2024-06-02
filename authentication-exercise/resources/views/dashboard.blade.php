<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite('./resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
        $(document).ready(function(){
            $('#profile').on('click', function() {
                $('#profile-dropdown').toggle();
            })
            /*TODO: Fetch the Phonebook::showContact()*/
        });
    </script>
</head>
<body>
<x-navbar></x-navbar>
<p>Welcome {{ Auth::user()->name }}. Your ID is <span class="bg-red-200">{{ Auth::user()->id }}</span>.</p>
<h1>Contacts</h1>

</body>
</html>
