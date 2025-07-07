<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>NorthStar</title>
   
</head>
<body>
    <!-- App Bar -->
    <div class="app-bar">
        <div class="logo">NorthStar</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Product</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <div class="logout">
            <a href="#">Logout</a>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="main-content">
		@yield('content')
	</main>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-container">
            <div>
                <h3>NorthStar</h3>
                <p>123 Street, City</p>
                <p>email@example.com</p>
            </div>
            <div>
                <h3>Company</h3>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
            <div>
                <h3>Quick Link</h3>
                <a href="#">Payment Options</a>
                <a href="#">Returns</a>
                <a href="#">Privacy Policies</a>
            </div>
            <div>
                <h3>Payment Information</h3>
                <div class="payment-icons">
                    <img src="images/visa.png" alt="Visa">
                    <img src="images/mastercard.png" alt="Mastercard">
                </div>
            </div>
        </div>
    </div>
</body>
</html>