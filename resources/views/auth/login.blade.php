<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Jika pakai Tailwind/Bootstrap -->
    <style>
        .container { max-width: 400px; margin: 50px auto; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <div class="container  items-center justify-center">
        <h2>Login</h2>
        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Belum punya akun? <a href="#">Daftar</a></p>
    </div>
</body>
</html>