
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
        <h2 class="text-2xl font-bold text-green-900 mb-6 text-center">Forgot Your Password?</h2>
		<form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Email Address" required class="form-input">
           
            

         

			
                <button type="submit" class="btn btn-register">Password Reset</button>
              
     
			<a href="{{ route('login') }}" class="text-sm text-gray-600">Back to Sign In</a>
           
        </form>
    </div>
</body>
</html>
