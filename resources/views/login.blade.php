<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        @if(session('error'))
            <p style="color: #ffcccc;">{{ session('error') }}</p>
        @endif
        @if(session('success'))
            <p style="color: #ccffcc;">{{ session('success') }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>

        <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
    </div>
</body>
</html>
