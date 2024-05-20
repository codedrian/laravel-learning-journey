<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            },
            corePlugins: {
                preflight: false,
            }
        }
    </script>
    <title>Document</title>
</head>
<body>
<form action="{{ route('storeFeedback') }}" method="POST" class="outline w-2/5 p-3">
    @csrf
    <label class="block">
        Name (Optional):
        <input type="text" name="name">
    </label>
    <label class="block my-3">
        Course Title:
        <select name="course" id="course">
            <option value="php_track">PHP Track</option>
            <option value="javascript_track">Javascript Track</option>
            <option value="html_css">HTML & CSS</option>
        </select>
    </label>
    <label class="block">
        Given Score (1-10):
        <select name="score" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label for="reason" class="block my-2">Reason for the score:</label>
    <textarea name="reason" id="reason" cols="50" rows="10" class="block w-2/3 @error('reason') is-invalid @enderror"></textarea>
    @error('reason')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <input type="submit" value="submit" class="mt-2">
</form>
</body>
</html>
