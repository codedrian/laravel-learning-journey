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

        });
    </script>
</head>
<body>
<x-navbar></x-navbar>
<h1>Contacts</h1>
<x-contact-table :contacts="$contacts"/>


</body>
</html>
