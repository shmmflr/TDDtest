<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        @if (auth()->user()->role == 'admin')
        <a href="/dashboard/posts">posts</a>
        @endif
    @endauth
    @yield('content')
</body>
</html>