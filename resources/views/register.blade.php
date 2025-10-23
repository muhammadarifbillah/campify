<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        @if($errors->any())
            <p style="color: #ffcccc;">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/register">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Register</button>
        </form>

        <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>
