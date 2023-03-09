<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="{{asset('js/todayDefault.js')}}"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div class="flex justify-center content-center py-8">
        @yield('content')
    </div>
</body>
</html>