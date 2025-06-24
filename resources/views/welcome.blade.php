<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
</head>
<body>
    <nav class="app-bar">
        <div class="logo">NorthStar</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Product</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <div class="user-icons">
            <a href="{{ route('home') }}" class="icon"><i class="fas fa-user"></i></a>
            <a href="{{ route('home') }}" class="icon"><i class="fas fa-lock"></i></a>
        </div>
    </nav>
</body>
</html>