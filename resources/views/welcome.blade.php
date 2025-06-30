<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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

    <footer class="footer">
        <div class="footer-container">
          <div class="footer-column">
            <h3>NorthStar</h3>
            <p><i class="fas fa-phone"></i> +95 234548594</p>
            <p><i class="fas fa-envelope"></i> krist@example.com</p>
          </div>
      
          <div class="footer-column">
            <h4>Company</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Product</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
      
          <div class="footer-column">
            <h4>Quick Link</h4>
            <ul>
              <li><a href="#">Payment Options</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Privacy Policies</a></li>
            </ul>
          </div>
      
          <div class="footer-column">
            <h4>Payment Information</h4>
            <div class="payment-icons">
              <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" />
              <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="MasterCard" />
              <img src="https://upload.wikimedia.org/wikipedia/commons/5/5b/Google_Pay_Logo.svg" alt="GPay" />
            </div>
          </div>
        </div>
      </footer>
      
</body>
</html>