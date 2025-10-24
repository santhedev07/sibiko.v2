<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100 font-poppins">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        <h3 class="text-3xl font-semibold text-center text-gray-800 mb-8">Login</h3>
        <form name="loginForm" method="POST" class="space-y-6" action="{{ route('login.submit') }}">
            @csrf
            <div>
                <label for="email" class="block text-gray-600 font-medium mb-2">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>

            <div>
                <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">Login</button>
            @if ($errors->has('login_error'))
                <div class="text-red-500 text-center mt-3">
                    {{ $errors->first('login_error') }}
                </div>
            @endif
            <p class="text-center text-sm text-gray-500 mt-4">
                Don’t have an account?
                <a href="#" class="text-blue-600 hover:underline">Register</a>
            </p>
        </form>
    </div>
</body>

</html>
