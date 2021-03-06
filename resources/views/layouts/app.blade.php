<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagram</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Posts</a>
            </li>
        </ul>


        <ul class="flex items-center">
            {{-- @if (auth()->user()) --}}
            @auth
                <li>
                    <a href="{{ route('user.posts', auth()->user()) }}" class="p-3">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <a href="{{ route('user.password-change') }}" class="p-3">Change password</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                        @csrf
                        <button type="submit" style="outline:none">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')

    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if(exist){
          alert(msg);
        }
    </script>
</body>
</html>