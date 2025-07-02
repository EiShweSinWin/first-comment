<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="form-container">
        <h2 class="text-2xl font-bold text-green-900 mb-6 text-center">Login</h2>
		<form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email Address" required class="form-input">
            <input type="password" name="password" placeholder="Password" required class="form-input">
            

            <div class="flex justify-between items-center text-sm mb-4">
                <div></div>
				<a href="{{ route('password.request') }}" class="text-sm text-gray-600">Forgot Password?</a>
            </div>

            <button type="submit" class="login-button">LOG IN</button>

            <p class="text-center mt-4 text-link">Don't have an account? <a href="#">Sign up</a></p>
        </form>
    </div>
</body>
</html>
