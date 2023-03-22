<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="flex justify-center items-center flex-col w-full">
        <nav class="flex justify-between w-full p-4">
            <ul class="flex justify-center items-center gap-6">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('invoices') }}">Invoices</a></li>
            </ul>
            <ul class="flex gap-6 justify-center items-center">
                @auth
                    <li><a href="">John Doe</a></li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="bg-blue-700 text-white rounded p-2">Logout</button>
                    </form>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}" class="bg-blue-700 text-white rounded p-2">Login</a></li>
                    <li><a href="{{ route('register') }}" class="bg-blue-700 text-white rounded p-2">Register</a></li>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </div>
</body>
<script type="text/javascript" src="{{ url('js/inputs.js') }}"></script>
<script type="text/javascript" src="{{ url('js/today_date.js') }}"></script>
</html>
