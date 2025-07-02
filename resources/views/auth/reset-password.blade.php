<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="form-container">
        <h2 class="text-2xl font-bold mb-4">Reset Your Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Confirm</button>
            </div>
        </form>
    </div>
</body>
</html>